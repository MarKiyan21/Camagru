document.addEventListener("DOMContentLoaded", function(event) {
	var collapse = document.getElementById('collapse');
	if (collapse) {
		var header = document.getElementById('navbar-collapse');
		
		collapse.addEventListener("click", function() {
			if (header.dataset.collapse == 0) {
				header.style.display = "block";
				header.dataset.collapse = 1;
			} else {
				header.style.display = "none";
				header.dataset.collapse = 0;
			}
			
		});
	}
});

var globalWidth = 50;
var globalX = 25;
var globalY = 0;
var originX = 25;
var originY = 0;
var stickerWidth = 50;
var originWidth = 50;
var stickerHeight = 50;
var originHeight = 50;
var emptyCanvas = "";

(function() {
	var video = document.getElementById('video'),
		canvas = document.getElementById('canvas'),
		context = canvas.getContext('2d'),
		setAvatar = document.getElementById('set-as-avatar'),
		savePhoto = document.getElementById('save-photo'),
		capture = document.getElementById('capture'),
		bttnArea = document.getElementsByClassName('button-area')[0],
		sticker = document.getElementById('sticker'),
		vendorUrl = window.URL || window.webkitURL;
		
	navigator.getMedia = 	navigator.getUserMedia ||
							navigator.webkitGetUserMedia ||
							navigator.mozGetUserMedia ||
							navigator.msGetUserMedia;
	
	navigator.getMedia({
		video: true,
		audio: false
	}, function (stream) {
		video.src = vendorUrl.createObjectURL(stream);
		if (video) {
			video.play();
		}
	}, function (error) {
		//error.code
	})
	
	capture.addEventListener("click", function() {
		capture.style.margin = "2px";
		bttnArea.style.width = "50%";
		setAvatar.style.display = "inline-grid";
		savePhoto.style.display = "inline-grid";
		canvas.style.display = "inline-grid";
		context.drawImage(video, 0, 0, 640, 480);
		canvas.dataset.id = sticker.dataset.id;
		
		emptyCanvas = canvas.toDataURL("image/png");
		originX = globalX;
		originY = globalY;
		originWidth = stickerWidth;
		originHeight = stickerHeight;
		
		var coeficient =  325 - video.clientWidth;
		console.log(video.clientWidth);
		context.drawImage(sticker, globalX * 2 + coeficient, globalY * 2 + 20, stickerWidth * 2, stickerHeight * 2);
	})
	
})();

function gluedPhoto(setAsAvatar = true) {
	var xhr = new XMLHttpRequest(),
		canvas = document.getElementById('canvas');
// 		dataURL = canvas.toDataURL("image/png");
	emptyCanvas = emptyCanvas.replace(/^data:image\/(png|jpg);base64,/, "");
	
	if (canvas.dataset.id !== "undefined") {
		var stickerPath = "/assets/stickers/" + canvas.dataset.id + ".png";
	} else {
		var stickerPath = "none";
	}
	
	var body = 'image=' + encodeURIComponent(emptyCanvas) + '&sticker=' + encodeURIComponent(stickerPath) + '&avatar=' + encodeURIComponent(setAsAvatar) + '&oX=' + encodeURIComponent(originX) + '&oY=' + encodeURIComponent(originY) + '&width=' + encodeURIComponent(originWidth) + '&height=' + encodeURIComponent(originHeight) + '&originSize=' + encodeURIComponent(document.getElementById('video').clientWidth);
	
	xhr.open("POST", "/user/gluedPhoto", true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xhr.send(body);
    xhr.onload = function() {
		if (this.responseText) {
			window.location.pathname = "/user/info/" + this.responseText;
		}
	}
}

function imposePhoto(element) {
	var dataId = element.dataset.id,
		canvas = document.getElementById('canvas'),
		sticker = document.getElementById('sticker'),
		context = sticker.getContext('2d'),
		capture = document.getElementById('capture');
	
	capture.disabled = false;
	sticker.dataset.flag = 1;
	sticker.dataset.id = dataId;
	context.clearRect(0, 0, canvas.width, canvas.height);
	globalX = 25;
	globalY = 0;
	globalWidth = 50;
	stickerWidth = 50;
	stickerHeight = 50;
	sticker.style.top = "0";
	sticker.style.left = "25px";
	sticker.style.width = "50px";
	context.drawImage(element, 0, 0, 50, 50);
}

var sticker = document.getElementById('sticker');
if (sticker) {
	window.addEventListener("keydown", function(e) {
		if (sticker.dataset.flag == 1) {
			if (e.keyCode == 187) {
				globalWidth += 5;
				if (globalWidth + globalX > 320 || globalWidth + globalY > 225) {
					globalWidth -= 5;
				}
				sticker.style.width = globalWidth + "px";
				stickerWidth = sticker.clientWidth;
				stickerHeight = sticker.clientHeight;
			}
			if (e.keyCode == 189) {
				globalWidth -= 5;
				if (globalWidth - globalX < 25 || globalWidth - globalY < 0) {
					globalWidth -= 5;
				}
				sticker.style.width = globalWidth + "px";
				stickerWidth = sticker.clientWidth;
				stickerHeight = sticker.clientHeight;
			}
			if (e.keyCode == 87) {
				globalY -= 5;
				if (globalY < 0) {
					globalY = 0;
				}
				sticker.style.top = globalY + "px";
			}
			if (e.keyCode == 83) {
				globalY += 5;
				if (globalY + stickerHeight > 225) {
					globalY -= 5;
				}
				sticker.style.top = globalY + "px";
			}
			if (e.keyCode == 65) {
				globalX -= 5;
				if (globalX < 25) {
					globalX = 25;
				}
				sticker.style.left = globalX + "px";
			}
			if (e.keyCode == 68) {
				globalX += 5;
				if (globalX + stickerWidth > 320) {
					globalX -= 5;
				}
				sticker.style.left = globalX + "px";
			}
		}
	})
}

function delClass(e) {
	for (i = 0; i < e.childNodes.length; i++) {
		if (e.children[i] && (e.children[i].classList.contains('has-error') || e.children[i].classList.contains('has-success'))) {
			e.children[i].classList.remove("has-error");
			e.children[i].classList.remove("has-success");
		}
	}
	var helpBlocks = document.getElementsByClassName('help-block');
	if (helpBlocks) {
		for (i = 0; i < helpBlocks.length; i++) {
			helpBlocks[i].style.display = "none";
		}
	}
}

var searchUser = document.getElementById('search-user');
if (searchUser) {
	searchUser.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var searchLogin = document.getElementById('user-login');
		var helpBlock = document.getElementById('user-found');
		var login = searchLogin.value;
		
		var body = 'login=' + encodeURIComponent(login);
		
		xhr.open("POST", "/user/searchUser", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			switch (this.responseText) {
				case "exist":
					var close = document.getElementsByClassName('closes');
					if (close) {
						for (i = 0; i < close.length; i++) {
							document.getElementsByClassName('closes')[i].click();
						}
					}
					window.location.pathname = "/user/info/" + login;
					break;
				default:
					helpBlock.style.display = "block";
					helpBlock.textContent = "User not found";
					searchLogin.parentNode.className += " has-error";
			}
		}
	});
}
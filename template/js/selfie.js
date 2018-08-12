var globalWidth = 50;
var globalX = 25;
var globalY = 0;
var stickerWidth = 50;
var stickerHeight = 50;

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
		video.play();
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
		context.drawImage(sticker, globalX * 2 - 25, globalY * 2, stickerWidth * 2, stickerHeight * 2);
	})
	
})();

function imposePhoto(element) {
	var dataId = element.dataset.id,
		canvas = document.getElementById('canvas'),
		sticker = document.getElementById('sticker'),
		context = sticker.getContext('2d'),
		buffer = document.getElementById('sticker-buff');

	sticker.dataset.flag = 1;
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
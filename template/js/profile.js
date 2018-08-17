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

if (document.getElementById("user-id") && document.getElementById("user-name")) {
	var userid = document.getElementById("user-id").value;
	var username = document.getElementById("user-name").value;
	var useremail = document.getElementById("user-email").value;
}

function hover(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background = element.children[1], styleSpan = background.style;
	styleImg.opacity = 0.3;
	styleSpan.opacity = 0.8;
}

function unhover(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background = element.children[1], styleSpan = background.style;
	styleImg.opacity = 1;
	styleSpan.opacity = 0;
}

function hover3(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background1 = element.children[1], styleSpan1 = background1.style;
	var background2 = element.children[2], styleSpan2 = background2.style;
	styleImg.opacity = 0.3;
	styleSpan1.opacity = 0.8;
	styleSpan2.opacity = 0.8;
}

function unhover3(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background1 = element.children[1], styleSpan1 = background1.style;
	var background2 = element.children[2], styleSpan2 = background2.style;
	styleImg.opacity = 1;
	styleSpan1.opacity = 0;
	styleSpan2.opacity = 0;
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

function showDetails(id) {
	window.location.pathname = "/photos/" + id;
}

function setAvatar() {
	var formdata	= new FormData();
	var xhr			= new XMLHttpRequest();
	var xhr2		= new XMLHttpRequest();
	var file		= document.querySelector('input[type=file]').files[0];
	
	formdata.append("image", file);
    formdata.append("user_id", userid);
    
    xhr.open("POST", "/uploadImage", true);
    xhr.send(formdata);
    xhr.onload = function() {
// 		document.getElementsByClassName("savePhoto")[0].setAttribute("data-id", this.responseText);
		
		var body = 'user_id=' + encodeURIComponent(userid) + '&image_id=' + encodeURIComponent(this.responseText);
	
		xhr2.open("POST", "/saveAsAvatar", true);
		xhr2.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr2.send(body);
		
		xhr2.onload = function() {
			console.log("asdasd");
			window.location.reload();
		}
	}
	
	
}

function cancelUpload() {
	document.getElementsByClassName('preview-block')[0].style.display = "none";
	document.getElementById('preview').src = "";
	document.getElementsByClassName("container")[0].style.display = "block";
	document.getElementsByClassName("row")[0].style.display = "block";
	document.querySelector('input[type=file]').files = null;
// 	window.location.pathname = "/user/info/" + username;
}

function previewFile(){
	var reader	= new FileReader();
	var file	= document.querySelector('input[type=file]').files[0];

	reader.onloadend = function () {
		document.getElementById('preview').src = reader.result;
	}

	document.getElementsByClassName("container")[0].style.display = "none";
	document.getElementsByClassName("row")[0].style.display = "none";
	document.getElementsByClassName('preview-block')[0].style.display = "block";
	if (file) {
		reader.readAsDataURL(file);
	}
}

// previewFile();

var doUpload = document.getElementsByClassName('do-upload')[0];
if (doUpload) {
	document.getElementsByClassName('do-upload')[0].addEventListener('click', function() {
		document.getElementById('fileid').click();
	});
}

var close = document.getElementsByClassName('close');
if (close) {
	for (i = 0; i < close.length; i++) {
		document.getElementsByClassName('close')[i].addEventListener('click', function() {
			document.getElementsByClassName('menu-open-button')[0].click();
		});
	}
}

var chLogin = document.getElementById('change-login');
if (chLogin) {
	chLogin.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var loginElem = document.getElementById('new-login');
		var helpBlock = document.getElementById('helpBlock1');
		var newLogin = loginElem.value;
		
		if (newLogin === username) {
			helpBlock.style.display = "block";
			helpBlock.textContent = "Login is identical";
			loginElem.parentNode.className += " has-error";
			return;
		}
		
		var body = 'user_id=' + encodeURIComponent(userid) + '&new_login=' + encodeURIComponent(newLogin);
		
		xhr.open("POST", "/user/changeLogin", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			switch (this.responseText) {
				case "exist":
					helpBlock.style.display = "block";
					helpBlock.textContent = "Login already exist";
					loginElem.parentNode.className += " has-error";
					break;
				case "invalid":
					helpBlock.style.display = "block";
					helpBlock.textContent = "Invalid login";
					loginElem.parentNode.className += " has-error";
					break;
				default:
					var close = document.getElementsByClassName('close');
					if (close) {
						for (i = 0; i < close.length; i++) {
							document.getElementsByClassName('close')[i].click();
							document.getElementsByClassName('menu-open-button')[0].click();
						}
					}
					window.location.pathname = "/user/info/" + newLogin;
			}
		}
	});
}

var chEmail = document.getElementById('change-email');
if (chEmail) {
	chEmail.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var emailElem = document.getElementById('new-email');
		var helpBlock = document.getElementById('helpBlock2');
		var newEmail = emailElem.value;
		
		if (newEmail === useremail) {
			helpBlock.style.display = "block";
			helpBlock.textContent = "Email is identical";
			emailElem.parentNode.className += " has-error";
			return;
		}
		
		var body = 'user_id=' + encodeURIComponent(userid) + '&new_email=' + encodeURIComponent(newEmail);
		
		xhr.open("POST", "/user/changeEmail", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			switch (this.responseText) {
				case "exist":
					helpBlock.style.display = "block";
					helpBlock.textContent = "Email already exist";
					emailElem.parentNode.className += " has-error";
					break;
				case "invalid":
					helpBlock.style.display = "block";
					helpBlock.textContent = "Invalid email";
					emailElem.parentNode.className += " has-error";
					break;
				default:
					var close = document.getElementsByClassName('close');
					if (close) {
						for (i = 0; i < close.length; i++) {
							document.getElementsByClassName('close')[i].click();
							document.getElementsByClassName('menu-open-button')[0].click();
						}
					}
					window.location.reload();
			}
		}
	});
}

var chPass = document.getElementById('change-password');
if (chPass) {
	chPass.addEventListener('keyup', event => {
		event.preventDefault();
		if (event.keyCode === 13) {
			var xhr = new XMLHttpRequest();
			var oldPassElem = document.getElementById('old-pass');
			var newPassElem = document.getElementById('new-pass');
			var confPassElem = document.getElementById('conf-pass');
			var helpBlock = document.getElementById('helpBlock3');
			var oldPass = oldPassElem.value;
			var newPass = newPassElem.value;
			var confPass = confPassElem.value;

			if (newPass.length < 1) {
				helpBlock.style.display = "block";
				helpBlock.textContent = "Pass can't be empty";
				newPassElem.parentNode.className += " has-error";
			}
			
			var body = 'user_id=' + encodeURIComponent(userid) + '&old_pass=' + encodeURIComponent(oldPass) + '&new_pass=' + encodeURIComponent(newPass) + '&conf_pass=' + encodeURIComponent(confPass);
			
			xhr.open("POST", "/user/changePassword", true);
			xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
			xhr.send(body);
			
			xhr.onload = function() {
				switch (this.responseText) {
					case "invalid":
						helpBlock.style.display = "block";
						helpBlock.textContent = "Isn't your pass";
						oldPassElem.parentNode.className += " has-error";
						break;
					case "noneidentical":
						helpBlock.style.display = "block";
						helpBlock.textContent = "Сonfirm the password";
						newPassElem.parentNode.className += " has-error";
						confPassElem.parentNode.className += " has-error";
						break;
					default:
						var close = document.getElementsByClassName('close');
						if (close) {
							for (i = 0; i < close.length; i++) {
								document.getElementsByClassName('close')[i].click();
								document.getElementsByClassName('menu-open-button')[0].click();
							}
						}
						window.location.reload();
				}
			}
		}
	});
}

var chNotif = document.getElementById('ch-notifications');
if (chNotif) {
	chNotif.addEventListener('click', event => {
		var xhr = new XMLHttpRequest();
		var body = 'user_id=' + encodeURIComponent(userid);
		
		xhr.open("POST", "/user/changeNotification", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			if (this.responseText === "changed") {
				window.location.reload()
			}
		}
	});
}

var up = document.getElementById('up');
if (up) {
	up.addEventListener("click", function() {
		var xhr = new XMLHttpRequest();
		
		var body = 'action=' + encodeURIComponent("previous");
		
		xhr.open("POST", "/user/changePage", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			window.location.pathname = "/user/info/" + username;
			window.location.reload();
		}
	})
}

var down = document.getElementById('down');
if (down) {
	down.addEventListener("click", function() {
		var xhr = new XMLHttpRequest();
		
		var body = 'action=' + encodeURIComponent("next");
		
		xhr.open("POST", "/user/changePage", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			console.log(this.responseText);
			window.location.reload();
		}
	})
}
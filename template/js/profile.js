if (document.getElementById("user-id") && document.getElementById("user-name")) {
	var userid = document.getElementById("user-id").value;
	var username = document.getElementById("user-name").value;
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
			window.location.pathname = "/user/info/" + username;
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
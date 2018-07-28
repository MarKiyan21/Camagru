var userid = document.getElementById("user-id").value;
var username = document.getElementById("user-name").value;

function hover2(element) {
	var pic = element.children[0], styleImg = pic.style;
	var background = element.children[1], styleSpan = background.style;
	styleImg.opacity = 0.3;
	styleSpan.opacity = 0.8;
}

function unhover2(element) {
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

function doSelfie() {
	window.location.pathname = "/user/selfie";
}

function setAvatar() {
	var xhr = new XMLHttpRequest();
	var body = 'user_id=' + encodeURIComponent(userid) + '&image_id=' + encodeURIComponent(document.getElementsByClassName("savePhoto")[0].getAttribute("data-id"));
	
	xhr.open("POST", "/saveAsAvatar", true);
	xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
	xhr.send(body);
	
	xhr.onload = function() {
		window.location.pathname = "/user/info/" + username;
	}
}

function cancelUpload() {
	document.getElementsByClassName('preview-block')[0].style.display = "none";
	document.getElementById('preview').src = "";
	document.getElementsByClassName("container")[0].style.display = "block";
	document.getElementsByClassName("row")[0].style.display = "block";
	document.querySelector('input[type=file]').files = null;
	window.location.pathname = "/user/info/" + username;
}

function previewFile(){
	var reader		= new FileReader();
	var formdata	= new FormData();
	var file		= document.querySelector('input[type=file]').files[0];

	reader.onloadend = function () {
		document.getElementById('preview').src = reader.result;
	}

	document.getElementsByClassName("container")[0].style.display = "none";
	document.getElementsByClassName("row")[0].style.display = "none";
	document.getElementsByClassName('preview-block')[0].style.display = "block";
	if (file) {
		reader.readAsDataURL(file);
	}
    
    formdata.append("image", file);
    formdata.append("user_id", userid);
//     xhr.addEventListener("load", function(event) { uploadcomplete(event); }, false);
	var xhr = new XMLHttpRequest();
    xhr.open("POST", "/uploadImage", true);
    xhr.send(formdata);
    xhr.onload = function() {
		document.getElementsByClassName("savePhoto")[0].setAttribute("data-id", this.responseText);
	}
}

// previewFile();

var doUpload = document.getElementsByClassName('do-upload')[0];
if (doUpload) {
	document.getElementsByClassName('do-upload')[0].addEventListener('click', function() {
		document.getElementById('fileid').click();
	});
}
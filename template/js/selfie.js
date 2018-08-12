(function() {
	var video = document.getElementById('video'),
		canvas = document.getElementById('canvas'),
		context = canvas.getContext('2d');
		setAvatar = document.getElementById('set-as-avatar');
		savePhoto = document.getElementById('save-photo');
		capture = document.getElementById('capture');
		bttnArea = document.getElementsByClassName('button-area')[0];
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
	})
	
})();
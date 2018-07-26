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

function doPhoto() {
	window.location.pathname = "/user/selfie";
}
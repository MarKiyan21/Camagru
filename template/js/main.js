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

/*
var loginButton = document.getElementById('login-button');
	
loginButton.addEventListener("click", function(e) {
	e.preventDefault();
	
	var form = document.getElementById('login-form');
	var loginValue = document.getElementById('nickname').value;
	var passValue = document.getElementById('password').value;
	
	

	window.location.pathname = "user/info/" + loginValue;

}, false);
*/
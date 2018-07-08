var button = document.getElementById('login-button');
console.log(button);
	
button.addEventListener("click", function(e) {
	e.preventDefault();
	
	var form = document.getElementById('login-form');
	var loginValue = document.getElementById('login').value;
	var passValue = document.getElementById('pass').value;

	window.location.pathname = "user/info/" + loginValue;

}, false);
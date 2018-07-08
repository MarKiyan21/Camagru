var loginButton = document.getElementById('login-button');
	
loginButton.addEventListener("click", function(e) {
	e.preventDefault();
	
	var form = document.getElementById('login-form');
	var loginValue = document.getElementById('nickname').value;
	var passValue = document.getElementById('password').value;
	
	

	window.location.pathname = "user/info/" + loginValue;

}, false);
var registerButton = document.getElementById('register-button');
	
registerButton.addEventListener("click", function(e) {
	e.preventDefault();
	
	var form = document.getElementById('register-from');
	
	var loginValue = document.getElementById('nickname').value;
	var emailValue = document.getElementById('email').value;
	var passValue = document.getElementById('new-password').value;
	var confPassValue = document.getElementById('conf-password').value;
	
	

	window.location.pathname = "user/info/" + loginValue;

}, false);
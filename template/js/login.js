var login = document.getElementById('nick');
var password = document.getElementById('password');

function delClass(e) {
	if (e.target.parentNode.classList.contains('has-error') || e.target.parentNode.classList.contains('has-success')) {
		e.target.parentNode.classList.remove("has-error");
		e.target.parentNode.classList.remove("has-success");
	}
	
}

login.addEventListener("click", delClass, false);
password.addEventListener("click", delClass, false);

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
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
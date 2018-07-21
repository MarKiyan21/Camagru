var login = document.getElementById('nickname');
var email = document.getElementById('email');
var newpassword = document.getElementById('new-password');
var confpassword = document.getElementById('conf-password');

function delClass(e) {
	if (e.target.parentNode.classList.contains('has-error') || e.target.parentNode.classList.contains('has-success')) {
		e.target.parentNode.classList.remove("has-error");
		e.target.parentNode.classList.remove("has-success");
	}
	
}

login.addEventListener("click", delClass, false);
email.addEventListener("click", delClass, false);
newpassword.addEventListener("click", delClass, false);
confpassword.addEventListener("click", delClass, false);
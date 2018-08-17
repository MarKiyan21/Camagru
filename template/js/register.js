document.addEventListener("DOMContentLoaded", function(event) {
	var collapse = document.getElementById('collapse');
	if (collapse) {
		var header = document.getElementById('navbar-collapse');
		
		collapse.addEventListener("click", function() {
			if (header.dataset.collapse == 0) {
				header.style.display = "block";
				header.dataset.collapse = 1;
			} else {
				header.style.display = "none";
				header.dataset.collapse = 0;
			}
			
		});
	}
});

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

if (login) {
	login.addEventListener("click", delClass, false);
}
if (email) {
	email.addEventListener("click", delClass, false);
}
if (newpassword) {
	newpassword.addEventListener("click", delClass, false);
}
if (confpassword) {
	confpassword.addEventListener("click", delClass, false);
}
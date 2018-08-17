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

var login = document.getElementById('nick');
var password = document.getElementById('password');

function delClass(e) {
	if (e.target.parentNode.classList.contains('has-error') || e.target.parentNode.classList.contains('has-success')) {
		e.target.parentNode.classList.remove("has-error");
		e.target.parentNode.classList.remove("has-success");
	}
	
}

if (login) {
	login.addEventListener("click", delClass, false);
}
if (password) {
	password.addEventListener("click", delClass, false);
}

var forgotPass = document.getElementById('forgot-pass');
if (forgotPass) {
	forgotPass.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var email = document.getElementById('em').value;
		
		var body = 'email=' + encodeURIComponent(email);
		
		xhr.open("POST", "/user/forgotPassword", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			window.location.reload();
		}
	});
}
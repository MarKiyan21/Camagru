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

function delClass2(e) {
	if (e.target.parentNode.classList.contains('has-error') || e.target.parentNode.classList.contains('has-success')) {
		e.target.parentNode.classList.remove("has-error");
		e.target.parentNode.classList.remove("has-success");
	}
	
}

if (login) {
	login.addEventListener("click", delClass2, false);
}
if (email) {
	email.addEventListener("click", delClass2, false);
}
if (newpassword) {
	newpassword.addEventListener("click", delClass2, false);
}
if (confpassword) {
	confpassword.addEventListener("click", delClass2, false);
}

function delClass(e) {
	for (i = 0; i < e.childNodes.length; i++) {
		if (e.children[i] && (e.children[i].classList.contains('has-error') || e.children[i].classList.contains('has-success'))) {
			e.children[i].classList.remove("has-error");
			e.children[i].classList.remove("has-success");
		}
	}
	var helpBlocks = document.getElementsByClassName('help-block');
	if (helpBlocks) {
		for (i = 0; i < helpBlocks.length; i++) {
			helpBlocks[i].style.display = "none";
		}
	}
}

var searchUser = document.getElementById('search-user');
if (searchUser) {
	searchUser.addEventListener('submit', event => {
		event.preventDefault();
		var xhr = new XMLHttpRequest();
		var searchLogin = document.getElementById('user-login');
		var helpBlock = document.getElementById('user-found');
		var login = searchLogin.value;
		
		var body = 'login=' + encodeURIComponent(login);
		
		xhr.open("POST", "/user/searchUser", true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
		xhr.send(body);
		
		xhr.onload = function() {
			switch (this.responseText) {
				case "exist":
					var close = document.getElementsByClassName('closes');
					if (close) {
						for (i = 0; i < close.length; i++) {
							document.getElementsByClassName('closes')[i].click();
						}
					}
					window.location.pathname = "/user/info/" + login;
					break;
				default:
					helpBlock.style.display = "block";
					helpBlock.textContent = "User not found";
					searchLogin.parentNode.className += " has-error";
			}
		}
	});
}
var login = document.getElementById('nickname');
var email = document.getElementById('email');
var newpassword = document.getElementById('new-password');
var confpassword = document.getElementById('conf-password');

function delClass(e) {
	if (e.target.classList.contains('incorrect')) {
		e.target.classList.remove("incorrect");
	}
	
}

login.addEventListener("click", delClass, false);
email.addEventListener("click", delClass, false);
newpassword.addEventListener("click", delClass, false);
confpassword.addEventListener("click", delClass, false);

/*
registerButton.addEventListener("click", function(e) {
	e.preventDefault();
	
	var form = document.getElementById('register-from');
	
	var loginValue = document.getElementById('nickname').value;
	var emailValue = document.getElementById('email').value;
	var passValue = document.getElementById('new-password').value;
	var confPassValue = document.getElementById('conf-password').value;
	
	var xhr = new XMLHttpRequest();
	xhr.open('POST', 'user/check');
	xhr.setRequestHeader('Content-Type', 'application/json');
	xhr.onload = function() {
	    if (xhr.status === 200) {
// 	        var userInfo = JSON.parse(xhr.responseText);
			console.log(xhr.responseText);
			
	    }
	};
	xhr.send(JSON.stringify({
	    name: loginValue,
	    pass: passValue
	}));

// 	window.location.pathname = "user/info/" + loginValue;

}, false);
*/
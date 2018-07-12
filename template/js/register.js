var registerButton = document.getElementById('register-button');
	
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
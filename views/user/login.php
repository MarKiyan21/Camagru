<?php
// $_SESSION['user'] = 'marik';
?>

<?php include (ROOT.'/views/layouts/header.php');?>
<body>
<div class="wrapper">
	<div class="container">
		<h1>Welcome</h1>
		<form id="login-form">
			<input id="login" type="text" placeholder="Username">
			<input id="pass" type="password" placeholder="Password">
			<button type="submit" id="login-button">Login</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
</body>
<?php include ROOT.'/views/layouts/footer.php';?>

<script>
	
	var button = document.getElementById('login-button');
	
	button.addEventListener("click", function(e) {
    	e.preventDefault();
    	
    	var form = document.getElementById('login-form');
    	var loginValue = document.getElementById('login').value;
    	var passValue = document.getElementById('pass').value;

    	console.log(window.location.pathname = "user/info/" + loginValue);

// 		fadeOut(form, 500);
	}, false);

</script>
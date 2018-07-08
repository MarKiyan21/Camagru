<?php include (ROOT.'/views/layouts/header.php');?>
<body>
<div class="wrapper">
	<div class="container">
		<h1>Welcome to Camagru</h1>
		<form id="register-from">
			<input id="nickname" type="text" placeholder="Username">
			<input id="email" type="email" placeholder="Email">
			<input id="new-password" type="password" placeholder="Password">
			<input id="conf-password" type="password" placeholder="Confirm password">
			<button id="register-button" type="submit">Register</button>
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

<script>
	<?php
		include ROOT.'/template/js/register.js';
	?>
</script>

<?php include ROOT.'/views/layouts/footer.php';?>
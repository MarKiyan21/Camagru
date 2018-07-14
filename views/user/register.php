<?php include (ROOT.'/views/layouts/header.php');?>
<body>
<div class="wrapper">
	<div class="container">
		<h1>Welcome to Camagru</h1>
		<form id="register-from" action="#" method="post">
			<input id="nickname" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" required>
			<input id="email" class="<?php echo $error ?>" type="email" name="email" value="<?php echo $email ?>" placeholder="Email" required>
			<input id="new-password" type="password" name="newpass" value="<?php echo $newpass ?>" placeholder="Password" required>
			<input id="conf-password" type="password" name="confpass" value="<?php echo $confpass ?>" placeholder="Confirm password" required>
			<button id="register-button" type="submit" name="submit">Register</button>
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
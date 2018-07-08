<?php
// $_SESSION['user'] = 'marik';
?>

<?php include (ROOT.'/views/layouts/header.php');?>
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

<?php include ROOT.'/views/layouts/footer.php';?>

<script>
	<?php
		include (ROOT.'/template/js/login.js');
			
	?>
</script>

</body>
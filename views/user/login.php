<?php include (ROOT.'/views/layouts/header.php');?>

<div class="wrapper">
	<div <?php if($isActive): ?> style="display: none;" <?php endif; ?> >
		<h1>Please activate your account</h1>
	</div>
	
	<div class="container" <?php if(!$isActive): ?> style="display: none;" <?php endif; ?> >
		<h1>Welcome back</h1>
		<form id="login-form" action="#" method="post">
			<input id="nick" class="<?php echo $erLogin ?>" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" required>
			<input id="password" class="<?php echo $erPass ?>" type="password" name="pass" placeholder="Password" required>
			<button id="login-button" type="submit" name="submit">Login</button>
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


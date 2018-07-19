<?php include (ROOT.'/views/layouts/header.php');?>

<!--
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
</div>
-->

<div class="container-fluid">
	
	<div class="col-md-12 col-sm-12 col-xs-12" <?php if($isActive): ?> style="display: none;" <?php endif; ?> >
		<h3>Please activate your account</h3>
	</div>
	
	<form action="#" method="post" <?php if(!$isActive): ?> style="display: none;" <?php endif; ?>>
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erLogin ?>">
			<input id="nick" class="form-control" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" required>
		</div>
		
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erPass ?>">
			<input id="password" class="form-control" type="password" name="pass" placeholder="Password" required>
		</div>
		
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
			<button id="login-button" class="btn btn-info" type="submit" name="submit">Login</button>
		</div>
	</form>
</div>

<script src="/template/js/login.js"></script>

<?php include ROOT.'/views/layouts/footer.php';?>


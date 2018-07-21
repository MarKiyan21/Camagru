<?php include (ROOT.'/views/layouts/header.php');?>

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


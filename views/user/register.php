<?php include (ROOT.'/views/layouts/header.php');?>

<div class="container-fluid">
	<form action="#" method="post">
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erLogin ?>">
			<input id="nickname" class="form-control" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" autocomplete="off" required>
		</div>
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erEmail ?>">
			<input id="email" class="form-control" type="text" name="email" value="<?php echo $email ?>" placeholder="Email" autocomplete="off" required>
		</div>
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erPass ?>">
			<input id="new-password" class="form-control" type="password" name="newpass" placeholder="Password" required>
		</div>
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erPass ?>">
			<input id="conf-password" class="form-control" type="password" name="confpass" placeholder="Confirm password" required>
		</div>
		<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
			<button id="register-button" class="btn btn-info" type="submit" name="submit">Register</button>
		</div>
	</form>
</div>

<!-- </div> -->
<script src="/template/js/register.js"></script>

<?php include ROOT.'/views/layouts/footer.php';?>
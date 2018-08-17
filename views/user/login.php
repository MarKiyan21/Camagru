<?php include (ROOT.'/views/layouts/header.php');?>

<div class="container-fluid">
	
	<?php if ($erLogin === "has-error"): ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h3>User not found</h3>
		</div>
	
	<?php elseif (!$isActive): ?>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<h3>Please activate your account</h3>
		</div>
		
	<?php else: ?>
		<form action="#" method="post">
			<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erLogin ?>">
				<input id="nick" class="form-control" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" required>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3 <?php echo $erPass ?>">
				<input id="password" class="form-control" type="password" name="pass" placeholder="Password" required>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
				<button id="login-button" class="btn btn-info" type="submit" name="submit">Login</button>
			</div>
			
			<div class="form-group col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
				<a href="#popupchik" class="href pip">Forgot your password</a>
			</div>
		</form>
		<div id="popupchik" class="overlay">
			<div class="popup col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
				<div class="modal-body">
					<a class="close href" href="#">&times;</a>
					<h4 class="modal-title">Forgot password</h4>
					<span>We give you expired password. Please don't forget change it!</span>
				</div>
				
				<div class="modal-footer">
					<form id="forgot-pass">
						<div class="form-group col-md-6 col-sm-8 col-xs-12 col-md-offset-3 col-sm-offset-2">
							<input id="em" class="form-control" type="text" name="email" placeholder="Your email here..." required>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
</div>

<script src="/template/js/login.js"></script>

<?php include ROOT.'/views/layouts/footer.php';?>


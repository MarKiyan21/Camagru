<?php include (ROOT.'/views/layouts/header.php');?>

<div class="container-fluid">
	
	<div class="col-md-12 col-sm-12 col-xs-12">
		<?php if ($status == "error"): ?>
			<h3>Something went wrong!</h3>
		<?php elseif ($status == "already"): ?>
			<h3>Your account has already been activated before!</h3>
		<?php else: ?>
			<h3>Your account has been successfully activated!</h3>
			<a href="/user/login">Let's start</a>
		<?php endif; ?>
	</div>

</div>

<?php include ROOT.'/views/layouts/footer.php';?>
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

<!--
<div class="wrapper">
	<div>
		<?php if ($status == "error"): ?>
			<h1>Something went wrong!</h1>
		<?php elseif ($status == "already"): ?>
			<h1>Your account has already been activated before!</h1>
		<?php else: ?>
			<h1>Your account has been successfully activated!</h1>
			<a id="start" href="/user/login">Let's start</a>
		<?php endif; ?>
		
	</div>
</div>
-->

<?php include ROOT.'/views/layouts/footer.php';?>
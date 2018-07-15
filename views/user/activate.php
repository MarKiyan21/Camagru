<?php include (ROOT.'/views/layouts/header.php');?>

<div class="wrapper">
	<div style="z-index: 2;">
		<?php if ($status == "error"): ?>
			<h1>Something went wrong!</h1>
		<?php elseif ($status == "already"): ?>
			<h1>Your account has already been activated before!</h1>
		<?php else: ?>
			<h1>Your account has been successfully activated!</h1>
			<a id="start" href="/user/login">Let's start</a>
		<?php endif; ?>
		
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
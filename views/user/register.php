<?php include (ROOT.'/views/layouts/header.php');?>

<!-- <div class="wrapper"> -->
<!--
	<div class="container">
		<h1>Welcome to Camagru</h1>
		<form id="register-from" action="#" method="post">
			<input id="nickname" class="<?php echo $erLogin ?>" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" autocomplete="off" required>
			<input id="email" class="<?php echo $erEmail ?>" type="text" name="email" value="<?php echo $email ?>" placeholder="Email" autocomplete="off" required>
			<input id="new-password" class="<?php echo $erPass ?>" type="password" name="newpass" placeholder="Password" required>
			<input id="conf-password" class="<?php echo $erPass ?>" type="password" name="confpass" placeholder="Confirm password" required>
			<button id="register-button" type="submit" name="submit">Register</button>
		</form>
	</div>
-->
<!--
	<div class="container">
		<div class="row">
			<div class="col-md-9"><input id="nickname" class="<?php echo $erLogin ?>" type="text" name="login" value="<?php echo $login ?>" placeholder="Username" autocomplete="off" required></div>
			<div class="col-md-9"><input id="email" class="<?php echo $erEmail ?>" type="text" name="email" value="<?php echo $email ?>" placeholder="Email" autocomplete="off" required></div>
			<div class="col-md-9"><input id="new-password" class="<?php echo $erPass ?>" type="password" name="newpass" placeholder="Password" required></div>
			<div class="col-md-9"><input id="conf-password" class="<?php echo $erPass ?>" type="password" name="confpass" placeholder="Confirm password" required></div>
			<div class="col-md-9"><button id="register-button" type="submit" name="submit">Register</button></div>
		</div>
	</div>
-->
	
	<form>
		<div class="form-group col-md-6 col-xs-6 col-xs-offset-3 col-md-offset-3 has-success has-feedback">
			<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" describedby="inputSuccess2Status">
			<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
			<span id="inputSuccess2Status" class="sr-only">(success)</span>
		</div>
		<div class="form-group col-md-6 col-xs-6 col-xs-offset-3 col-md-offset-3">
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		</div>
		<div class="form-group col-md-6 col-md-offset-3">
			<button type="submit" class="btn btn-default">Submit</button>
		</div>
	</form>
<!--
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
-->
<!-- </div> -->

<?php include ROOT.'/views/layouts/footer.php';?>
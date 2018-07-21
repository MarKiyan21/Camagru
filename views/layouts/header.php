<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Camagru</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" id="bulma" href="assets/css/bulma.css">
	<link rel="stylesheet" type="text/css" href="/assets/libs/bulkit/css/icons.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png"/>
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<link href="/template/css/layouts.css" rel="stylesheet" type="text/css">
</head>
<body>
<header>
<!--
	<nav>
		<div class="title"><a href="/">Camagru</a></div>
		<div class="pull-right">
			<?php if(empty($_SESSION['user'])): ?>
				<a href="/user/login">Sigh in</a>
				<a href="/user/register">Sign up</a>
			<?php else: ?>
					<a href="/user/info/<?php echo $_SESSION['user'] ?>"><?php echo $_SESSION['user'] ?></a>
					<a href="/user/logout">Logout</a>
			<?php endif; ?>
		</div>
		
	</nav>
-->


	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Camagru</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse">
				
				<ul class="nav navbar-nav navbar-right">
					<?php if(empty($_SESSION['user'])): ?>
						<li><a href="/user/login">Sign In</a></li>
						<li><a href="/user/register">Sign Out</a></li>
					<?php else: ?>
						<li><a href="/user/info/<?php echo $_SESSION['user'] ?>"><?php echo $_SESSION['user'] ?></a></li>
						<li><a href="/user/logout">Logout</a></li>
					<?php endif; ?>
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

</header>
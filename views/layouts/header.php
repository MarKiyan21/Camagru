<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Camagru</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
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
				<button id="collapse" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/">Camagru</a>
			</div>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="navbar-collapse" data-collapse="0">
				
				<ul class="nav navbar-nav navbar-right">

					<li><a href="#popupchik2" class="href"><i class="fa fa-search"></i></a></li>
					<?php if(empty($_SESSION['user'])): ?>
						<li class="nav-item"><a class="nav-link" href="/user/login">Sign In</a></li>
						<li class="nav-item"><a class="nav-link" href="/user/register">Sign Up</a></li>
					<?php else: ?>
						<li class="nav-item"><a class="nav-link" href="/user/info/<?php echo $_SESSION['user'] ?>"><?php echo $_SESSION['user'] ?></a></li>
						<li class="nav-item"><a class="nav-link" href="/user/logout">Logout</a></li>
					<?php endif; ?>
					
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	
	<div id="popupchik2" class="overlay" style="z-index: 3;">
		<div class="popup col-md-6 col-sm-6 col-xs-6 col-sm-offset-3 col-md-offset-3 col-xs-offset-3">
			<div class="modal-body">
				<a class="closes" href="#">&times;</a>
				<h4 class="modal-title">Search someone</h4>
			</div>
			
			<div class="modal-footer">
				<form id="search-user">
					<div class="form-group col-md-4 col-sm-6 col-xs-12 col-md-offset-4 col-sm-offset-3" onclick="delClass(this.parentNode);">
						<input id="user-login" class="form-control" type="text" name="newlogin" placeholder="User login here..." required>
						<span id="user-found" style="display: none; color: red;" class="help-block pull-left">Some text...</span>
					</div>
				</form>
			</div>
		</div>
	</div>

</header>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html" charset="utf-8">
	<title>Camagru</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Indie+Flower|Roboto" rel="stylesheet">
	<link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png"/>
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link href="/template/css/style.css" rel="stylesheet" type="text/css">
	<link href="/template/css/layouts.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="header">
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
</div>
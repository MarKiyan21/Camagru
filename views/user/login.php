<?php


/*
if(isset($_SESSION['user'])) {
	require_once(ROOT."/views/site/index.php");
} else {
*/
	echo("login page");
	$_SESSION['user'] = "marik";
// 	require_once(ROOT."/views/site/index.php");
// }

// print_r($_SESSION);
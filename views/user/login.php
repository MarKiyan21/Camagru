<?php

echo("LOGIN");
if(!isset($_SESSION) || $_SESSION['user'] == 0) {
	$_SESSION['user'] = 1;
}
echo("Session user ==> ".$_SESSION['user']);
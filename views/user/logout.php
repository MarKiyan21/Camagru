<?php

echo("LOGOUT");
if(isset($_SESSION) && $_SESSION['user'] == 1) {
	$_SESSION['user'] = 0;
}
echo("Session user ==> ".$_SESSION['user']);
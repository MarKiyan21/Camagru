<?php

// if(isset($_SESSION) && $_SESSION['user'] == 1) {
// 	$_SESSION['user'] = 0;
// 	echo("Session user ==> ".$_SESSION['user']);
// } else {
// 	echo("You need login or register");
// }

unset($_SESSION['user']);
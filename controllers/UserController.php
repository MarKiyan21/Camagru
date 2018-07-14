<?php
	
class UserController {
	
	public static function checkEmail($email) {
		if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/", $email))
			return false;
		return true;
	}
	
	public function actionInfo() {
		require_once(ROOT.'/views/user/info.php');
		
		return true;
	}

	public function actionRegister() {
		$login = "";
		$email = "";
		$newpass = "";
		$confpass = "";
		$error = "";

		if (isset($_POST['submit'])) {
			print_r($_POST);
			if (!self::checkEmail($_POST['email'])) {
				$login = $_POST['login'];
				$email = $_POST['email'];
				$newpass = $_POST['newpass'];
				$confpass = $_POST['confpass'];
				$error = "incorrect";
				print("INCORRECT EMAIL");
			} else {
				print("CORRECT EMAIL");
			}
		}
		
		require_once(ROOT.'/views/user/register.php');
		
		return true;
	}
	
	public function actionLogin() {
		require_once(ROOT.'/views/user/login.php');
		
		return true;
	}
	
	public function actionLogout() {
		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}

}

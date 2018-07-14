<?php
	
class UserController {
	
	public static function isLoginExist($login) {
		if (!empty(Users::getUserByName($login))) {
			return true;
		}
		return false;
	}
	
	public static function isEmailValid($email) {
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
		$erLogin = "";
		$erEmail = "";
		$erPass = "";

		if (isset($_POST['submit'])) {
			if (!isset($_POST['login']) || !isset($_POST['email']) || !isset($_POST['newpass']) || !isset($_POST['confpass'])) {
				return false;
			}
			if (self::isLoginExist(trim($_POST['login']))) {
				$erLogin = "incorrect";
				$login = trim($_POST['login']);
				$email = strtolower(trim($_POST['email']));
				print("INCORRECT LOGIN".PHP_EOL);
			} else {
				print("CORRECT LOGIN".PHP_EOL);
			}
			
			if (!self::isEmailValid(trim($_POST['email']))) {
				$erEmail = "incorrect";
				$login = trim($_POST['login']);
				$email = strtolower(trim($_POST['email']));
				print("INCORRECT EMAIL".PHP_EOL);
			} else {
				print("CORRECT EMAIL".PHP_EOL);
			}
			
			if ($_POST['newpass'] !== $_POST['confpass']) {
				$erPass = "incorrect";
				print("INCORRECT PASSWORD");
			} else {
				print("CORRECT PASSWORD");
			}
		}
		
		require_once(ROOT.'/views/user/register.php');
		
		return true;
	}
	
	public function actionLogin() {
		$login = "";
		$erLogin = "";
		$erPass = "";

		if (isset($_POST['submit'])) {
			if (!isset($_POST['login']) || !isset($_POST['pass'])) {
				return false;
			}
			if (!self::isLoginExist(trim($_POST['login']))) {
				$erLogin = "incorrect";
				$login = trim($_POST['login']);
				$email = strtolower(trim($_POST['email']));
				print("INCORRECT LOGIN".PHP_EOL);
			} else {
				print("CORRECT LOGIN".PHP_EOL);
			}
		}
		
		require_once(ROOT.'/views/user/login.php');
		
		return true;
	}
	
	public function actionLogout() {
		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}

}

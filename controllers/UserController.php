<?php
	
class UserController {
	
	public function actionInfo() {
		require_once(ROOT.'/views/user/info.php');
		
		return true;
	}

	public function actionRegister() {
// 		$_SESSION['user'] = "marik";
		require_once(ROOT.'/views/user/register.php');
		
		return true;
	}
	
	public function actionLogin() {
// 		$_SESSION['user'] = "marik";
		require_once(ROOT.'/views/user/login.php');
		
		return true;
	}
	
	public function actionLogout() {
		unset($_SESSION['user']);
		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}

}

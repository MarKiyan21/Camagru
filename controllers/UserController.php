<?php
	
class UserController {

	public function actionRegister() {
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

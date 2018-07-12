<?php
	
class UserController {
	
	public function actionInfo() {
		require_once(ROOT.'/views/user/info.php');
		
		return true;
	}

	public function actionRegister() {
		if (isset($_POST['submit'])) {
			
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

<?php
	
class ActivityController {
	
	private function redirect($url, $statusCode = 303) {
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
	private function randomName() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array();
		$alphaLength = strlen($alphabet) - 1;
		for ($i = 0; $i < 15; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass);
	}
	
	public function actionSaveAsAvatar() {
		if (empty($_POST)) {
			$this->redirect('/');
			return false;
		}
		
		$imageID = intval($_POST['image_id']);
		$userID = intval($_POST['user_id']);
		$photo = Photos::getPhotoById($imageID);
		
		Users::update("user_pic", $photo['path'], $userID);
		
		return http_response_code(200);
	}
	
	public function actionUploadImage() {
		if (empty($_FILES) || empty($_POST)) {
			$this->redirect('/');
			return false;
		}
		$userID = intval($_POST['user_id']);
		if (!file_exists(ROOT.DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."img")) {
			@mkdir(ROOT.DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."img", 0777, true);
		}
	
		$targetDir = ROOT.DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."img";
		
		foreach($_FILES as $file):
			$extension = explode("/", $file['type']);
			$extension = end($extension);
			$fileName = $this->randomName().'.'.$extension;
			$uploadPath = $targetDir.DIRECTORY_SEPARATOR.$fileName;
			$pathSrc = DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR.$fileName;
			$uploadedFile = $file['tmp_name'];
			
			if (move_uploaded_file($uploadedFile, $uploadPath)) {
				$lastID = Photos::add($userID, $pathSrc);
				print($lastID);
    		}
		endforeach;
		return http_response_code(200);
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
			if (self::isLoginExist(trim($_POST['login'])) || !self::isLoginValid(trim($_POST['login']))) {
				$erLogin = "has-error";
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(htmlspecialchars($_POST['email']));
			} else {
				$erLogin = "has-success";
			}
			
			if (!self::isEmailValid(trim($_POST['email'])) || Users::getUserByEmail(trim(strtolower(htmlspecialchars($_POST['email']))))) {
				$erEmail = "has-error";
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(htmlspecialchars($_POST['email']));
			} else {
				$erEmail = "has-success";
			}
			
			if ($_POST['newpass'] !== $_POST['confpass']) {
				$erPass = "has-error";
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(htmlspecialchars($_POST['email']));
			} else {
				$erPass = "has-success";
			}

			if ($erLogin === "has-success" && $erEmail === "has-success" && $erPass === "has-success") {
				print_r("SUCCESS");
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(strtolower(htmlspecialchars($_POST['email'])));
				$password = hash("whirlpool", $_POST['newpass']);
				$token = hash("whirlpool", time());
				
				Users::add($login, $email, $password, $token);
				
				$message = "Hi, " . $login . "!\nPlease activate your account for <a href='http://" . $_SERVER['HTTP_HOST'] . "/user/activate/". $token . "/" . $email . "'> this link</a>.\n";
				self::sendMail($email, "Registration", $message);
// 				$_SESSION['user'] = $login;
// 				$this->redirect('/user/login');
		
				return true;
			}
		}
		
		require_once(ROOT.'/views/user/register.php');
		
		return true;
	}
	
	public function actionLogin() {
		$login = "";
		$erLogin = "";
		$erPass = "";
		$isActive = true;

		if (isset($_POST['submit'])) {
			if (!isset($_POST['login']) || !isset($_POST['pass'])) {
				return false;
			}
			if (!self::isLoginExist(trim($_POST['login']))) {
				$erLogin = "has-error";
				$login = trim(htmlspecialchars($_POST['login']));
			} else {
				$erLogin = "has-success";
			}
			
			if (!$this->isPassMatches(trim(htmlspecialchars($_POST['login'])), hash("whirlpool", $_POST['pass']))) {
				$erPass = "has-error";
				$login = trim(htmlspecialchars($_POST['login']));
			} else {
				$erPass = "has-success";
			}
			
			if (!$this->isActivate(trim(htmlspecialchars($_POST['login'])))) {
				$isActive = false;
			} else {}

			if ($erLogin === "has-success" && $erPass === "has-success" && $isActive) {
				
				$login = trim(htmlspecialchars($_POST['login']));
				$password = hash("whirlpool", $_POST['pass']);

				$_SESSION['user'] = $login;
				$this->redirect('/user/info/'.$login);
		
				return true;
			}
		}
		
		require_once(ROOT.'/views/user/login.php');
		
		return true;
	}
	
	public function actionActivate($token, $email) {
		
		$user = Users::getUserByEmail(htmlspecialchars($email));
		if (empty($user) || $user['token'] !== $token) {
			$status = "error";
		} else if ($user['activate'] == 1) {
			$status = "already";
		} else {
			$status = "ok";
			Users::update("activate", 1);
		}
		
		require_once(ROOT.'/views/user/activate.php');
		
		return true;
	}
	
	public function actionLogout() {
		unset($_SESSION['user']);
		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}

}
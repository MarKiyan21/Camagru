<?php
	
class UserController {
	
	private function redirect($url, $statusCode = 303) {
		header('Location: ' . $url, true, $statusCode);
		die();
	}
	
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
	
	public static function isPassMatches($login, $password) {
		$user = Users::getUserByName($login);
		if (empty($user) || $user['password'] !== $password) {
			return false;
		}
		return true;
		
	}
	
	public static function isActivate($login) {
		$user = Users::getUserByName($login);
		if (empty($user) || $user['activate'] != 1) {
			return false;
		}
		return true;
	}
	
	public static function sendMail($to, $subject, $message) {
		$encoding = "utf-8";
		// Set preferences for Subject field
		$subject_preferences = array(
			"input-charset" => "utf-8",
			"output-charset" => "utf-8",
			"line-length" => 76,
			"line-break-chars" => "\r\n"
		);
		// Set mail header
		$header = "Content-type: text/html; charset=" . $encoding . " \r\n";
		$header .= "From: Marian <no-reply@gmail.com> \r\n";
		$header .= "MIME-Version: 1.0 \r\n";
		$header .= "Content-Transfer-Encoding: 8bit \r\n";
		$header .= "Date: ".date("r (T)")." \r\n";
		$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);
		// Send mail
		mail($to, $subject, $message, $header);
	}
	
	public function actionInfo() {
		$whoPage = explode("/", $_SERVER['PATH_INFO']);
		$whoPage = end($whoPage);
		
		if (isset($_SESSION['user'])) {
			$status = 1;
			if ($_SESSION['user'] == $whoPage) {
				$status = 2;
			}
		} else {
			$status = 0;
		}
		
		$ifUserExist = Users::getUserByName($whoPage);
		
		if (empty($ifUserExist)) {
			Router::error404();
		}
		
		$user['main'] = $ifUserExist;
		$user['photos'] = Photos::getPhotosByUserID($user['main']['user_id']);
		$user['main']['like_count'] = Activity::getLikesCount($user['main']['user_id']);
		$user['main']['comment_count'] = Activity::getCommentsCount($user['main']['user_id']);
		$user['main']['photo_count'] = Photos::getPhotosCount($user['main']['user_id']);
		
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
				
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(strtolower(htmlspecialchars($_POST['email'])));
				$password = hash("whirlpool", $_POST['newpass']);
				$token = hash("whirlpool", time());
				
				Users::add($login, $email, $password, $token);
				
				$message = "Hi, " . $login . "!\nPlease activate your account for <a href='http://" . $_SERVER['HTTP_HOST'] . "/user/activate/". $token . "/" . $email . "'> this link</a>.\n";
				self::sendMail($email, "Registration", $message);
// 				$_SESSION['user'] = $login;
				$this->redirect('/user/login');
		
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
// 		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}

}

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

	public static function isLoginValid($login) {
		if (!preg_match("/^[A-Za-z0-9]{3,20}$/i", $login))
			return false;
		return true;
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
		$header .= "From: Camagru <no-reply@gmail.com> \r\n";
		$header .= "MIME-Version: 1.0 \r\n";
		$header .= "Content-Transfer-Encoding: 8bit \r\n";
		$header .= "Date: ".date("r (T)")." \r\n";
		$header .= iconv_mime_encode("Subject", $subject, $subject_preferences);
		// Send mail
		mail($to, $subject, $message, $header);
	}

	public function actionChangeLogin() {
		if (!empty($_POST)) {
			$userid = intval($_POST['user_id']);
			$newLogin = trim(htmlspecialchars($_POST['new_login']));
			if ($this->isLoginValid($newLogin)) {
				if ($this->isLoginExist($newLogin)) {
					print("exist");
					return true;
				}
				Users::update("username", $newLogin, $userid);
				$_SESSION['user'] = $newLogin;
				print("changed");
				return true;
			} else {
				print("invalid");
				return true;
			}
		}
		Router::error404();
	}
	
	public function actionChangeEmail() {
		if (!empty($_POST)) {
			$userid = intval($_POST['user_id']);
			$newEmail = trim(htmlspecialchars($_POST['new_email']));
			if ($this->isEmailValid($newEmail)) {
				if (Users::getUserByEmail(trim(strtolower(htmlspecialchars($newEmail))))) {
					print("exist");
					return true;
				}
				Users::update("email", $newEmail, $userid);
				print("changed");
				return true;
			} else {
				print("invalid");
				return true;
			}
		}
		Router::error404();
	}
	
	public function actionChangePassword() {
		if (!empty($_POST)) {
			$userid = intval($_POST['user_id']);
			$oldPass = hash("whirlpool", $_POST['old_pass']);
			$newPass = hash("whirlpool", $_POST['new_pass']);
			$confPass = hash("whirlpool", $_POST['conf_pass']);
			
			$user = Users::getUserById($userid);
			if ($user['password'] !== $oldPass) {
				print("invalid");
				return true;
			} else if ($newPass !== $confPass) {
				print("noneidentical");
				return true;
			} else {
				Users::update("password", $newPass, $userid);
				print("changed");
				return true;
			}
		}
		Router::error404();
	}
	
	public function actionChangeNotification() {
		if (!empty($_POST)) {
			$userid = intval($_POST['user_id']);
			$user = Users::getUserById($userid);
			if ($user['notification'] == 1) {
				Users::update("notification", 0, $userid);
			} else {
				Users::update("notification", 1, $userid);
			}

			print("changed");
			return true;
		}
		Router::error404();
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
		$user['main']['like_count'] = Activity::getLikesCount($user['main']['user_id']);
		$user['main']['comment_count'] = Activity::getCommentsCount($user['main']['user_id']);
		$user['main']['photo_count'] = Photos::getPhotosCount($user['main']['user_id']);
		$user['photos'] = Photos::getPhotosByUserID($user['main']['user_id'], true);
		
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
				$login = trim(htmlspecialchars($_POST['login']));
				$email = trim(strtolower(htmlspecialchars($_POST['email'])));
				$password = hash("whirlpool", $_POST['newpass']);
				$token = hash("whirlpool", time());
				
				Users::add($login, $email, $password, $token);
				
				$message = "Hi, " . $login . "!\nPlease activate your account for <a href='http://" . $_SERVER['HTTP_HOST'] . "/user/activate/" . $token . "/" . $email . "'> this link</a>.\n";
				self::sendMail($email, "Registration", $message);
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
			Users::update("activate", 1, $user['user_id']);
		}
		
		require_once(ROOT.'/views/user/activate.php');
		
		return true;
	}
	
	public function actionLogout() {
		unset($_SESSION['user']);
		require_once(ROOT.'/views/user/logout.php');
		
		return true;
	}
	
	public function actionSelfie() {
		
		require_once(ROOT.'/views/user/selfie.php');
		return true;
	}
	
	public function actionGluedPhoto() {
		if (!empty($_POST)) {
			$photoBase64 = $_POST['image'];
			$stickerPath = $_POST['sticker'];
			$setAsAvatar = $_POST['avatar'];
			
			$photo = preg_replace("/^.+base64,/", "", $photoBase64);
			$photo = str_replace(' ', '+', $photo);
			$photo = base64_decode($photo); 
			$gd_photo = imagecreatefromstring($photo);
			if ($stickerPath !== "none") {
				
				$gd_filter = imagecreatefrompng(ROOT.$stickerPath);
				imagecopy($gd_photo, $gd_filter, 0, 0, 0, 0, imagesx($gd_filter), imagesy($gd_filter));
				ob_start();
					imagepng($gd_photo);
					$image_data = ob_get_contents();
				ob_end_clean();
			}
			
			print("data:image/png;base64," . base64_encode($image_data));
			return true;
		}
		Router::error404();
	}

}
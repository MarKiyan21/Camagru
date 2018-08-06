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
	
	public function actionLikeImage() {
		if (!empty($_POST)) {
			$userID = intval($_POST['user_id']);
			$imageID = intval($_POST['image_id']);
			$type = intval($_POST['like_type']);
			$notif = intval($_POST['notif']);
			$email = intval($_POST['email']);
			
			if ($type == 1) {
				Activity::likeImage($userID, $imageID);
				if ($notif == 1) {
					$message = "Hi! Someone like your <a href='http://" . $_SERVER['HTTP_HOST'] . "/photos/" . $imageID . "'> photo</a>.\n";
					UserController::sendMail($email, "Like", $message);
				}
			} else {
				Activity::unlikeImage($userID, $imageID);
			}
			return http_response_code(200);
		}
		Router::error404();
	}
	
	public function actionPostComment() {
		if (!empty($_POST)) {
			$userID = intval($_POST['user_id']);
			$imageID = intval($_POST['image_id']);
			$msg = trim(htmlspecialchars($_POST['message']));
			$notif = intval($_POST['notif']);
			$email = intval($_POST['email']);
		
			Activity::postComment($userID, $imageID, $msg);
			if ($notif == 1) {
				$message = "Hi! Someone comment your <a href='http://" . $_SERVER['HTTP_HOST'] . "/photos/" . $imageID . "'> photo</a>.\n";
				UserController::sendMail($email, "Comment", $message);
			}
	
			return http_response_code(200);
		}
		Router::error404();
	}

}
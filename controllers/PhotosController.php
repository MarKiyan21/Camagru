<?php

class PhotosController {
    public function actionIndex() {
        
        $allPhotos = Photos::getPhotosList();

        require_once(ROOT.'/views/photos/index.php');

        return true;
    }

    public function actionView($id) {
        
        $photoID = explode("/", $_SERVER['PATH_INFO']);
		$photoID = end($photoID);
		
		$photo = Photos::getPhotoById($photoID);
		
		if (empty($photo)) {
			Router::error404();
		}
		
		if (isset($_SESSION['user'])) {
			$access = 1;
			$user = Users::getUserById($photo['user_id']);
			$currentUser = Users::getUserByName($_SESSION['user']);
			if ($currentUser['username'] == $user['username']) {
				$access = 2;
			}
		} else {
			$access = 0;
		}
		$flag = 0;
		foreach ($photo['liked'] as $liked) {
			if (in_array($currentUser['user_id'], $liked)) {
				$flag = 1;
				break;
			}
		}
		$photo['is_liked'] = $flag;
		print_r($photo);
		require_once(ROOT.'/views/photos/view.php');

        return true;
    }
}
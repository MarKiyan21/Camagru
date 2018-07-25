<?php

class PhotosController {
    public function actionIndex() {
        
        $newsList = array();
//         $newsList = News::getNewsList();

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
			if ($_SESSION['user'] == $user['username']) {
				$access = 2;
			}
		} else {
			$access = 0;
		}
		print_r($photo);
		require_once(ROOT.'/views/photos/view.php');

        return true;
    }
}
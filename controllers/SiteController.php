<?php

class SiteController {

	public function actionIndex() {
		
		$lastPhotos = Photos::getPhotosList();
		
		require_once(ROOT.'/views/site/index.php');
		
		return true;
	}

}

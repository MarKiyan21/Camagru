<?php

class SiteController {

	public function actionIndex() {
		
		$lastPhotos = Photos::getPhotosList(true);
		
		require_once(ROOT.'/views/site/index.php');
		
		return true;
	}

}

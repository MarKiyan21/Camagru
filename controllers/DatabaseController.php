<?php
	
class DatabaseController {
	
	public function actionCreate() {
		$dbObject = new Db();
		
		$dbObject->actionCreate();
		
		return true;
	}

	public function actionDelete() {
		$dbObject = new Db();
		
		$dbObject->actionDelete();
		
		return true;
	}

}
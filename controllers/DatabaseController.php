<?php
include(ROOT."/config/setup.php");
	
class DatabaseController {
	
	public function actionCreate() {
		
		doSomethingWithDB("create");
		
		return true;
	}

	public function actionDelete() {
		
		doSomethingWithDB("delete");
		
		return true;
	}

}
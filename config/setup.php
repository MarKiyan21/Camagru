<?php

function doSomethingWithDB($action="create") {
	$dbObject = new Db();
	if ($action == "delete") {
		$dbObject->delete();
	} else {
		$dbObject->create();
	}
	return true;
}

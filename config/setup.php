<?php

function doSomethingWithDB($action="create") {
	$dbObject = new Db();
	$dbObject->$action();

	return true;
}

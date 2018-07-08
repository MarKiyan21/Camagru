<?php
$db = Db::getConnection();

if ($db) {
	echo "Database already exists" . PHP_EOL . "Do you really want to re-create 'camagru'? (y|n)" . PHP_EOL;
	do {
		$answer = strtolower(trim(fgets(STDIN)));
	} while ($answer != 'n' && $answer != 'y');
	if ($answer == 'y')
		Db::create();
}
else {
	Db::create();
	echo ("Database succesfully created" . PHP_EOL);
}

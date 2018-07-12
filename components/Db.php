<?php

class Db {
    
    public static function create() {
	    $db = self::getConnection();
        
        if ($db !== null) {
	        self::delete();
            $tables = file_get_contents(ROOT.'/config/mysql/tables.sql');
            try {
                $db->exec($tables);
            } catch (PDOException $e) {
            	echo ('Creation error: ' . $e->getMessage() . PHP_EOL);
				return false;
            }
        }
        if ($db === null) {
	        return false;
        }
        return true;
    }
    
    public static function delete() {
	    $db = self::getConnection();
	    
	    if ($db !== null) {
		    try {
	            $db->exec("DROP DATABASE camagru; CREATE DATABASE camagru;");
	            return true;
	        }
	        catch (PDOException $error) {
	            echo ('Deleting error: ' . $error->getMessage() . PHP_EOL);
	            return false;
	        }
	    }
    
        return false;
        
    }
    
    private static function getConnection() {

	    global $DB_DSN;
	    global $DB_USER;
	    global $DB_PASSWORD;
	    include(ROOT.'/config/database.php');
	    
	    try {
            $db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
            echo('Connection error: '. $e->getMessage() . PHP_EOL);
            $db = null;
        }
	    return $db;
    }

}
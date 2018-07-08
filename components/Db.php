<?php
class Db {
	
	private $db = null;
	
/*
	public function __construct()
    {        
        $sql = "
        
	        CREATE DATABASE IF NOT EXISTS camagru_db CHARACTER SET utf8 COLLATE utf8_general_ci;
			
			USE camagru_db
			
		    CREATE TABLE IF NOT EXISTS `users` (
			  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `username` varchar(255) DEFAULT NULL,
			  `email` varchar(255) DEFAULT NULL,
			  `password` varchar(255) DEFAULT NULL,
			  `user_pic` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`user_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		    
		    CREATE TABLE IF NOT EXISTS `images` (
			  `image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `user_id` int(11) DEFAULT NULL,
			  `likes` int(11) DEFAULT NULL,
			  `path` varchar(255) DEFAULT NULL,
			  PRIMARY KEY (`image_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		    
		    CREATE TABLE IF NOT EXISTS `comments` (
			  `comment_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `user_id` int(11) DEFAULT NULL,
			  `image_id` int(11) DEFAULT NULL,
			  `text` text,
			  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
			  PRIMARY KEY (`comment_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		    
			CREATE TABLE `likes` (
			  `like_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			  `image_id` int(11) DEFAULT NULL,
			  `user_id` int(11) DEFAULT NULL,
			  PRIMARY KEY (`like_id`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		";
        $result = $db->prepare($sql);
        $result->execute();
    }
*/
    
    private static function create() {
		self::getConnection();
        
        if (self::$db !== null) {
	        self::delete();
	        $camagru = file_get_contents(ROOT.'/config/mysql/camagru.sql');
            $tables = file_get_contents(ROOT.'/config/mysql/tables.sql');
            try {
                self::$db->exec($vote_query);
            } catch (PDOException $e) {
                echo ('Creation error: ' . $e->getMessage() . PHP_EOL);
                return false;
            }
        }
        return true;
    }
    
    private static function delete() {
        try {
            self::$db->exec("DROP DATABASE IF EXISTS camagru_db");
        }
        catch (PDOException $error) {
            echo ('Deleting error: ' . $error->getMessage() . PHP_EOL);
            return false;
        }
        return true;
    }
    
    public static function getConnection() {
	    if (!self::$db) {
		    global $DB_DSN;
		    global $DB_USER;
		    global $DB_PASSWORD;
		    
		    try {
	            self::$db = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	            self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        }
	        catch (PDOException $e) {
	            echo('Connection error: '. $e->getMessage() . PHP_EOL);
	            self::$db = null;
	        }
	    return self::$db;
    }

}
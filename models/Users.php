<?php

class Users {
	
	public static function add($nickname, $email, $password, $token) {
		$db = Db::getConnection();

		$sql = "INSERT INTO users (username, email, password, token) VALUES('$nickname', '$email', '$password', '$token');";
		$result = $db->query($sql);
		
		return $result;
	}
	
	public static function update($param, $value, $where) {
		$db = Db::getConnection();

		$sql = "UPDATE users SET " . $param . " = '" . $value ."' WHERE user_id='" . $where . "';";
		$result = $db->query($sql);
		
		return $result;
	}

    public static function getUserById($id) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('select * from users where user_id="'.$id.'"');
            
            // $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $user = $result->fetch();
		    
		    return $user;
        }
        return null;
    }
    
    public static function getUserByName($username) {
	    if ($username) {
		    $db = Db::getConnection();

		    $result = $db->query('SELECT * FROM users WHERE username="'.$username.'"');
		    $result->setFetchMode(PDO::FETCH_ASSOC);
		    
		    $user = $result->fetch();
		    
		    return $user;
	    }
	    return null;
    }
    
    public static function getUserByEmail($email) {
	    if ($email) {
		    $db = Db::getConnection();

		    $result = $db->query('SELECT * FROM users WHERE email="'.$email.'"');
		    $result->setFetchMode(PDO::FETCH_ASSOC);
		    
		    $user = $result->fetch();
		    
		    return $user;
	    }
	    return null;
    }

}
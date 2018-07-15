<?php

class Users {
	
	public static function add($nickname, $email, $password, $token) {
		$db = Db::getConnection();

		$sql = "INSERT INTO users (username, email, password, token) VALUES('$nickname', '$email', '$password', '$token');";
		$result = $db->query($sql);
		
		return $result;
	}
	
	public static function update($param, $value) {
		$db = Db::getConnection();

		$sql = "UPDATE users SET " . $param . " = " . $value .";";
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

/*
    public static function getNewsList() {
        
        $db = Db::getConnection();

        $newsList = array();

        $result = $db->query('SELECT id, title, date, short_content FROM news ORDER BY date DESC LIMIT 10');

        $i = 0;
        
        while($row = $result->fetch()) {
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $i++;
        }

        return $newsList;
    }
*/

}
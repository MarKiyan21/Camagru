<?php

class Activity {

    public static function getPhotoById($id=0) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM news WHERE id="' . $id . '"');
            
            // $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $newsItem = $result->fetch();

            return $newsItem;
        }
    }
    
	public static function getLikesCount($userid=0) {
	    $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM likes WHERE user_id="' . $userid . '"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $count = $result->fetch();

        return $count['COUNT(*)'];
    }
    
    public static function getCommentsCount($userid=0) {
	    $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM comments WHERE user_id="' . $userid . '"');

        $result->setFetchMode(PDO::FETCH_ASSOC);
        $count = $result->fetch();

        return $count['COUNT(*)'];
    }
    
    public static function likeImage($userid=0, $imageid=0) {
	    $db = Db::getConnection();

		$sql = "INSERT INTO likes (image_id, user_id) VALUES('$imageid', '$userid');";
		$result = $db->query($sql);
		
		return $result;
    }
    
    public static function unlikeImage($userid=0, $imageid=0) {
	    $db = Db::getConnection();

		$sql = "DELETE FROM likes WHERE image_id='" . $imageid . "' AND user_id = '" . $userid . "';";
		$result = $db->query($sql);
		
		return $result;
    }
    
    public static function postComment($userid=0, $imageid=0, $message="Wrong text!") {
	    $db = Db::getConnection();

		$sql = "INSERT INTO comments (user_id, image_id, text) VALUES('$userid', '$imageid', '$message');";
		$result = $db->query($sql);
		
		return $result;
    }

}
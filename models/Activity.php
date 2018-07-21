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

    public static function getPhotosList() {
        
        $db = Db::getConnection();

        $lastListPhotos = array();

        $result = $db->query('SELECT * FROM images ORDER BY date DESC LIMIT 15');

        $i = 0;
        
        while($row = $result->fetch()) {
            $lastListPhotos[$i]['image_id'] = $row['image_id'];
            $lastListPhotos[$i]['user_id'] = $row['user_id'];
            $lastListPhotos[$i]['likes'] = $row['likes'];
            $lastListPhotos[$i]['path'] = $row['path'];
            $lastListPhotos[$i]['date'] = $row['date'];
            $i++;
        }

        return $lastListPhotos;
    }

}
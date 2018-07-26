<?php

class Photos {

    public static function getPhotoById($id=0) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM images WHERE image_id="' . $id . '"');
            
            // $result->setFetchMode(PDO::FETCH_NUM);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            $photo = $result->fetch();

            return $photo;
        }
    }
    
	public static function getPhotosByUserID($userid=0) {
	    $db = Db::getConnection();

        $lastListPhotos = array();

        $result = $db->query('SELECT * FROM images WHERE user_id="' . $userid . '" ORDER BY date DESC LIMIT 15');

        $i = 0;
        
        while($row = $result->fetch()) {
            $lastListPhotos[$i]['image_id'] = $row['image_id'];
            $lastListPhotos[$i]['user_id'] = $row['user_id'];
            $lastListPhotos[$i]['likes'] = $row['likes'];
            $lastListPhotos[$i]['comments'] = $row['comments'];
            $lastListPhotos[$i]['path'] = $row['path'];
            $lastListPhotos[$i]['date'] = $row['date'];
            $i++;
        }

        return $lastListPhotos;
    }
	
	public static function getPhotosCount($userid=0) {
	    $db = Db::getConnection();

        $result = $db->query('SELECT COUNT(*) FROM images WHERE user_id="' . $userid . '"');

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
            $lastListPhotos[$i]['comments'] = $row['comments'];
            $lastListPhotos[$i]['path'] = $row['path'];
            $lastListPhotos[$i]['date'] = $row['date'];
            $i++;
        }

        return $lastListPhotos;
    }

}
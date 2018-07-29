<?php

class Photos {
	
	public static function add($userid=0, $path=null) {
		$db = Db::getConnection();

		$sql = "INSERT INTO images (user_id, path) VALUES('$userid', '$path');";
		$result = $db->query($sql);
		$last_id = $db->lastInsertId();
		
		return $last_id;
	}

    public static function getPhotoById($id=0) {
        $id = intval($id);

        if ($id) {

            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM images WHERE image_id="' . $id . '"');
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $photo = $result->fetch();
            
            $result = $db->query('SELECT username, user_pic FROM users LEFT JOIN images ON users.user_id = images.user_id WHERE images.user_id = "' . $photo['user_id'] . '";');
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $photo['owner'] = $result->fetch();
            
//             $result = $db->query('SELECT comments.* FROM comments LEFT JOIN images ON comments.image_id = images.image_id WHERE images.image_id = "' . $photo['image_id'] . '";');
			$result = $db->query('SELECT comments.*, users.username, users.user_pic FROM comments INNER JOIN images ON comments.image_id = images.image_id LEFT JOIN  users ON comments.user_id = users.user_id WHERE images.image_id = "' . $photo['image_id'] . '";');
// 			print_r($result->fetch());

            $photo['comments'] = array();
            
			$i = 0;
			while($row = $result->fetch()) {
				$photo['comments'][$i]['comment_id'] = $row['comment_id'];
				$photo['comments'][$i]['user_id'] = $row['user_id'];
				$photo['comments'][$i]['image_id'] = $row['image_id'];
				$photo['comments'][$i]['text'] = $row['text'];
				$photo['comments'][$i]['date'] = $row['date'];
				$photo['comments'][$i]['username'] = $row['username'];
				$photo['comments'][$i]['user_pic'] = $row['user_pic'];
				$i++;
			}
			
			$result = $db->query('SELECT likes.* FROM likes LEFT JOIN images ON likes.image_id = images.image_id WHERE images.image_id = "' . $photo['image_id'] . '";');
            $photo['liked'] = array();
            
			$i = 0;
			while($row = $result->fetch()) {
				$photo['liked'][$i]['like_id'] = $row['like_id'];
				$photo['liked'][$i]['image_id'] = $row['image_id'];
				$photo['liked'][$i]['user_id'] = $row['user_id'];
				$i++;
			}

            return $photo;
        }
    }
    
	public static function getPhotosByUserID($userid=0, $limit=false) {
	    $db = Db::getConnection();

        $lastListPhotos = array();

		if ($limit) {
			$result = $db->query('SELECT * FROM images WHERE user_id="' . $userid . '" ORDER BY date DESC LIMIT 15');
		} else {
			$result = $db->query('SELECT * FROM images WHERE user_id="' . $userid . '" ORDER BY date');
		}

        $i = 0;
        
        while($row = $result->fetch()) {
            $lastListPhotos[$i]['image_id'] = $row['image_id'];
            $lastListPhotos[$i]['user_id'] = $row['user_id'];
            $lastListPhotos[$i]['path'] = $row['path'];
            $lastListPhotos[$i]['date'] = $row['date'];
            
            $likeResult = $db->query('SELECT COUNT(*) FROM likes WHERE image_id="' . $row['image_id'] . '"');
	        $likeResult->setFetchMode(PDO::FETCH_ASSOC);
	        $count = $likeResult->fetch();
	        $lastListPhotos[$i]['likes'] = $count['COUNT(*)'];
	        
	        $commentResult = $db->query('SELECT COUNT(*) FROM comments WHERE image_id="' . $row['image_id'] . '"');
	        $commentResult->setFetchMode(PDO::FETCH_ASSOC);
	        $count = $commentResult->fetch();
	        $lastListPhotos[$i]['comments'] = $count['COUNT(*)'];

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

    public static function getPhotosList($limit=false) {
        
        $db = Db::getConnection();

        $lastListPhotos = array();

        if ($limit) {
	        $result = $db->query('SELECT * FROM images ORDER BY date DESC LIMIT 15');
        } else {
	        $result = $db->query('SELECT * FROM images ORDER BY date DESC');
        }

        $i = 0;
        
        while($row = $result->fetch()) {
            $lastListPhotos[$i]['image_id'] = $row['image_id'];
            $lastListPhotos[$i]['user_id'] = $row['user_id'];
            $lastListPhotos[$i]['path'] = $row['path'];
            $lastListPhotos[$i]['date'] = $row['date'];
            
            $likeResult = $db->query('SELECT COUNT(*) FROM likes WHERE image_id="' . $row['image_id'] . '"');
	        $likeResult->setFetchMode(PDO::FETCH_ASSOC);
	        $count = $likeResult->fetch();
	        $lastListPhotos[$i]['likes'] = $count['COUNT(*)'];
	        
	        $commentResult = $db->query('SELECT COUNT(*) FROM comments WHERE image_id="' . $row['image_id'] . '"');
	        $commentResult->setFetchMode(PDO::FETCH_ASSOC);
	        $count = $commentResult->fetch();
	        $lastListPhotos[$i]['comments'] = $count['COUNT(*)'];
            
            $i++;
        }

        return $lastListPhotos;
    }

}
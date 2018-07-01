<?php

class PhotosController {
    public function actionIndex() {
        
        $newsList = array();
//         $newsList = News::getNewsList();

        require_once(ROOT.'/views/photos/index.php');

        return true;
    }

    public function actionView($id) {
        
        $newsView = array();
//         $newsView = News::getNewsItemById($id);

// 		require_once(ROOT.'/views/news/view.php');
		echo("<pre>");
        print($id);
		echo("</pre>");
        return true;
    }
}
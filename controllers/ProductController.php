<?php

class ProductController {
    public function actionList() {
        echo "Products";
        return true;
    }
    
    public function actionRoma($phrase) {
	    echo "I love you!";
	    return true;
    }
}
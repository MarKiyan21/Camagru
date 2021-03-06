<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

	public static function error404() {
		require_once(ROOT.'/views/error/404.php');
		exit;
	}

    private function getUri() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

	private function redirect($url, $statusCode = 303) {
		header('Location: ' . $url, true, $statusCode);
		die();
	}

	private function checkPattern($uriPattern) {
		switch ($uriPattern) {
			case '^photos$':
				break;
			
			case '^user/login$':
			case '^user/register$':
				if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
	                $this->redirect("/");
	            }
	            break;
	            
// 	        case '^user/info/([A-Za-z0-9]*$)':
	        case '^photos/([0-9]+$)':
	        	if (!isset($_SESSION['user'])) {
// 			        print_r("AFTER REDIRECT TO LOGIN, WHEN USER NONE AUTHORIZED");
		            $this->redirect("/user/login");
		        }
		        break;
		}
	}

    public function run() {
        // Отримати рядок запиту
        $uri = $this->getUri();
        
        if (!isset($_SESSION))
			session_start();

        // Перевірити наявність такого запиту в routes.php
        foreach ($this->routes as $uriPattern => $path) {
	        
            if (preg_match("~$uriPattern~", $uri)) {
// 	            print_r("URI=>".$uri." Pattern=>".$uriPattern."!");
                   
                $this->checkPattern($uriPattern);

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments).'Controller';
                $controllerName = ucfirst($controllerName);
                
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                if ($controllerName == 'SiteController' && $actionName !== 'actionIndex') {
	                $this->error404();
                }

                $parameters = $segments;
                
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                }
                else {
	                $this->error404();
                }

                $controllerObject = new $controllerName;
                
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                
                if ($result != null) {
                    break;
                }
            }
        }
        // Якщо є, визначити який контролер і action оброблять запит

        // Підключити файл класу-контролера

        // Створити об'єкт, визвати метод (action)
    }

}
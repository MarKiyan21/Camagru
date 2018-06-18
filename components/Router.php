<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

	public function error404() {
		require_once(ROOT.'/views/error/404.php');
		exit;
	}

    private function getUri() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run() {
        // Отримати рядок запиту
        $uri = $this->getUri();

        // Перевірити наявність такого запиту в routes.php
        foreach ($this->routes as $uriPattern => $path) {
            if (preg_match("~$uriPattern~", $uri)) {

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
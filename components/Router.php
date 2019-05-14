<?php

class Router {

    private $routes;

    public function __construct() {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI() {

        if (!empty($_SERVER['REQUEST_URI'])) {

            return trim($_SERVER['REQUEST_URI'], '/'); //исправить в запросе обрезает последний символ
        }
    }

    private function getLocalUri() {

        if (!empty($_SERVER['REQUEST_URI'])) {

            //$uri = substr($_SERVER['REQUEST_URI'], 6);

            return substr(trim($_SERVER['REQUEST_URI'], '/'), 5) ; //исправить в запросе обрезает последний символ
        }
    }

    public function run() {

        $uri = $this->getURI();


        foreach ($this->routes as $uriPattern => $path) {

            //сравниваем $uri и $uriPattern
            if (preg_match("~$uriPattern~", $uri)) {

                //получаем внутрений путь из внешнего согласно правилу
                $internalRoute = preg_replace("`$uriPattern`", $path, $uri);


                // определить какой контролер и action, параметры


                $segments = explode('/', $internalRoute);
                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = "action" . ucfirst(array_shift($segments));


                $parameters = $segments; // массив после удаления названия Controller and Action
                // подключаем файл класса контроллера

                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    include_once($controllerFile);
                } else {
                    die($controllerName);
                }

                //создать обьект, вызвать метод

                $controllerObjects = new $controllerName;

                ini_set('display_errors', 'Off'); // wrong uri cause error here and $result equals NULL.
                $result = call_user_func_array(array($controllerObjects, $actionName), $parameters);
                ini_set('display_errors', 'On'); // wrong uri cause error here and $result equals NULL.


                if ($result == NULL) { // if $result equals NULL user type wrong uri and we have error in the code above
                    include_once ROOT . '/controllers/ErrorController.php';
                    call_user_func_array(array(new ErrorController, 'actionIndex'), $parameters); // call the wrong uri error 404
                } else {

                    break;
                }
            }
        }
    }

}

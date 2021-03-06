<?php

namespace core;

class Route {

    static public function start() {
        // контроллер и действие по умолчанию
        $controller_name = 'main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (count($routes) > 3) {
            self::errorPage404();
        }


        if (!empty($routes[1])) {
            $controller_name = strtolower($routes[1]);
        }


        if (!empty($routes[2])) {
            $action_name = strtolower($routes[2]);
        }



        $controller_name = ucfirst($controller_name);

        $model_name = 'models\Model' . $controller_name;
        $controller_name = 'controllers\Controller' . $controller_name;
        $action_name = 'action_' . $action_name;



        $model_path = 'app' . DIRECTORY_SEPARATOR . $model_name . '.php';

        if (file_exists($model_path)) {
            include_once $model_path;
        }


        $controller_path = 'app' . DIRECTORY_SEPARATOR . $controller_name . '.php';

        if (file_exists($controller_path)) {
            include_once $controller_path;
        } else {

            self::errorPage404();
        }

        $controller = new $controller_name;

        if (method_exists($controller, $action_name)) {

            $controller->$action_name();
        } else {
            self::errorPage404();
        }
    }

    static public function errorPage404() {
        header('HTTP/1.1 404 Not Found');
        header('Status: 404 Not Found');

        include_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'page404.php';
        exit();
    }

}

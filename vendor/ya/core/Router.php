<?php


namespace ya;


class Router
{
    protected static $routes = [];
    protected static $route = [];

    public static function add($regexp,$route = []) {
        self::$routes[$regexp] = $route;
    }

    public static function getRoutes() {
        return self::$routes;
    }
    public static function getRoute() {
        return self::$route;
    }

    public static function dispatch($url) {
        $url = self::removeQueryStr($url);
        if(self::mathcRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'] .self::$route['controller'] . 'Controller';
            if(class_exists($controller)) {
                $controlerObject = new $controller(self::$route);
                $action = self::lowerCameelCase(self::$route['action']) . 'Action';
                if(method_exists($controlerObject, $action)) {
                    $controlerObject->$action();
                    $controlerObject->getView();
                } else {
                    throw new \Exception("Метод $controller::$action не найден!", 404);

                }
            } else {
                throw new \Exception("Контроллер $controller не найден!", 404);
            }
        }
        else {
            throw new \Exception('Страница не найдена!', 404);
        }
    }
    public static function mathcRoute($url) {
            foreach(self::$routes as $pattern => $route) {
                if(preg_match("#{$pattern}#", $url, $matches)) {
                    foreach($matches as $k => $v) {
                        if(is_string($k)) {
                            $route[$k] = $v;
                        }
                    }
                    if(empty($route['action'])) {
                        $route['action'] = 'index';
                    }
                    if(!isset($route['prefix'])) {
                        $route['prefix'] = '';
                    } else {
                        $route['prefix'] .= '\\';
                    }
                    $route['controller'] = self::upperCameelCase($route['controller']);
                    self::$route = $route;
                    return true;
                }
            }
                    return false;

            }

            protected static function upperCameelCase($name) {
                 return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));

            }
            protected static function lowerCameelCase($name) {
                return lcfirst(self::upperCameelCase($name));
            }

            protected static function removeQueryStr($url) {
                    if($url) {
                        $par = explode('&' ,$url, 2);
                        if(false === strpos($par[0], '=')) {
                            return rtrim($par[0], '/');
                        } else {
                            return '';
                        }
                    }
            }

}
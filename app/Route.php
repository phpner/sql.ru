<?php
namespace App;
use App\Controllers;
class Route
{
    private static $routes = [];
    private static $route = [];
    private static $post = [];

    /**
     * @param $path
     * @param $route
     * Добавление роутера
     */

    public static function add($path, $route)
    {
        self::$routes[$path] = $route;

        if ($_SERVER['REQUEST_METHOD'] == POST)
        {
            self::$post = $_POST;
        }
    }

    /**
     * @return mixed
     * получить весть массив с роутерами
     */
    public static function gerRoutes()
    {
        return self::$routes;
    }

/**
     * @return mixed
     * Получить роутер
     */
    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * @param $url
     * @return bool
     * Проверка есть ли роутер
     */
    public static function matchRoute($url)
    {
        foreach (self::$routes as $pattern => $route)
        {
            if ($pattern === $url)
            {
                $res = explode('@', $route);
                self::$route['controller'] = $res[0];
                self::$route['action'] = $res[1];
                return true;
            }
        }
        return false;
    }

    /**
     * Подключение классков
     */
    public static function dispatch($url)
    {
        if (self::matchRoute($url))
        {
            $controller = self::$route['controller'];
            $action  = self::$route['action'];
            try {
                $rc = new \ReflectionClass('\App\Controllers\\'.$controller);


            if ($rc->hasMethod($action)){
                $rm= $rc->getMethod($action);
                $instance= $rc->newInstance();
                $post = self::$post;
                $result= $rm->invoke($instance,$post);
            }else{
                echo "$action  метода нет в классе $controller \n";
            }
            }catch (\ReflectionException $e){

                echo $e->getMessage();
                http_response_code(404);
            }

        }else{
            http_response_code(404);
            var_dump('Ошибка в роутери!');
        }

    }
}
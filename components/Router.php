<?php

namespace components;
//use controllers\ProductController;

class Router
{
    private $routes;

    public function __construct() {

        $routesPath = 'config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     * @return string|void
     */
    private function getUrl(){
        $url = '';

        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * @return void
     */
    public function run()
    {
        $url= $this->getUrl();

        foreach($this->routes as $urlPattern => $path)
        {
            if(preg_match("~$urlPattern~", $url))
            {
                $internalRoute = preg_replace("~$urlPattern~", $path, $url);

                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) . 'Controller';
                $actionName = array_shift($segments);

                $parameters = $segments;

                $namespaceControllerName = 'controllers\\' . $controllerName;

                if(class_exists($namespaceControllerName))

                    $controllerObject = $namespaceControllerName;
                $result = call_user_func_array([$controllerObject, $actionName], $parameters);


                if($result != null)
                {
                    break;
                }

            }
        }
    }

}
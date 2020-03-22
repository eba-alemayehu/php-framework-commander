<?php

namespace Commander\Action;

use Application\Http\Router;
use Commander\Util\Color;
use Console_Table;

class RouteList extends Action{
    public $action = "route:list"; 

    public function help(){
        return "List all routes"; 
    }
    
    public function run($args)
    {
        $router = new Router(false); 
        $routes = $router->loadRouter(); 

        $table = new Console_Table(); 
        $table->setHeaders(['Method', 'URL', 'Controller', 'Middelware']);

        foreach($routes as $route){
            $table->addRow([$route->method, $route->url, $route->controller, implode(', ', $route->middlewares)]);
        }
        echo $table->getTable();
    }
}
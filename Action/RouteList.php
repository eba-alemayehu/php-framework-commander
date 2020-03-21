<?php

namespace Commander\Action;

use Application\Http\Router;
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
        $table->setHeaders(['URL', 'Controller', 'Middelware']);

        foreach($routes as $route){
            $table->addRow([$route->url, $route->controller, implode(', ', $route->middlewares)]);
        }
        echo $table->getTable();
    }
}
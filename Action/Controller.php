<?php

namespace Commander\Action; 
require 'Action.php'; 

class Controller extends Action {

    public $action = "make:controller"; 

    public function help(){
        return "make new contoller"; 
    }

    public function run(array $params){
        $controller_templet = fread(fopen(APPLICATION_ROOT."/vendor/Application/Commander/Action/Templets/controller.php", "r"),
        filesize(APPLICATION_ROOT."/vendor/Application/Commander/Action/Templets/controller.php"));
        if(isset($params[0])){
            $controller_templet = str_replace("{name}", $params[0], $controller_templet);
        }else{
            die("module name and controller name is not supplied"); 
        }

        $new_controller = fopen(APPLICATION_ROOT."/app/Http/Controllers/".$params[0]."Controller.php", "w+");
        fwrite($new_controller, $controller_templet); 
    }
}
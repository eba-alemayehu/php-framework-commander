<?php

namespace Commander\Action;

use Commander\Kernel;
use Commander\Util\Color;

class Help extends Action{
    public $action = "help"; 

    public function help(){
        return "Create new migration"; 
    }
    
    public function run($args)
    {
       echo Color::green("All commandes in applciation \r\n \r\n"); 

       $actions = (new Kernel([]))->actions; 

       foreach($actions as $action){
           $action = new $action; 
           echo str_pad(Color::green($action->action), 30 ) . $action->help() . "\n";
       }
    }
}
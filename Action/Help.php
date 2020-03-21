<?php

namespace Commander\Action;

use Commander\Kernel;
use Commander\Util\Color;

class Help extends Action{
    public $action = "help"; 

    public function help(){
        return "Show information for all commands"; 
    }
    
    public function run($args)
    {
       echo Color::yellow("All commandes in applciation \r\n \r\n"); 

       $actions = (new Kernel([]))->actions; 

       foreach($actions as $action){
           $action = new $action; 
           echo str_pad(Color::green($action->action), 30 ) . $action->help() . "\r\n";
       }
    }
}
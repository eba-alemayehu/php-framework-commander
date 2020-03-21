<?php

namespace Commander\Action;

use Commander\Util\Color;

class Migrate extends Action{
    public $action = "make:migration"; 

    public function help(){
        return "Create new migration"; 
    }
    
    private function migrate($class){
        $namespace = "\\App\\Database\\Migrations\\";
        $obj = $namespace."".$class;

        $mig = new $obj();
        $mig->up();
        $table = $mig->create();
        echo Color::green("\t $table table is created."); 
    }
    public function run($args)
    {
        echo Color::yellow("Migration started. \n"); 
        if(isset($args[0])){
            $this->migrate($args[0]);
        }else{

            $migrations = scandir(APPLICATION_ROOT . "/app/Database/Migrations/");
            foreach ($migrations as $migration) {
                if ($migration != "." && $migration != "..") {
                    $this->migrate(explode(".", $migration)[0]);
                }
            }
        }
        echo Color::yellow("Migration finished. \n");  
    }
}
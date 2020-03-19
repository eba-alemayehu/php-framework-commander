<?php

namespace Commander\Action; 

class Migration extends Action{
    public $action = "make:migration"; 

    public function help(){
        return "Create new migration"; 
    }
    
    public function run($params)
    {
        if(isset($params[0])){
           
            $this->templet(
                __DIR__."/Templets/migration.php", 
                APPLICATION_ROOT."/app/Http/Controllers/".$params[0]."Migration.php", 
                ["name" => $params[0]]); 
            $this->templet(
                __DIR__."/Templets/model.php", 
                APPLICATION_ROOT."/app/Http/Controllers/".$params[0].".php", 
                ["name" => $params[0]]); 

        }else{
            throw new \Exception("module name and controller name is not supplied"); 
        }
    }
}
<?php

namespace Commander\Action; 

class Migration extends Action{
    public $action = "make:migration"; 

    public function help(){
        return "Create new migration"; 
    }
    
    public function run($args)
    {
        $migration_templet = fread(fopen(APPLICATION_ROOT."vendor/Application/Commander/Action/Templets/migration.php", "r"),
        filesize(APPLICATION_ROOT."vendor/Application/Commander/Action/Templets/migration.php"));

        $model_templet = fread(fopen(APPLICATION_ROOT."vendor/Application/Commander/Action/Templets/model.php", "r"),
        filesize(APPLICATION_ROOT."vendor/Application/Commander/Action/Templets/model.php"));

        if(isset($args[3])){
            $migration_templet = str_replace("{table}", $args[3]."Migration", $migration_templet);
            $model_templet = str_replace("{model}", $args[3], $model_templet);
        }else{
            die("module name and controller name is not supplied"); 
        }

        $new_migration = fopen(APPLICATION_ROOT."/app/Database/Migrations/".$args[3]."Migration.php", "w+");
        $new_model = fopen(APPLICATION_ROOT."/app/Models/".$args[3].".php", "w+");

        fwrite($new_migration, $migration_templet);
        fwrite($new_model, $model_templet);
    }
}
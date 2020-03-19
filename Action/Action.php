<?php 

namespace Commander\Action; 

abstract class Action {
    abstract public function run(array $params); 
    abstract public function help(); 
}
<?php

class Controller{

    protected function view($view, $data = []){
        if(file_exists("../app/views/". $view . ".php")){
            include "../app/views/". $view . ".php";
        }else{
            include "../app/views/404.php";
        }
    }

    protected function loadClass($class){

        if(file_exists("../app/classes/". $class . ".php")){
            include "../app/classes/". $class . ".php";
            return new $class();
        }

        return false;
    }

    
}
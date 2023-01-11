<?php

class Auth extends Controller{
     

    public function index(){
        header("Location:". ROOT . "auth/login");
        die;
    }

    public function login(){

        if(is_logged_in()){
            header("Location:". ROOT . "home");
            die;
        }

        $auth = $this->loadClass("authentication");

        if(isset($_POST["login"])){
            $auth->login($_POST);
        }

        $this->view("login");
    }

    public function signup(){
        
        if(is_logged_in()){
            header("Location:". ROOT . "home");
            die;
        }

        $auth = $this->loadClass("authentication");

        if(isset($_POST["signup"])){
            $auth->signup($_POST);
        }

        $this->view("signup");
    }

    public function logout(){
        $auth = $this->loadClass("authentication");
        $auth->logout();
    }
}
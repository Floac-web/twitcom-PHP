<?php

class Posts extends Controller{

    public function index($user_id = null){

        if(isset($_SESSION["user_id"]) && $_SESSION["user_id"] == $user_id){
            header("Location:". ROOT . "posts/my");
            die;
        }

        $post = $this->loadClass("post");
        $user = $this->loadClass("user");

        $data["user_name"] = $user->getName($user_id);
        $data['postList'] = $post->getAllbyUser($user_id);

        

        $this->view("user_posts",$data);
    }

    public function my(){

        if(!is_logged_in()){
            header("Location:". ROOT . "auth/login");
            die;
        }

        $post = $this->loadClass("post");

        $data["user_name"] = $_SESSION["user_name"];
        $data['postList'] = $post->getAllbyUser($_SESSION["user_id"]);

        $this->view("my_posts",$data);
    }

    public function edit($post_id = null){

        if(!isset($post_id)){
            header("Location:". ROOT . "home");
            die;
        }

        if(!is_logged_in()){
            header("Location:". ROOT . "auth/login");
            die;
        }

        $post = $this->loadClass("post");
        $data["post_obj"] = $post->get($post_id);

        if($data["post_obj"]->user_id != $_SESSION["user_id"]){
            header("Location:". ROOT . "home");
            die;
        }

        if(isset($_POST["edit_post"])){
            $post->update($_POST["content"], $post_id);

            header("Location:". ROOT . "posts/my");
            die;
        }

        $this->view("post_form",$data);

    }

    public function add(){

        if(!is_logged_in()){
            header("Location:". ROOT . "auth/login");
            die;
        }

        $post = $this->loadClass("post");

        if(isset($_POST["add_post"])){
            $post->create($_POST["content"],$_SESSION["user_id"]);

            header("Location:". ROOT . "posts/my");
            die;
        }

        $this->view("post_form");
    }
}
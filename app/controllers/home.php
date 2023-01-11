<?php

class Home extends Controller{
    public function index(){

        $data["page_title"] = "Home";

        $post = $this->loadClass("post");
        $data['postList'] = $post->getAll();


        $this->view("home",$data);
    }
}
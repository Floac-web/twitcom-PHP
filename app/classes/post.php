<?php

class Post extends Database{


    public function getAll(){

        $stmt = $this->dbh->prepare("SELECT * FROM posts ORDER BY created DESC");
        $stmt->execute();

        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        return false;
    }

    public function getAllbyUser($user_id){

        $stmt = $this->dbh->prepare("SELECT * FROM posts WHERE user_id = ? ORDER BY created DESC");
        $stmt->execute(array($user_id));

        if($stmt->rowCount() > 0){
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }

        return false;
    }

    public function get($post_id){
        $stmt = $this->dbh->prepare("SELECT * FROM posts WHERE post_id = ?");
        $stmt->execute(array($post_id));

        if($stmt->rowCount() == 1){
            return $stmt->fetch(PDO::FETCH_OBJ);
        }

        return false;
    }


    public function create($post_text,$user_id){

        $stmt = $this->dbh->prepare("INSERT INTO posts (content,user_id) VALUES (?,?)");

        if($stmt->execute(array($post_text,$user_id))){
            return true;
        }

        return false;
    
    }

    public function update($post_text,$post_id){
        $stmt = $this->dbh->prepare("UPDATE posts SET content = ? WHERE post_id = ?");

        if($stmt->execute(array($post_text,$post_id))){
            return true;
        }

        return false;

    }

    public function delete($post_id){
        $stmt = $this->dbh->prepare("DELETE FROM posts WHERE post_id = ?");

        if($stmt->execute(array($post_id))){
            return true;
        }

        return false;

    }
}
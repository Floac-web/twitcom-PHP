<?php

class User extends Database{

    public function getName($user_id){
        $stmt = $this->dbh->prepare("SELECT user_name FROM users WHERE user_id = ?");
        $stmt->execute(array($user_id));

        if($stmt->rowCount() == 1){
            return $stmt->fetch(PDO::FETCH_OBJ)->user_name;
        }

        return null;
    }
}
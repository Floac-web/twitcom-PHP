<?php

class Authentication extends Database
{

    public function login($POST)
    {
        unset($_SESSION["error"]);

        if(is_logged_in()){
            $_SESSION["error"] = "you are already looged in";
            header("Location:". ROOT . "home");
            die;
        }

        if ($POST["email"] == "" && $POST["password"] == "") {
            $_SESSION["error"] = "please enter correct email and password";
            header("Location:". ROOT . "auth/login");
            die;
        }

        if (!$this->is_user_exist($POST["email"])) {
            $_SESSION["error"] = "wrong email or password";
            header("Location:". ROOT . "auth/login");
            die;
        }

        $stmt = $this->dbh->prepare("SELECT user_id, user_name, created FROM users WHERE user_email = ? AND user_password = ?");
        $stmt->execute(array($POST["email"], $POST["password"]));

        $user_data = $stmt->fetch(PDO::FETCH_OBJ);

        $_SESSION["user_id"] = $user_data->user_id;
        $_SESSION["user_email"] = $POST["email"];
        $_SESSION["user_name"] = $user_data->user_name;
        $_SESSION["user_created"] = $user_data->created;

        header("Location:". ROOT . "home");

    }

    public function signup($POST)
    {
        unset($_SESSION["error"]);

        if(is_logged_in()){
            $_SESSION["error"] = "you are already looged in";
            header("Location:". ROOT . "home");
            die;
        }

        if ($POST["email"] == "" && $POST["password"] == "" && $POST["name"] == "") {
            $_SESSION["error"] = "please enter correct email, password and name";
            header("Location:". ROOT . "auth/signup");
            die;
        }

        if ($this->is_user_exist($POST["email"])) {
            $_SESSION["error"] = "user already exist";
            header("Location:". ROOT . "auth/signup");
            die;
        }

        $stmt = $this->dbh->prepare("INSERT INTO users (user_name, user_email, user_password)
        VALUES (?,?,?)");
        $stmt->execute(array($POST["name"],$POST["email"], $POST["password"]));

        header("Location:". ROOT . "auth/login");
        
    }

    public function logout(){

        unset($_SESSION["user_id"]);
        unset($_SESSION["user_email"]);
        unset($_SESSION["user_name"]);
        unset($_SESSION["user_created"]);

        header("Location:". ROOT . "home");
        die();

    }


    private function is_user_exist($email)
    {
        $stmt = $this->dbh->prepare("SELECT user_id FROM users WHERE user_email = ?");
        $stmt->execute(array($email));

        if ($stmt->rowCount() > 0) {
            return true;
        }

        return false;
    }
}

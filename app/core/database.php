<?php

class Database{
    private $db_type = DB_TYPE;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    
    protected $dbh;

    public function __construct(){
        $dsn = $this->db_type . ":host=" . $this->host . ";dbname=" . $this->dbname;

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );

        try{
            $this->dbh = new PDO($dsn,$this->user,$this->pass,$options);
            return $this->dbh;
        } catch (PDOException $e){
            die($e->getMessage());
        }
    }
}
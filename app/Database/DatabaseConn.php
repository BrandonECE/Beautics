<?php

class DatabaseConn {

    public static $instance = null;
    public $dbConn;

    public function __construct(
        private $host,
        private $dbname,
        private $usern,
        private $passw
    ){ $this->createConn(); }

    private function createConn(){
        try {

            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            $conn = new PDO($dsn, $this->usern, $this->passw);
            $this->dbConn = $conn;

        } catch(PDOException $e){
            die($e->getMessage());
        }
    }   

    public function runQuery($query, $params = []){
        try {

            $stmt = $this->dbConn->prepare($query);
            $stmt->execute($params);

            if($stmt->rowCount() > 0){
                return $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                return [];
            }

        } catch(PDOException $e){
            throw $e;
        }
    }

    public function getdbConn(){
        return $this->dbConn;
    }

    public static function getInstance(){
        if (Self::$instance == null)
            Self::$instance = new DatabaseConn(DB_HOST, DB_NAME, DB_USER, DB_PASSW);

        return Self::$instance;
    }

}
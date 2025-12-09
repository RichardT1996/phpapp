<?php
class Dbconnection {

    private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbName;

    public function __construct() {
        $this->dbHost     = getenv('DB_HOST') ?: 'db';
        $this->dbUsername = getenv('DB_USER') ?: 'root';
        $this->dbPassword = getenv('DB_PASS') ?: '12345';
        $this->dbName     = getenv('DB_NAME') ?: 'docker_database';
    }

    public function connect(){
        try{
            $conn = new PDO("mysql:host=".$this->dbHost.";dbname=".$this->dbName, $this->dbUsername, $this->dbPassword);
            $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e){
            die("Failed to connect with MySQL: " . $e->getMessage());
        }
    }
}
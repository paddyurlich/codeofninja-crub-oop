<?php
class Database{
 
    // specify your own database credentials
    private $host = "change_to_your_db_host";
    private $db_name = "change_to_your_db_name";
    private $username = "change_to_your_db_username";
    private $password = "change_to_your_db_password";
    public $conn;
 
    // get the database connection
    public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}
?>
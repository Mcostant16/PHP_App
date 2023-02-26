<?php
// Author:Mark Costantino
// 
// Dated Created: 3/29/2022
// Date Last Modified: 3/9/2022
// Modifications:
// Version 1.0 3/29/2022 Mark Costantino
// 	    (a) Original production version

    error_reporting(E_ALL ^ E_NOTICE);
    date_default_timezone_set('America/New_York');

    $dsn = "mysql:host=127.0.0.1;dbname=stock;charset=utf8";
    $username = 'test';
    $password = 'test';
	
   try {
    $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_msg = $e->getMessage();
			echo 'Connect to '.$dsn.' failed.<br>';
			echo 'Error: '.$error_msg.'<br>';
			exit();
    } 



class Database{
 
        // specify your own database credentials
        private $host = "127.0.0.1";
        private $db_name = "stock";
        private $username = "test";
        private $password = "test";
        public $conn;
     
        // get the database connection
        public function getConnection(){
     
            $this->conn = null;
     
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
                $this->conn->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connection error: " . $exception->getMessage();
            }
     
            return $this->conn;
        }
}

?>


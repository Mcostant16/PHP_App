<?php
// Author: J. Dean Copple
// PHP code to connect to Master Syllabi databaase PSCCAPS [database.php]
// Dated Created: 3/29/2022
// Date Last Modified: 3/9/2022
// Modifications:
// Version 1.0 3/29/2022 J. Dean Copple
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
?>


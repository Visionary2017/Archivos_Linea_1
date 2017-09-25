<?php

    try {
        $host = "db4free.net";
		$dbname = "bdlinea1";
		$port = "3307";
        $user = "adminlinea1";
        $pass = "AdminLinea1";
        
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname; charset=utf8", $user, $pass);
        return $con;
    } catch(PDOException $e) {
        echo 'Error connect ' . $e->getMessage();
    }

?>
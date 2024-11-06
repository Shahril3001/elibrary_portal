<?php
	function dbconn(){
		try {
			$host = "localhost";
			$dbname = "booksforlibrary_db";
			$username = "admin";
			$password = '1234';

			$dsn = "mysql:host=".$host.";dbname=".$dbname."";  //

			$connection = new PDO($dsn, $username, $password);
			$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $connection;

		}catch(PDOException $e){
			echo $e->getMessage();
			echo $e->getLine();
			echo $e->getTrace();
		}
	}
?>

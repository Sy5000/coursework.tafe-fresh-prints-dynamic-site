<?php

// all database interactions should be done in MODEL

//create variables = DB credentials
$host = 'localhost';
$db = 'fresh_prints';
$user = 'root';
$password = 'root';

// establish connection and assign to variable,
// var can be quickly called to connect to DB anywhere
$conn = "mysql:host=$host;dbname=$db;charset=UTF8";

try {
// new PhpDataObject/PDO
// PDO stores all variables as 1 object
//can be quickly called to establish connection to database
$pdo = new PDO($conn, $user, $password);

		if ($pdo) {
		// delete comment out to test connections
		 //echo "Welcome, you are currently connected to the '$db' database";
	}

} catch (PDOException $e) {
	echo $e->getMessage();
}

?>

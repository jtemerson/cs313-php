<?php
//connect to the database
$dbUser = 'postgres';
$dbPassword = 'tjpjtpp7';
$dbName = 'postgres';
$dbHost = '127.0.0.1';
$dbPort = '5432';
try{
	// Create the PDO connection
	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
	//$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}catch (PDOException $ex){
	echo "Error connecting to DB. Details: $ex";
	die();
}
 ?>

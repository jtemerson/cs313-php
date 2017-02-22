//connect to the database
$dbUser = 'agiktypvbhydcj';
$dbPassword = '9ae4f3fc76191a88de70e0f68af973aa9425d7e8683d25dd5bcc4417f85adcd1';
$dbName = 'd1lkt0bdacr4qm';
$dbHost = 'ec2-54-225-71-119.compute-1.amazonaws.com';
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

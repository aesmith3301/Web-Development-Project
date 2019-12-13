<?php 
$db = connectToDatabase();
	$userName = $_POST["user"];
	$taken = userTaken($userName, $db);
	if($taken){
		$response = "userTakenError";
	}
	mysqli_close($db);	

	function connectToDatabase(){
	$host = "fall-2019.cs.utexas.edu";
	$user = "cs329e_mitra_aes3301";
	$pwd = "chrome2hung9Plus";
	$dbs = "cs329e_mitra_aes3301";
	$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

	if (empty($connect))
	{
		die("mysqli_connect failed: " . mysqli_connect_error());
	}
	return $connect;

}

function userTaken($userName, $db){
	$table = "passwd";

	$result = mysqli_query ($db, "select * from $table where username = '$userName';");

	//echo mysqli_num_rows($result);
	$numHits = mysqli_num_rows($result);
	$result->free();

	if ($numHits == 0)
	{	

	  return false;
	}
	else
	{
	  return true;
	}

}
?>
<?php
session_start();
if(isset($_POST["save"])){
	echo "trying to save results";
 //check if user is logged in
 //if not, go to login page and still save
 //if the user is logged in, save results to db  
 	if(isset($_SESSION['username'])){
 		//echo "session set";
 		if(!empty($_SESSION['answers'])){
 			$arr = $_SESSION['answers'];
		$arr = implode(",",$arr);
 		$userName = $_SESSION['username'];
 		$time = time();
 		
 		$host = "fall-2019.cs.utexas.edu";
  		$user = "cs329e_mitra_fangyb";
  		$pwd = "room8dual6piggy";
  		$dbs = "cs329e_mitra_fangyb";
  		$port = "3306";
  		$db = mysqli_connect ($host, $user, $pwd, $dbs, $port);
  		
        $table = "user_results";
        $stmt = "INSERT INTO $table VALUES ('$userName','$arr',FROM_UNIXTIME('$time'));";
        //print($stmt);
        if(mysqli_query($db, $stmt)){ 
           unset($_SESSION['answers']);
           echo "success";
        } else {
          echo "failure";
        }

      	mysqli_close($db); 
 		}
 		else echo "failure";
 		
}
		exit();
}

else if(isset($_POST["about"])){
    header('Location: ./aboutPage.html');
}

else if(isset($_POST["castle"])){
    header('Location: ./castle/q1.html');
}

else header('Location: ./home.php');


?>
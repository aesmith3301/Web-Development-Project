<?php
//Connect to the MySQL database
  $host = "fall-2019.cs.utexas.edu";
  $user = "cs329e_mitra_fangyb";
  $pwd = "room8dual6piggy";
  $dbs = "cs329e_mitra_fangyb";
  $port = "3306";
  $db = mysqli_connect ($host, $user, $pwd, $dbs, $port);
  if (isset($_POST['username_check'])) {
        $username = $_POST['username'];
        $sql = "SELECT * FROM users WHERE username='$username'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
          echo "taken";
        }else{
          echo 'not_taken';
        }
        exit();
  }
  if (isset($_POST['save'])) {
        $username = $_POST['username'];
	$password = $_POST['password'];
	$username=mysqli_real_escape_string($db,$username);
	$password=mysqli_real_escape_string($db,$password);
        $sql = "SELECT * FROM users WHERE username='$username'";
        $results = mysqli_query($db, $sql);
        if (mysqli_num_rows($results) > 0) {
          echo "exists";
          exit();
        }else{
        $stmt = mysqli_prepare($db, "INSERT INTO users VALUES (?,?)");
        $sql2 = "INSERT INTO profiles VALUES ('$username','','','')";
        mysqli_stmt_bind_param($stmt,'ss',$username,$password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        //while ($row = $result->fetch_row()){
                //print "username=".$row[0]."password=".$row[1]."<br>\n";
        //}
	//$result -> free();
        echo 'Saved!';
        exit();
        }
  }

?>

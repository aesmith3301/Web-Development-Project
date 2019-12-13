<?php
//Connect to the MySQL database
  $host = "fall-2019.cs.utexas.edu";
  $user = "cs329e_mitra_fangyb";
  $pwd = "room8dual6piggy";
  $dbs = "cs329e_mitra_fangyb";
  $port = "3306";
  $db = mysqli_connect ($host, $user, $pwd, $dbs, $port);
  if (isset($_POST['bio'])) {
        $table = "profiles";
        $username = $_POST['username'];
        $bio = $_POST['bio'];
        $stmt = "UPDATE $table SET bio='$bio' WHERE user='$username';";
        print($stmt);
        if(mysqli_query($db, $stmt)){ 
           echo "success";
        } else {
          echo "failure";
        }

      mysqli_close($db); 
      exit();
  }

?>

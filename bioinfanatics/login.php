<?php
session_start();
?>
<html>
<head>
<title>Login Page</title>
<link href="./login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="navbar" style="position:fixed;top:0px;width:100%;font-family: Arial;">
                        <a href="./aboutPage.html">About</a>
                        <div class="dropdown">
                                <button class="dropbtn">Theme
                                        <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                        <a href="./castle/q1.html">Castle</a>
                                        <a href="./theForest/forest.html">Forest</a>
                                </div>
                        </div>
                        <a href="#news">Contact</a></div>
 <h2>Login</h2> 
<form action="./login.php" method="POST" id="loginForm">
<table>
<tr><td class="label">Username:</td><td><input type="text" maxlength="20" name="username"></td></tr>
<tr><td class="label">Password:</td><td><input type="password" maxlength="50" name="password"></td></tr>
</table>
<span>
<input id="loginBtn" type="submit" name="login" value="login"/></span>
<br>
</form>
<span>
<a href="./register.php" id="regLink">New here? Sign up!</a>
</span>
<div>
<img src="./loginImage2.jpg" id="loginImg">
</body>
</html>
<?php
$username = htmlentities(strip_tags($_POST['username']));
$password1 = htmlentities(strip_tags($_POST['password']));
$password = hash('sha256',$password1);

if (isset($_POST['login'])){
	if(empty($username) || empty($password)){
		echo "<script type='text/javascript'>alert('Fill out name and password');</script>";
		exit();
	}
	$host = "fall-2019.cs.utexas.edu";
  	$user = "cs329e_mitra_fangyb";
  	$pwd = "room8dual6piggy";
  	$dbs = "cs329e_mitra_fangyb";
  	$port = "3306";
  	$db = mysqli_connect ($host, $user, $pwd, $dbs, $port);
  	if (empty($db))
	{
	  die("mysqli_connect failed: " . mysqli_connect_error());
	}
	//print "Connected to ". mysqli_get_host_info($db) . "<br /><br />\n";
  	
    $sql = "SELECT username,password FROM users WHERE username='$username' AND password='$password'";
    //print $sql;
    //echo "<script type='text/javascript'>alert('$sql');</script>";
    $results = mysqli_query($db, $sql);
    mysqli_close($db);
    if (mysqli_num_rows($results) > 0) {
    	//correct username and password pair
    	echo "correct entry!";
    	$_SESSION['username']=$username;
    	$results->free();
    	header('Location: ./home.php');
    }
    else echo "<script type='text/javascript'>alert('Incorrect credentials');</script>";
		
}

?>


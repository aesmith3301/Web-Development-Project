<html>
<head>
<title>My Profile</title>
<link rel="stylesheet" title="basic style" type="text/css"
                href="./profile.css" media="all" />
<script src="https://code.jquery.com/jquery-2.1.4.js"></script> 
<script src="profile.js"></script>
</head>
<body>
<?php include('changeProfileProcessing.php');
session_start();


$img = 1;
$bio = 2;
$email = 3;

$userName = $_SESSION['username'];
//$userName = 'aaa';

print<<<TOP
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
<div id = 'content'>
<h2 id='userName_profile'>$userName</h2></div>
<div>"
TOP;

$db = connectToDatabase();
$table = "profiles";

$result = mysqli_query ($db, "select * from $table where user = '$userName';");

$results_arr = mysqli_fetch_row($result);
//print_r($results_arr);
if($results_arr[$img]){
	echo '<img src="data:image/jpeg;base64,'.base64_encode( $result )."'id='profile_pic'/>'";
}
else print "<img src='./img_placeholder.png' alt='placeholder' id='profile_pic_temp' onmouseover='addProfilePicIn();' onmouseout='addProfilePicOut();'/>";

echo "</div>";

if($results_arr[$bio]){
	print "<textarea readonly id = 'bio'>$results_arr[$bio]</textarea><button id='enterBio'>Update Bio</button>";
}
	else print "<textarea readonly id = 'bio'>Click to add a bio to your profile!</textarea><span class='countdown'></span><button id='enterBio'>Save Bio</button>";

$result->free();
mysqli_close($db);
print "</div>";


function connectToDatabase(){
	$host = "fall-2019.cs.utexas.edu";
  	$user = "cs329e_mitra_fangyb";
  	$pwd = "room8dual6piggy";
  	$dbs = "cs329e_mitra_fangyb";
  	$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

	if (empty($connect))
	{
		die("mysqli_connect failed: " . mysqli_connect_error());
	}
	return $connect;

}

?>

</body>
</html>


<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
        <head>
                <title>homepage</title>
		<meta charset="UTF-8">
                <link rel="stylesheet" title="basic style" type="text/css"
                href="./home2.css" media="all" />
        <script src="https://code.jquery.com/jquery-2.1.4.js"></script> 
        <script src="profile.js"></script>
        </head>
        <body>
                <div class="navbar" style="position:fixed;top:0px;width:100%;font-family: Arial;">
                        <a href="logout.php">Logout</a>
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
                        <a href="#foot">Contact</a>
<?php 
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    echo "<a href='https://fall-2019.cs.utexas.edu/cs329e-mitra/bioinfanatics/profilePage.php'>";
	echo $user;
}
else{
    echo "<a href='https://fall-2019.cs.utexas.edu/cs329e-mitra/bioinfanatics/login.php'>";
	echo 'login';
}       
?>
			</a>
		</div>
		<div class="content">
                	<p><img id="logo1" src="./logo2.png" width="110px" height="100px"></p>
               	 	<p><img id="logo2" src="./triangle2.png" width="120px" height="110px"></p>
                	<span id="h11">THE</span>
                	<span id="h12">JOURNEY</span>
                	<div id="header1">THE PSYCHOLOGICAL TESTS THAT WILL</div>
                	<div id="header2">SAY MUCH ABOUT YOUR PERSONALITY</div>
		</div>
		<div class="container">
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <span class="text">Scroll down</span>
                </div>
                <div class="introduction">
                        <div class="transbox">
                        <p>Life is a journey, a road that less traveled. The greatest and most important adventure is discovering who we really are. 
                        This website serves interactive quizzes to assess your personality by providing animations and an engaging story-like feel.
                        You will choose different themes in your adventure, and the scenario then unfolds through the questions that follow.
                        Are your ready to take yourself on the journey of getting to know yourself?</p>
                        </div>
                </div>
                <div class="themes">
                        <div onmouseover="myOverFunction1()" onmouseout="myOutFunction1()" class="Castle" onclick="location='./castle/q1.html'">
                                <div>
                                <p id="start1"></p>
                                </div>
                        </div>
                        <div class="para">
                                <div class="para1">
                                <p>Imagine that you are in front of a castle. How easily do you take risks in life? What do you think will happen in the future and what image do you believe others have of you?</p>
                                </div>
                        </div>
                        <div onmouseover="myOverFunction2()" onmouseout="myOutFunction2()" class="Forest" onclick="location='./theForest/forest.html'">
                                <p id="start2"></p>
                        </div>
                        <div class="forestpara">
                                <div class="para2">
                                        <p>Picture yourself walking through a beautiful forest. The sun is out, there's a perfect breeze. It's just beautiful.</p>
                                </div>
                        </div>
                </div>
                <div class="container2">
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <div class="chevron"></div>
                                <span class="text">Contact us</span>
		</div>
                <div class="footer" id="foot">
                        <table>
                                <tr>
                                        <th><img class="photo" src="http://m.imeitou.com/uploads/allimg/2019051311/1om1yvumecq.jpg" alt="Avatar"></th>
                                        <th id="line1">Get to Know Us</th>
                                        <th><img class="photo" src="https://n.sinaimg.cn/sinacn20190515s/560/w1080h1080/20190515/485b-hwzkfpu2779553.jpg" alt="Avatar"></th>
                                </tr>
                                <tr>
                                        <th>Yangbing Fang</th>
                                        <th id="line2">We are students from the Univeristy of Texas at Austin and we are both interested in psychology</th>
                                        <th>Alexandra Smith</th>
                                </tr>
                                <tr>
                                        <th>yanbingfang@utexas.edu</th>
                                        <th></th>
                                        <th>alexsmith9672@utexas.edu</th>
                                </tr>
                        </table>
                </div>

                <script>
                        var x="Start your journey"
                        function myOverFunction1() {
                                document.getElementById("start1").innerHTML = x;
                        }
                        function myOutFunction1() {
                                document.getElementById("start1").innerHTML = "";
                        }
                        function myOverFunction2() {
                                document.getElementById("start2").innerHTML = x;
                        }
                        function myOutFunction2() {
                                document.getElementById("start2").innerHTML = "";
                        }
                </script>
        </body>
</html>
<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp
?>

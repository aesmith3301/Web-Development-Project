<?php
session_start();

$_SESSION["questions"] = 
        array("1. You are walking in the woods. Who are you with?",
                "2. You are walking in the woods. You see an animal. What kind of animal is it?",
        "3. What interaction takes place between you and the animal?",
        " 4. You walk deeper into the woods. You enter a clearing and before you 
        is your dream house. Describe its size.",
        "5. Is your dream house surrounded by a fence?", 
        "6. You enter the house. You walk to the dining area and see the dining 
        room table. Describe what you see on and around the table.", 
        " 7. You exit the house through the back door. Lying in the grass is a cup. 
        What material is the cup made of (ceramic, glass, paper, etc.)?",
        " 8. What do you do with the cup?",
        "9. You walk to the edge of the property, where you find yourself standing 
        at the edge of a body of water. What type of body of water is it (creek, 
        river, ocean, etc.)?",
        "10. How will you cross the water?");
        $_SESSION["explanations"] = 
        array("This person you are walking with is the most important person in your life.",
                "The size of the animal you come across is a representation of the size of your problems.",
                "If your action was more severe, it means you tend to be more aggressive. If it was peaceful, then more passive.",
                "The size of your home is representative of the size of your ambition.",
                "If there was no fence around the home, it means you tend to be more open.",
                "If what you saw on the table wasn't food, people, or flowers, it indicates some unhappiness.",
                "How durable the cup you found was is representative of how strong your relationship is with the person in the first part of the story.",
                "What you do with the cup is representative of your attitude toward the person in the first part of the story.",
                "The size of the body of water is related to the size of your physical drive.",
                "If your way of getting across the water got you very wet, physical attraction is very important to you. Otherwise, it might not be.");

if(isset($_POST["fromSaved"])){
    $answers = $_POST['answers'];
    $_SESSION["answers"] = $answers;
    displayFirstSlide();
}

else if(isset($_POST["submit"])){
        $answers = array($_POST["q1"], $_POST["q2"], $_POST["q3"],$_POST["q4"], $_POST["q5"],$_POST["q6"],$_POST["q7"],$_POST["q8"],$_POST["q9"],$_POST["q10"]);
        $_SESSION["answers"] = $answers;
        
        displayFirstSlide();
}

else if(isset($_POST["slideNo"])){
        $answers = $_SESSION["answers"];
        $slideNo = intval($_POST["slideNo"]);
        if($slideNo > 10){
           printLastPage();
        }
        else{
             $slideIndex = $slideNo - 1;
        $nextSlide = $slideNo + 1;
        $imgName = "q" . $slideNo . ".JPG";
        $text = $answers[$slideIndex];
        $question = $_SESSION["questions"][$slideIndex];
        $explanation = $_SESSION["explanations"][$slideIndex];

        echo $text;
         print<<<SLIDE
        <html>
        <head>
                <title>Results</title>
                <link rel="stylesheet" title="basic style" type="text/css"
                href="./forest.css"/>
        </head>
        <body>
                <div class="navbar">
                        <a class="regLink" href="#home">Home</a>
                        <a class="regLink" href="#news">About</a>
                        <div class="dropdown">
                                <button class="dropbtn">Theme
                                        <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                        <a href="#">Castle</a>
                                        <a href="./theForest/forest.html">Forest</a>
                                </div>
                        </div>
                        <a class="regLink" href="#news">Contact</a></div>
                <img src ='$imgName' id="analysisImg" width="100%" height="100%">
                <span id="overlay"  onclick="./forest.php?slideNo=$nextSlide">$question: </span><br><span id="ans">$text</span>
                <span id="explanation">$explanation</span>
        <form method="post" action = "./forest.php">
        <input type="hidden" name="slideNo" value=$nextSlide/>
      <input type="submit" value="Next Question" id="nextBtn"/>
        </form>
        </body>
        </html>
SLIDE;

        }
       
}

function displayFirstSlide(){
 print<<<RESULT_SLIDE
        <html>
        <head>
                <title>Results</title>
                <link rel="stylesheet" title="basic style" type="text/css"
                href="./forest.css"/>
        </head>
        <body>
            <div class="navbar">
                        <a class="regLink" href="#home">Home</a>
                        <a class="regLink" href="#news">About</a>
                        <div class="dropdown">
                                <button class="dropbtn">Theme
                                        <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                        <a href="#">Castle</a>
                                        <a href="./theForest/forest.html">Forest</a>
                                </div>
                        </div>
                        <a class="regLink" href="#news">Contact</a></div>
                <img src = "pathAnalysis.jpeg" id="analysisImg" width="100%" height="100%">
                <span id="overlayMain">What does your path mean? </span>
        <form method="post" action = "./forest.php">
        <input type="hidden" name="slideNo" value="1"/>
        <input type="submit" value="Click here to find out!" id="beginBtn"/>
        </form>
        </body>
        </html>
RESULT_SLIDE;
}

function printLastPage(){
       header('Location: ../thankYou.html');

}

?>
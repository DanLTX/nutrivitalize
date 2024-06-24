<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/calorie_cal.css">
</head>
<body>
<div class="calorie-bg" > 
<section id="header">
        <a href="home.php"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><a href="home.php">Home</a></li>
                <li><a href="calorie_cal.php">Calorie Calculator</a></li>
                <li><a href="food.php">Food Calorie</a></li>
                <li><a href="bmi.php">BMI Tracker</a></li>
                <?php
                echo "<li><a href=\"profile.php\"><i class='bi bi-person-fill'></i>$_SESSION[username]</a></li>";
                ?>
                
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>
    <div class="updatebar">
        <h1>Update height and weight on</h1>
        <h1>profile for the latest calorie intake calculation</h1>
        <div class="arrowbtn">
        <a href="update.php"><button class="arrow"><i class="bi bi-arrow-right"></i></button></a>
        </div>
    </div>
    <?php
    if($_SESSION['gender']=='Male'){
        $calorie = number_format(intval(88.362 + (13.397 * $_SESSION['weight']) + (4.799 * $_SESSION['height']) - (5.677 * $_SESSION['age']))); 
    }
    elseif($_SESSION['gender']=='Female'){
        $calorie = number_format(intval(447.593 + (9.247 * $_SESSION['weight']) + (3.098 * $_SESSION['height']) - (4.33 * $_SESSION['age'])));
    }
    

    echo "<div id=\"wrapper\"><h1 class=\"calorie\" id=\"calorie\">$calorie kcal</h1></div>";

    echo "<div class=\"details\"><h1>You estimatedly need to consume</h1><h1>$calorie per day.</h1><br><br><h1>See how we calculate</h1>"
    ?>
    <h1>Revised Harris-Benedict Equation:</h1>
    <h1>For men: BMR = 13.397W + 4.799H - 5.677A + 88.362</h1>
    <h1>For women: BMR = 9.247W + 3.098H - 4.330A + 447.593</h1>
    </div>
</div>
 
    <script>
        (function (d) {
        "use strict";
        const myCounter = d.getElementById("calorie");
        const myCounter2 = d.getElementById("calories");
        const myWrapper = d.getElementById("wrapper");
        d.body.classList.add("startBG");
        var calories = JSON.parse(<?php $calorie; ?>);
        var counter = 0;
        var countdown = setInterval(function () {
            counter++;
            myWrapper.style.backgroundSize = "100% " + counter + "%";
            myCounter.textContent = counter + " kcal";
            if (counter == 100) clearInterval(countdown);
            }, 5);
        })(document);

    </script>
</body>
</html>

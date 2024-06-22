<?php
session_start();
include 'conn.php';
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <section id="header">
        <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><a href="home.php">Home</a></li>
                <li><a href="calorie_cal.php">Calorie Calculator</a></li>
                <li><a href="food.php">Food Calorie</a></li>
                <li><a href="bmi.php">BMI Tracker</a></li>
                <?php

                $email = $_SESSION["email"];
                $sql = "SELECT * FROM user WHERE email LIKE '%$email'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        $_SESSION["username"] = $row["username"];
                        $_SESSION["password"] = $row["pass_word"];
                        $_SESSION["age"] = $row["age"];
                        $_SESSION["gender"] = $row["gender"];
                        $_SESSION["height"] = $row["height"];
                        $_SESSION["weight"] = $row["weight"];
                    }
                }
                
                echo "<li><a href=\"profile.php\"><i class='bi bi-person-fill'></i>$_SESSION[username]</a></li>";
                ?>
                <a href="#" id="close"><i class="bi bi-x-circle"></i></a>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>
    <div class="welcome-container">
        <img src="welcomeimage.jpg" width="100%" height="600px" style="filter: brightness(50%);">
        <?php
        echo "<div class=\"welcometext\"><h1>Welcome $_SESSION[username]</h1></div>";
        ?>
    </div>
    <div class="calorie-container">
        <img src="home-calc.jpg" width="100%" height="600px" style="object-fit: cover; object-position: 100% 0;" >
        <div class="button-container">
            <div class="calorie-text"><h1>Calorie Calculator</h1></div>
            <div class="arrowbtn">
                <a href="calorie_cal.php"><button class="arrow"><i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>
        
    </div>
   

</body>
</html>

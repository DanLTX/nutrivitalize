<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM user where email = '$email' ";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["email"];
    }
}
if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profile.css">

</head>
<body>
<section class="profile" id="header">
        <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><a href="home.php">Home</a></li>
                <li><a href="calorie_cal.php">Calorie Calculator</a></li>
                <li><a href="food.php">Food Calorie</a></li>
                <li><a href="bmi.php">BMI Tracker</a></li>
                <?php

                
                
                echo "<li><a href=\"profile.php\"><i class='bi bi-person-fill'></i>$_SESSION[username]</a></li>";
                ?>
                <a href="#" id="close"><i class="bi bi-x-circle"></i></a>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
    </section>
    <div class="acc-container">
        <h3>Account Details</h3>
        <br>
        <?php
        echo "Email : " . $_SESSION["email"] . "<br>";
        echo "Username : " . $_SESSION["username"] . "<br>";
        echo "Password : " . $_SESSION["password"] . "<br>";
        echo "Age: " . $_SESSION["age"] . "<br>";
        echo "Gender : " . $_SESSION["gender"] . "<br>";
        echo "Height : " . $_SESSION["height"] . "cm" . "<br>";
        echo "Weight : " . $_SESSION["weight"] . "kg";
        
        ?>
        <br>
        <br>
        <a href="update.php"><button class="updatebtn">UPDATE</button></a>
        <a href="logout.php"><button class="logoutbtn">LOG OUT</button></a>
    </div>
</body>
</html>
<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM admin";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["emailID"];
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
    <title>Admin Home Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
<section id="header">
    <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
    <div>
        <ul id="navbar"> 
            <li><a href="adminhome.php">Home</a></li>
            <li><a href="adminfood.php">Food Details</a></li>
            <li><a href="adminbmi.php">User's BMI</a></li>
            <li><a href="adminuser.php"><i class='bi bi-person-fill'></i>User Details</a></li>
            <li><a href="login.php"><i class="bi bi-door-closed"></i>Log Out</a></li>
        </ul>
    </div>
    <div id="small">
        <i id="ham" class="bi bi-list"></i>
    </div>
    
</section>
    <div class="welcome-container">
        <img src="welcomeimage.jpg" width="100%" height="600px" style="object-fit: cover; object-position: 100% 0; filter: brightness(50%);">
        <?php
        echo "<div class=\"welcometext\"><h1>Admin Page</h1></div>";
        ?>
    </div>
    <div class="foodD-container">
        <img src="food-details.png" width="100%" height="600px" style="object-fit: cover; object-position: 100% 0; filter: brightness(50%);" >
        <div class="button-container">
            <div class="calorie-text"><h1>Food Details</Details></h1></div>
            <div class="arrowbtn">
                <a href="adminfood.php"><button class="foodD-arrow"><i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>
    <div class="AdminBMI-container">
        <img src="bmi-home.jpg" width="100%" height="600px" style="object-fit: cover; object-position: 100% 0; filter: brightness(50%);" >
        <div class="button-container">
            <div class="AdminBMI-text"><h1>User's BMI</h1></div>
            <div class="arrowbtn">
                <a href="adminbmi.php"><button class="AdminBMI-arrow"><i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>    
    </div>

    <div class="AdminUser-container">
        <img src="adminuserpic.jpg" width="100%" height="600px" style="object-fit: cover; object-position: 100% 0; filter: brightness(50%);" >
        <div class="button-container">
            <div class="AdminUser-text"><h1>User Details</h1></div>
            <div class="arrowbtn">
                <a href="adminuser.php"><button class="AdminUser-arrow"><i class="bi bi-arrow-right"></i></button></a>
            </div>
        </div>    
    </div>
</body>
</html>

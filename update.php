<?php
session_start();
include 'conn.php';
if(isset($_POST['updatebtn'])){
    $email = $_SESSION['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $select= "select * from user where email LIKE '%$email'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);

    $update = "update user set username='$username',pass_word='$password',age='$age', gender='$gender', height='$height', weight='$weight' where email like '%$email'";
    $sql2=mysqli_query($conn,$update);
    if($sql2){
        header("location: profile.php");
    }
    else{
        echo "ERROR!!! YOUR PROFILE IS NOT UPDATING";
    }

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
<section id="header">
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
        <h3>Edit Profile</h3>
        <form action="#" method="post">
        <br>
        <?php
        echo "Email    : " . "   <input type=\"text\" name=\"email\" value=\"$_SESSION[email]\">" . "<br>";
        echo "Username : " . "<input type=\"text\" name=\"username\" value=\"$_SESSION[username]\">" . "<br>";
        echo "Password : " . "<input type=\"text\" name=\"password\" value=\"$_SESSION[password]\">" . "<br>";
        echo "Age      : " . "      <input type=\"text\" name=\"age\" value=\"$_SESSION[age]\">" . "<br>";
        echo "Gender   : " . "  <input type=\"radio\" name=\"gender\" value=\"Male\" required>Male" . "<input type=\"radio\" name=\"gender\" value=\"Female\" required>Female" . "<br>";
        echo "Height   : " . "  <input type=\"text\" name=\"height\" value=\"$_SESSION[height]\">" . "cm" . "<br>";
        echo "Weight   : " . "  <input type=\"text\" name=\"weight\" value=\"$_SESSION[weight]\">" . "kg" . "<br>";
        ?>
        <br>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
        
        </form>
    </div>
</body>
</html>

<?php
session_start();
include 'conn.php';

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
    
    $currentdate = date("Y-m-d");
    $height = $_POST['height'] / 100;
    $weight = $_POST['weight'];
    $bmi = round($weight  / pow($height,2),1);
    $currentdate = date("Y-m-d");
    if ($bmi > 30) {
        $suggestID = 3;
    } elseif ($bmi > 25 && $bmi <= 30) {
        $suggestID = 2;
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {   
        $suggestID = 1;
    } elseif ($bmi < 18.5) {
        $suggestID = 4;
    }

    $update2 = "update bmi set suggestID='$suggestID', date='$currentdate', bmi_value='$bmi' where email like '%$email' ORDER BY date DESC limit 1";
    $sql2=mysqli_query($conn,$update);
    $sql3=mysqli_query($conn,$update2);
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
    <link rel="stylesheet" href="css/update.css">

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
        <?php
        echo "Email: <br>
              $_SESSION[email]<br><br>";
        echo "Username: <input type=\"text\" name=\"username\" value=\"$_SESSION[username]\" required><br>";
        echo "Password: <div class=\"password-container\">
                    <input type=\"password\" id=\"password\" name=\"password\" value=\"$_SESSION[password]\" required>
                    <i class=\"bi bi-eye-slash password-toggle\" id=\"togglePassword\"></i>
                </div>";
        echo "Age: <input type=\"text\" name=\"age\" value=\"$_SESSION[age]\" required><br><br>";
        echo "Gender: <br>
              <input type=\"radio\" id=\"male\" name=\"gender\" value=\"Male\" " . ($_SESSION['gender'] == 'Male' ? 'checked' : '') . " required><label for=\"male\">Male</label>
              <input type=\"radio\" id=\"female\" name=\"gender\" value=\"Female\" " . ($_SESSION['gender'] == 'Female' ? 'checked' : '') . " required><label for=\"female\">Female</label><br><br>";
        echo "Height(cm): <input type=\"text\" name=\"height\" value=\"$_SESSION[height]\" required><br>";
        echo "Weight(kg): <input type=\"text\" name=\"weight\" value=\"$_SESSION[weight]\" required><br>";
        ?>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
    </form>
</div>
<script>
    document.getElementById('ham').onclick = function() {
        var navbar = document.getElementById('navbar');
        if (navbar.style.display === 'block') {
            navbar.style.display = 'none';
        } else {
            navbar.style.display = 'block';
        }
    };

    document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordField = document.getElementById('password');
        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });

</script>
</body>
</html>
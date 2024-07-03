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
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    $select= "select * from user where email LIKE '%$email'";
    $sql = mysqli_query($conn,$select);
    $row = mysqli_fetch_assoc($sql);

    $update = "update user set username='$username',age='$age', height='$height', weight='$weight' where email like '%$email'";
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
if(isset($_POST['passbtn'])){
    header("location: changepass.php");
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
        //echo "Password: <div class=\"password-container\">
        //            <input type=\"password\" id=\"password\" name=\"password\" value=\"$_SESSION[password]\" required>
        //            <i class=\"bi bi-eye-slash password-toggle\" id=\"togglePassword\"></i>
        //        </div>";
        echo "Password: <button class='passbtn' type='submit' name='passbtn'>CHANGE PASSWORD</button><br><br>";
        echo "Age: <input type=\"text\" name=\"age\" id='age' value=\"$_SESSION[age]\" required><br><br>";
        echo "Gender: $_SESSION[gender]". "<br><br>";
        echo "Height(cm): <input type=\"text\" name=\"height\" id='height' value=\"$_SESSION[height]\" required><br>";
        echo "Weight(kg): <input type=\"text\" name=\"weight\" id='weight' value=\"$_SESSION[weight]\" required><br>";
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

        
        var age = document.getElementById("age"),
            weight = document.getElementById("weight"),
            height = document.getElementById("height");

        //validate age range 13-100
        function validateAge() {
            if (age.value < 13 || age.value > 100) {
                age.setCustomValidity("Age must be between 13 and 100.");
            } else {
                age.setCustomValidity('');
            }
        }

        //validate weight 1-999
        function validateWeight() {
            if (weight.value < 1 || weight.value > 999) {
                weight.setCustomValidity("Weight must be between 1 and 999 kg.");
            } else {
                weight.setCustomValidity('');
            }
        }

        //validate height 1-250
        function validateHeight() {
            if (height.value < 1 || height.value > 250) {
                height.setCustomValidity("Height must be between 1 and 250 cm.");
            } else {
                height.setCustomValidity('');
            }
        }

        age.oninput = validateAge;
        weight.oninput = validateWeight;
        height.oninput = validateHeight;
</script>
</body>
</html>
<?php
    include 'footer.php' ;
?>
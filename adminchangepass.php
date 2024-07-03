<?php
include 'conn.php';
session_start();

$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM admin WHERE emailID = '$email'";
$result = mysqli_query($conn, $sqlauth);

if (mysqli_num_rows($result) == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        $auth = $row["emailID"];
    }
}

if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

if(isset($_POST['updatebtn'])){
    $email = $_SESSION['useremail'];
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $update = "UPDATE user SET pass_word = '$hash' WHERE email like '%$email'";
    $sql=mysqli_query($conn,$update);
    if($sql){
        echo    "<script>
                alert('USER PASSWORD IS SUCCESSFULLY UPDATED');
                window.location.href='adminuser.php';
                </script>";
    }
    else{
        echo "<script>window.alert('ERROR USER PASSWORD IS NOT UPDATED!!!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change User Password Page</title>
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
<div class="acc-container">
    <h3>Change Password</h3>
    <form action="#" method="post">
        <?php
        echo "Password: <div class=\"password-container\">
                    <input type=\"password\" id=\"password\" name=\"password\" required>
                   <i class=\"bi bi-eye-slash password-toggle\" id=\"togglePassword\"></i>
                </div>";
        echo "Confirm Password: <div class=\"password-container\">
        <input type=\"password\" id=\"confirm_password\" name=\"confirm_password\" required>
                    <i class=\"bi bi-eye-slash password-toggle\" id=\"togglePassword2\"></i>
                </div>";
        ?>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
    </form>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordField = document.getElementById('password');
        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
        });

        document.getElementById('togglePassword2').addEventListener('click', function () {
        var passwordField = document.getElementById('confirm_password');
        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
        });
        

        var password = document.getElementById("password")
        ,confirm_password = document.getElementById("confirm_password");

        function validatePassword(){
            if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
            } 
            else {
            confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
</body>
</html>
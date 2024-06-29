<?php
session_start();
include 'conn.php';
if(isset($_POST['submitSign'])){
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

    $sql="INSERT INTO user (email, username, pass_word, age, gender, height, weight) VALUES ('$_POST[email]', '$_POST[username]',
    '$_POST[password]','$_POST[age]','$_POST[gender]','$_POST[height]','$_POST[weight]')";
    $sql2="INSERT INTO bmi (email, suggestID, date, bmi_value) VALUES ('$_POST[email]','$suggestID','$currentdate','$bmi')";
    if(!mysqli_query($conn, $sql)){
    die('Error:' . mysqli_error($conn));
    }
    if(!mysqli_query($conn, $sql2)){
        die('Error:' . mysqli_error($conn));
        }
}
else if(isset($_POST['submitLog'])){
    $email = $_POST['emailLog'];  
    $password = $_POST['passwordLog'];
    $sqlLog = "select * from user where email = '$email' and pass_word = '$password'";  
    $result = mysqli_query($conn, $sqlLog);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);     
    if($count == 1){  
        
        header("Location: home.php");
    }  
    else{  
        $sqlLog2 = "select * from admin where emailID = '$email' and pass_word = '$password'";  
        $result = mysqli_query($conn, $sqlLog2);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("Location: adminhome.php");
        }  
    }
    $_SESSION["email"] = $email;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>Login</title>
    <style>
        body{
            background-image: url(bg01.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            height: 100vh;
            background-position: center top 70px;
        }
    </style>
</head>

<body>

    <section id="header">
        <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><button onclick="window.location='login.php'"><i class="bi bi-door-open-fill"></i>New user / Log in</button></li>
                <a href="#" id="close"><i class="bi bi-x-circle"></i></a>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>

    <section class="signin-signup">
        <div class="container">
            
            
            <input type="checkbox" name="" id="change">
            <!-- if checkbox is is checked than go to register/sign up form -->
            <div class="cover"></div>
            <div class="forms">
            <form action="#" method="post">

                <div class="signin-form">
                    <?php
                    if(isset($_POST['submitLog'])){
                        if(!$count == 1){
                            echo "<p class='error'><b>INCORRECT EMAIL OR PASSWORD!!!</b></p>";
                            
                        }
                    }
                    if(isset($_POST['submitSign'])){
                        echo "<script>window.alert('Congratulations, your account has successsfully created!')</script>";
                    }
                    
                    ?>
                    <label class="title" for="signin">Log in</label>
                    <div class="content">
                        <div class="input">
                            <i class="bi bi-envelope"></i>
                            <input type="text" placeholder="Enter your email" name="emailLog" id="emailLog" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="password" placeholder="Enter your password" name="passwordLog" id="passwordLog" required >
                            <div class="password-cointaner">
                            <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                            </div>
                        </div>
                        <div class="submitbtn">
                            <button name="submitLog">submit</button>
                        </div>
                        <div class="text">Don't have an account? <label for="change">Sign up now</label></div>
                        <!-- The for attribute of <label> must be equal to the id attribute of the related element to bind them together.
                        A label can also be bound to an element by placing the element inside the <label> element.  -->
                    </div>
                </div>
            </form>   
            <form action="#" method="post">
                <div class="signup-form">
                    <label class="title" for="signup">Sign up</label>
                    <div class="content">
                        <div class="input">
                            <i class="bi bi-envelope"></i>
                            <input type="text" placeholder="Enter your email" name="email" id="emailSign" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-person"></i>
                            <input type="text" placeholder="Enter your username" name="username" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="password" placeholder="Create a password" id="password" name="password" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="password" placeholder="Confirm your password" id="confirm_password" name="confirm_password" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="text" placeholder="Enter your age" name="age" id="age" required>
                        </div>

                        
	                    <div class="radio-inputs">
                            <div>
                                <input type="radio" id="Male" name="gender" value="Male" required style="color: #03c7c0">
                                <label for="Male" style="text-decoration: none; color:dimgray">Male</label>
                                <i class="bi bi-gender-male" style="color: #03c7c0"></i>
                            </div>
                            <div class="gender-input">
                                <input type="radio" id="Female" name="gender" value="Female" required>
                                <label for="Female" style="text-decoration: none; color:dimgray">Female</label>
                                <i class="bi bi-gender-female" style="color: #03c7c0"></i>
                            </div>
                        </div>

                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="text" placeholder="Enter your height (cm)" name="height" id="height" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="text" placeholder="Enter your weight (kg)" name="weight" id="weight" required>
                        </div>

                        <div class="submitbtn">
                        <button type="submit" name="submitSign">submit</button>
                        </div>
                        <div class="text">Already have an account? <label for="change">Sign in now</label></div>
                    </div>
                </div>

            </form>
        </div>
        </div>
    </section>
    <script>
        //validate password
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

        document.getElementById('togglePassword').addEventListener('click', function () {
        var passwordField = document.getElementById('passwordLog');
        var type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
        });

        //validate email
        var emailSign = document.getElementById("emailSign");

        function validateEmail(emailField) {
            var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
            if (!emailPattern.test(emailField.value)) {
                emailField.setCustomValidity("Please enter a valid email address.");
            } else {
                emailField.setCustomValidity('');
            }
        }
        emailSign.oninput = function() {
            validateEmail(emailSign);
        };

        
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

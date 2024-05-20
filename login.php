<?php
include 'conn.php';
if(isset($_POST['submitSign'])){
    $sql="insert into user (email,username,pass_word,age,gender,height,weight) values
    ('$_POST[email]','$_POST[username]','$_POST[password]','$_POST[age]','$_POST[gender]','$_POST[height]','$_POST[weight]')";
    if(!mysqli_query($conn, $sql)){
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
        /**if (headers_sent()) {
            die("Redirect failed. Please click on this link: <a href=http://localhost/nutrivitalize/home.php>");
        }
        else{
            exit(header("Location: home.php"));
        } **/
        //echo "<script type='text/javascript'>window.top.location='http://localhost/nutrivitalize/home.php';</script>";
    }  
    else{  
        /* echo "<h1> Login failed. Invalid email or password.</h1>" */
        
        
    }
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

        .radio-inputs {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            border-radius: 0.5rem;
            background-color: #EEE;
            box-sizing: border-box;
            box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
            padding: 0.25rem;
            width: 300px;
            font-size: 14px;
        }
    </style>
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
                    <label class="title" for="signin">Log in</label>
                    <div class="content">
                        <div class="input">
                            <i class="bi bi-envelope"></i>
                            <input type="text" placeholder="Enter your email" name="emailLog" id="emailLog" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="password" placeholder="Enter your password" name="passwordLog" id="passwordLog" required>
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
                            <input type="text" placeholder="Enter your email" name="email" required>
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
                            <input type="text" placeholder="Enter your age" name="age" required>
                        </div>
                        </div>
                        <div class="mydict">
	                    <div class="radio-inputs">
                            <label class="radio">
                                <input type="radio" name="gender" checked="">
                                <span class="name">Male</span>
                            </label>
                            <label class="radio">
                                <input type="radio" name="gender">
                                <span class="name">Female</span>
                             </label>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="text" placeholder="Enter your height (cm)" name="height" required>
                        </div>
                        <div class="input">
                            <i class="bi bi-lock"></i>
                            <input type="text" placeholder="Enter your weight (kg)" name="weight" required>
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

<?php
if(isset($_POST['submitLog'])){
    if(!$count == 1){
        echo "<p class='error'><b>INCORRECT EMAIL OR PASSWORD!!!</b></p>";
    }
}


?>

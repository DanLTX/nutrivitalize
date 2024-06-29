<?php
session_start();
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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
        }
        #header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: white;
            color: white;
        }
        #header a {
            color: white;
            text-decoration: none;
        }
        #navbar {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        #navbar li {
            display: inline;
        }
        .acc-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .acc-container h3 {
            margin-bottom: 20px;
        }
        .acc-container .detail {
            padding: 10px 0;
        }
        .updatebtn, .logoutbtn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 10px 0;
        }
        .logoutbtn {
            background-color: #dc3545;
        }
        .updatebtn:hover, .logoutbtn:hover {
            opacity: 0.8;
        }
    </style>

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
        <div class="detail"><strong>Email:</strong> <?php echo $_SESSION["email"]; ?></div>
        <div class="detail"><strong>Username:</strong> <?php echo $_SESSION["username"]; ?></div>
        <div class="detail"><strong>Password:</strong> ******</div>
        <div class="detail"><strong>Age:</strong> <?php echo $_SESSION["age"]; ?></div>
        <div class="detail"><strong>Gender:</strong> <?php echo $_SESSION["gender"]; ?></div>
        <div class="detail"><strong>Height:</strong> <?php echo $_SESSION["height"]; ?> cm</div>
        <div class="detail"><strong>Weight:</strong> <?php echo $_SESSION["weight"]; ?> kg</div>
        <br>
        <br>
        <a href="update.php"><button class="updatebtn">UPDATE</button></a>
        <a href="logout.php"><button class="logoutbtn">LOG OUT</button></a>
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
    </script>
</body>
</html>

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
            <li><a href="adminbmi.php">BMI Tracker</a></li>
            <li><a href="adminuser.php"><i class='bi bi-person-fill'></i>User Details</a></li>
            <li><a href="login.php"><i class="bi bi-door-closed"></i>Log Out</a></li>
        </ul>
    </div>
    <div id="small">
        <i id="ham" class="bi bi-list"></i>
    </div>
    
</section>
    <h1>testadmin</h1>
    <div id="wrapper" >
    <h1 id="counter"></h1>
    </div>
    <script>
        (function (d) {
        "use strict";
        const myCounter = d.getElementById("counter");
        const myWrapper = d.getElementById("wrapper");
        d.body.classList.add("startBG");
        var counter = 0;
        var countdown = setInterval(function () {
            counter++;
            myWrapper.style.backgroundSize = "100% " + counter + "%";
            myCounter.textContent = counter;
            if (counter == 100) clearInterval(countdown);
        }, 50);
        })(document);
    </script>
</body>
</html>
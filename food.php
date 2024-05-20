<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/food.css">
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
    <div class="filter">
        <h1>Filter</h1>
    </div>
    <div class="title">
        <h1>Food Calorie Checker</h1>
    </div>
    <div class="search-food">
        <input type="text" name="searchfood" id="searchfood" placeholder="Search for foods">
    </div>
    <div class="food-container">
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food1</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food2</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food3</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food4</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food5</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food6</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food7</h5>
            <h6>Calorie: 9999kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food8</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
        <div class="food-grid">
            <img src="https://cdn-icons-png.freepik.com/256/857/857681.png?semt=ais_hybrid" alt="">
            <h5>food9</h5>
            <h6>Calorie: 9999 kcal</h6>
        </div>
    </div>
</body>
</html>
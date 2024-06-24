<?php
session_start();
include 'conn.php';

$sql = "SELECT * FROM food";
$result = $conn->query($sql);
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/food.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <section id="header">
        <a href="home.php"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><a href="home.php">Home</a></li>
                <li><a href="calorie_cal.php">Calorie Calculator</a></li>
                <li><a href="food.php">Food Calorie</a></li>
                <li><a href="bmi.php">BMI Tracker</a></li>
                <?php
                echo "<li><a href=\"profile.php\"><i class='bi bi-person-fill'></i>$_SESSION[username]</a></li>";
                ?>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>
    <div class="filter">
        <h1>Filter</h1>
        <div class="filter-btn" id="filter-btn">
        <button class="btn active" onclick="filterSelection('all')"><i class="material-icons">menu</i>Show all</button>
        <button class="btn" onclick="filterSelection('meat')">
    <i class="material-icons">menu</i>Meat</button>
        <button class="btn" onclick="filterSelection('pastry')">
    <i class="material-icons">menu</i>Pastry</button>
        <button class="btn" onclick="filterSelection('dairy')">
    <i class="material-icons">menu</i>Dairy</button>
        <button class="btn" onclick="filterSelection('bread')">
    <i class="material-icons">menu</i>Bread</button>
        <button class="btn" onclick="filterSelection('dessert')">
    <i class="material-icons">menu</i>Dessert</button>
        <button class="btn" onclick="filterSelection('japanese')">
    <i class="material-icons">menu</i>Japanese</button>
        <button class="btn" onclick="filterSelection('mexican')">
    <i class="material-icons">menu</i>Mexican</button>
        <button class="btn" onclick="filterSelection('italian')">
    <i class="material-icons">menu</i>Italian</button>
        <button class="btn" onclick="filterSelection('thai')">
    <i class="material-icons">menu</i>Thai</button>
        <button class="btn" onclick="filterSelection('canadian')">
    <i class="material-icons">menu</i>Canadian</button>
        <button class="btn" onclick="filterSelection('american')">
    <i class="material-icons">menu</i>American</button>
        <button class="btn" onclick="filterSelection('middle eastern')">
    <i class="material-icons">menu</i>Middle Eastern</button>
        <button class="btn" onclick="filterSelection('german')">
    <i class="material-icons">menu</i>German</button>
        <button class="btn" onclick="filterSelection('korean')">
    <i class="material-icons">menu</i>Korean</button>
        <button class="btn" onclick="filterSelection('indian')">
    <i class="material-icons">menu</i>Indian</button>
        <button class="btn" onclick="filterSelection('russian')">
    <i class="material-icons">menu</i>Russian</button>
        </div>
        
        
        </div>
    </div>
    <div class="title">
        <h1>Food Calorie Checker</h1>
    </div>
    <div class="search-food">
        <input type="text" name="searchfood" id="searchfood" placeholder="Search for foods">
        <div class="food-container" id="food-container">
        <?php
        while($rows = $result->fetch_assoc()) {
            echo "<div class=\"food-grid\" data-food-name=\"{$rows['foodName']}\">";
            echo "<img src=\"{$rows['foodImage']}\" width=\"90\" height=\"auto\">";
            echo "<h5>{$rows['foodName']}</h5>";
            echo "<h6>Calorie: {$rows['foodCalories']} kcal</h6>";
            echo "</div>";
        }
        ?>
        </div>
    </div>
    
    <script>
        document.getElementById('searchfood').addEventListener('input', function() {
            const searchValue = this.value.toLowerCase();
            const foodItems = document.querySelectorAll('.food-grid');

            foodItems.forEach(function(item) {
                const foodName = item.getAttribute('data-food-name').toLowerCase();
                if (foodName.includes(searchValue)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>

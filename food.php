<?php
session_start();
include 'conn.php';

// Fetch categories
$categorySql = "SELECT DISTINCT foodCategory FROM food";
$categoryResult = $conn->query($categorySql);

// Get selected category
$selectedCategory = isset($_GET['foodCategory']) ? $_GET['foodCategory'] : 'all';

// Fetch food items based on selected category
if ($selectedCategory == 'all') {
    $foodSql = "SELECT * FROM food";
    $foodResult = $conn->query($foodSql);
} else {
    $foodSql = $conn->prepare("SELECT * FROM food WHERE foodCategory = ?");
    $foodSql->bind_param("s", $selectedCategory);
    $foodSql->execute();
    $foodResult = $foodSql->get_result();
}

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
            <form method="GET" action="food.php">
                <button class="btn <?php if ($selectedCategory == 'all') echo 'active'; ?>" name="category" value="all" type="submit">
                    <i class="material-icons">menu</i>Show all
                </button>
                <?php while ($row = $categoryResult->fetch_assoc()): ?>
                    <button class="btn <?php if ($selectedCategory == $row['foodCategory']) echo 'active'; ?>" name="foodCategory" value="<?= $row['foodCategory'] ?>" type="submit">
                        <i class="material-icons">menu</i><?= ucfirst($row['foodCategory']) ?>
                    </button>
                <?php endwhile; ?>
            </form>
        </div>
    </div>
    <div class="title">
        <h1>Food Calorie Checker</h1>
    </div>
    <div class="search-food">
        <input type="text" name="searchfood" id="searchfood" placeholder="Search for foods">
        <div class="food-container" id="food-container">
        <?php
        while ($row = $foodResult->fetch_assoc()) {
            echo "<div class=\"food-grid\" data-food-name=\"{$row['foodName']}\">";
            echo "<img src=\"{$row['foodImage']}\" width=\"90\" height=\"auto\">";
            echo "<h5>{$row['foodName']}</h5>";
            echo "<h6>Calorie: {$row['foodCalories']} kcal</h6>";
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

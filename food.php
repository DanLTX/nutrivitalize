<?php
session_start();
include 'conn.php';
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM user where email = '$email' ";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["email"];
    }
}
if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

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
    <title>Food Calorie Checker</title>
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
            echo "<div class=\"food-grid\" data-food-name=\"{$row['foodName']}\" data-calories=\"{$row['foodCalories']}\">";
            echo "<img src=\"{$row['foodImage']}\" width=\"90\" height=\"auto\">";
            echo "<h5>{$row['foodName']}</h5>";
            echo "<h6>Calorie: {$row['foodCalories']} kcal</h6>";
            echo "<div class=\"wrapper\">";
            echo "<span class=\"minus\">-</span>";
            echo "<span class=\"num\">00</span>";
            echo "<span class=\"plus\">+</span>";
            echo "</div>";
            echo "</div>";
        }
        ?>
        </div>
    </div>
    <section id="total-bar">
        <div>
            <ul id="totalbar"> 
                <h1>Total Calories: <span id="totalCalories">0</span> kcal</h1>
            </ul>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateTotalCalories() {
                let totalCalories = 0;
                $('.food-grid').each(function() {
                    const calories = $(this).data('calories');
                    const quantity = parseInt($(this).find('.num').text());
                    totalCalories += calories * quantity;
                });
                $('#totalCalories').text(totalCalories);
            }

            $('.plus').on('click', function() {
                const $num = $(this).siblings('.num');
                let currentValue = parseInt($num.text());
                currentValue++;
                $num.text(currentValue < 10 ? '0' + currentValue : currentValue);
                updateTotalCalories();
            });

            $('.minus').on('click', function() {
                const $num = $(this).siblings('.num');
                let currentValue = parseInt($num.text());
                if (currentValue > 0) {
                    currentValue--;
                    $num.text(currentValue < 10 ? '0' + currentValue : currentValue);
                    updateTotalCalories();
                }
            });

            $('#searchfood').on('input', function() {
                const value = $(this).val().toLowerCase();
                $('#food-container .food-grid').filter(function() {
                    $(this).toggle($(this).data('food-name').toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
</body>
</html>
<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM admin where emailID = '$email' ";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["emailID"];
    }
}
if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

$foodID = $_GET['foodID'];
$sql = "SELECT * FROM food WHERE foodID = $foodID";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["foodName"] = $row["foodName"];
        $_SESSION["foodCalories"] = $row["foodCalories"];
        $_SESSION["foodCategory"] = $row["foodCategory"];
        $_SESSION["foodImage"] = $row["foodImage"];
    }
}

if(isset($_POST['updatebtn'])){
    $foodName = $_POST['foodName'];
    $foodCalories = $_POST['foodCalories'];
    $foodCategory = $_POST['foodCategory'];
    $foodImage = $_POST['foodImage'];


    $update = "UPDATE food set foodName='$foodName',foodCalories='$foodCalories',foodCategory='$foodCategory', foodImage='$foodImage' where foodID = '$foodID'";
    $sql2=mysqli_query($conn,$update);
    if($sql2){
        header("location: adminfood.php");
    }
    else{
        echo "ERROR!!! YOUR FOOD IS NOT UPDATING";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/profile.css">
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
    <div class="acc-container">
        <h3>Update Food</h3>
        <form action="#" method="post">
        <br>
        <?php
        echo "Food Name    : " . "   <input type=\"text\" name=\"foodName\" value=\"$_SESSION[foodName]\">" . "<br>";
        echo "Calories : " . "<input type=\"text\" name=\"foodCalories\" value=\"$_SESSION[foodCalories]\">" . "<br>";
        echo "Category : " . "<input type=\"text\" name=\"foodCategory\" value=\"$_SESSION[foodCategory]\">" . "<br>";
        echo "Image      : " . "      <input type=\"text\" name=\"foodImage\" value=\"$_SESSION[foodImage]\">" . "<br>";
        ?>
        <br>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
        
        </form>
    </div>
</body>
</html>
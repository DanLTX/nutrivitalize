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

$bmiEmail = $_GET['bmiEmail'];
$bmiValue = $_GET['bmi'];
$sql = "SELECT * FROM bmi WHERE email like '%$bmiEmail' and bmi_value = $bmiValue";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["bmiEmail"] = $row["email"];
        $_SESSION["suggestID"] = $row["suggestID"];
        $_SESSION["date"] = $row["date"];
        $_SESSION["bmi_value"] = $row["bmi_value"];
    }
}

if(isset($_POST['updatebtn'])){
    $bmiEmail = $_SESSION['bmiEmail'];
    $bmiVsess =  $_SESSION['bmi_value'];
    $date = $_POST['date'];
    $bmiValue = $_POST['bmiValue'];
    if ($bmiValue > 30) {
        $suggestID = 3;
    } elseif ($bmiValue > 25 && $bmi <= 30) {
        $suggestID = 2;
    } elseif ($bmiValue >= 18.5 && $bmi <= 25) {
        $suggestID = 1;
    } elseif ($bmiValue < 18.5) {
        $suggestID = 4;
    }

    $update = "UPDATE bmi set email='$bmiEmail',suggestID='$suggestID',date='$date', bmi_value='$bmiValue' where email like '%$bmiEmail' and bmi_value='$bmiVsess'";
    $sql2=mysqli_query($conn,$update);
    if($sql2){
        header("location: adminbmi.php");
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
        <h3>Update BMI</h3>
        <form action="#" method="post">
        <br>
        <?php
        echo "Email    : " . "   $_SESSION[bmiEmail]" . "<br>";
        echo "Suggestion ID : " . "$_SESSION[suggestID]" . "<br>";
        echo "Date : " . "<input type=\"date\" name=\"date\" value=\"$_SESSION[date]\">" . "<br>";
        echo "BMI      : " . "      <input type=\"text\" name=\"bmiValue\" value=\"$_SESSION[bmi_value]\">" . "<br>";
        ?>
        <br>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
        
        </form>
    </div>
</body>
</html>
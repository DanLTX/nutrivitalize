<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM admin";
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

$email = $_GET['email'];
$sql = "SELECT * FROM user WHERE email LIKE '%$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $_SESSION["email"] = $row["email"];
        $_SESSION["username"] = $row["username"];
        $_SESSION["password"] = $row["pass_word"];
        $_SESSION["age"] = $row["age"];
        $_SESSION["gender"] = $row["gender"];
        $_SESSION["height"] = $row["height"];
        $_SESSION["weight"] = $row["weight"];
    }
}

if(isset($_POST['updatebtn'])){
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];


    $update = "update user set username='$username',pass_word='$password',age='$age', gender='$gender', height='$height', weight='$weight' where email like '%$email'";
    $sql2=mysqli_query($conn,$update);
    if($sql2){
        header("location: adminuser.php");
    }
    else{
        echo "ERROR!!! YOUR USER IS NOT UPDATING";
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
        <h3>Update User</h3>
        <form action="adminuser.php" method="post">
        <br>
        <?php
        echo "Email    : " . "   <input type=\"text\" name=\"email\" value=\"$_SESSION[email]\">" . "<br>";
        echo "Username : " . "<input type=\"text\" name=\"username\" value=\"$_SESSION[username]\">" . "<br>";
        echo "Password : " . "<input type=\"text\" name=\"password\" value=\"$_SESSION[password]\">" . "<br>";
        echo "Age      : " . "      <input type=\"text\" name=\"age\" value=\"$_SESSION[age]\">" . "<br>";
        echo "Gender      : " . "      <input type=\"text\" name=\"gender\" value=\"$_SESSION[gender]\">" . "<br>";
        echo "Height      : " . "      <input type=\"text\" name=\"height\" value=\"$_SESSION[height]\">" . "<br>";
        echo "Weight      : " . "      <input type=\"text\" name=\"weight\" value=\"$_SESSION[weight]\">" . "<br>";
        ?>
        <br>
        <button class="submitbtn" type="submit" name="updatebtn">UPDATE</button>
        
        </form>
    </div>
</body>
</html>
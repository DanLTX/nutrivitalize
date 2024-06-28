<?php
include 'conn.php';
if(isset($_GET['foodID'])){
    $foodID = $_GET['foodID'];
    $delete = "delete from food where foodID=$foodID";

    if(!mysqli_query($conn, $delete)){
        die('Error: '.mysqli_error($conn));
    }
    echo "<script>alert('Successfully Deleted');window.location.href='adminfood.php';</script>";
}
elseif(isset($_GET['bmiEmail'])){
    $bmiEmail = $_GET['bmiEmail'];
    $delete = "delete from bmi where email= '$bmiEmail'";

    if(!mysqli_query($conn, $delete)){
        die('Error: '.mysqli_error($conn));
    }
    echo "<script>alert('Successfully Deleted');window.location.href='adminbmi.php';</script>";
}
elseif(isset($_GET['email'])){
    $email = $_GET['email'];
    $delete = "delete from user where email= '$email'";

    if(!mysqli_query($conn, $delete)){
        die('Error: '.mysqli_error($conn));
    }
    echo "<script>alert('Successfully Deleted');window.location.href='adminuser.php';</script>";
}

?>
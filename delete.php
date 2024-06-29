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
elseif(isset($_GET['bmiEmail']) && isset($_GET['bmi'])){
    $bmiEmail = $_GET['bmiEmail'];
    $bmiValue = $_GET['bmi'];
    $delete = "delete from bmi where email= '$bmiEmail' and bmi_value = '$bmiValue'";

    if(!mysqli_query($conn, $delete)){
        die('Error: '.mysqli_error($conn));
    }
    echo "<script>alert('Successfully Deleted');window.location.href='adminbmi.php';</script>";
}
elseif(isset($_GET['email'])){
    $email = $_GET['email'];
    $constraint = "SET FOREIGN_KEY_CHECKS = 0";
    $delete = "delete from user where email= '$email'";
    $delete2 = "delete from bmi where email= '$email'";

    if(!mysqli_query($conn, $constraint)){
        die('Error: '.mysqli_error($conn));
    }
    if(!mysqli_query($conn, $delete)){
        die('Error: '.mysqli_error($conn));
    }
    if(!mysqli_query($conn, $delete2)){
        die('Error: '.mysqli_error($conn));
    }
    echo "<script>alert('Successfully Deleted');window.location.href='adminuser.php';</script>";
}

?>
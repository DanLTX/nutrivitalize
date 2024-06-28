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
$sql = " SELECT * FROM user ORDER BY email ASC ";
$result = $conn->query($sql);

if(isset($_POST['addBtn'])){
    $sql="INSERT INTO user (email, username, pass_word, age, gender, height, weight) VALUES ('$_POST[email]', '$_POST[username]',
    '$_POST[password]','$_POST[age]','$_POST[gender]','$_POST[height]','$_POST[weight]')";
    if(!mysqli_query($conn, $sql)){
    die('Error:' . mysqli_error($conn));
    }
    echo "<script>alert('Successfully Added');window.location.href='adminuser.php';</script>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
            padding-top: 50px;
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
<section id="header">
        <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
        <div>
            <ul id="navbar"> 
                <li><a href="adminhome.php">Home</a></li>
                <li><a href="adminfood.php">Food Details</a></li>
                <li><a href="adminbmi.php">User's BMI</a></li>
                <li><a href="adminuser.php"><i class='bi bi-person-fill'></i>User Details</a></li>
                <li><a href="login.php"><i class="bi bi-door-closed"></i>Log Out</a></li>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>
    <section>
        <h1>User Details</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Height</th>
                <th>Weight</th>
                <th>Action</th>
            </tr>
            <tr>
                <form action="" method="post">
                    <td><input type="text" name="email"></td>
                    <td><input type="text" name="username"></td>
                    <td><input type="text" name="password"></td>
                    <td><input type="text" name="age"></td>
                    <td><input type="text" name="gender"></td>
                    <td><input type="text" name="height"></td>
                    <td><input type="text" name="weight"></td>
                    <td><a href=""><button name="addBtn" style="background-color: lightgreen;">Add</button></a></td>
                </form>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php 
                // LOOP TILL END OF DATA
                while($rows=$result->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['pass_word'];?></td>
                <td><?php echo $rows['age'];?></td>
                <td><?php echo $rows['gender'];?></td>
                <td><?php echo $rows['height'];?></td>
                <td><?php echo $rows['weight'];?></td>
                <td><?php echo "<a href=updateuser.php?email=$rows[email]>Update</a>";?>
                <?php echo "<a href=delete.php?email=$rows[email]>Delete</a>";?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>
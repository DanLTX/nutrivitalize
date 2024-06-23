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
$sql = " SELECT email,DATE_FORMAT(date,'%D %M %Y'),bmi_value FROM bmi ORDER BY email, date ASC ";
$result = $conn->query($sql);
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
                <li><a href="adminbmi.php">BMI Tracker</a></li>
                <li><a href="adminuser.php"><i class='bi bi-person-fill'></i>User Details</a></li>
                <li><a href="login.php"><i class="bi bi-door-closed"></i>Log Out</a></li>
            </ul>
        </div>
        <div id="small">
            <i id="ham" class="bi bi-list"></i>
        </div>
        
    </section>
    <section>
        <h1>BMI Tracker</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Email</th>
                <th>Date</th>
                <th>BMI</th>
                <th>Action</th>
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
                <td><?php echo $rows["DATE_FORMAT(date,'%D %M %Y')"];?></td>
                <td><?php echo $rows['bmi_value'];?></td>
                <td><?php echo "<a href=adminhome.php>Update</a>";?>
                <?php echo "<a href=adminfood.php>Delete</a>";?></td>
            </tr>
            <?php
                }
            ?>
        </table>
        <div style="text-align: center; padding-top:10px"><a href="#"><button style="background-color: lightgreen; width:10%;">Add</button></a></div>
    </section>
</body>
 
</html>

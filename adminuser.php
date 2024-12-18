<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM admin WHERE emailID = '$email'";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["emailID"];
    }
}
if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

$search = '';
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM user WHERE email LIKE '%$search%' OR username LIKE '%$search%' ORDER BY email ASC";
} else {
    $sql = "SELECT * FROM user ORDER BY email ASC";
}

$result = $conn->query($sql);

if(isset($_POST['addBtn'])){
    $height = $_POST['height'] / 100;
    $weight = $_POST['weight'];
    $bmi = round($weight  / pow($height,2),1);
    $currentdate = date("Y-m-d");
    if ($bmi > 30) {
        $suggestID = 3;
    } elseif ($bmi > 25 && $bmi <= 30) {
        $suggestID = 2;
    } elseif ($bmi >= 18.5 && $bmi <= 25) {   
        $suggestID = 1;
    } elseif ($bmi < 18.5) {
        $suggestID = 4;
    }
    $password = $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $sql="INSERT INTO user (email, username, pass_word, age, gender, height, weight) VALUES ('$_POST[email]', '$_POST[username]',
    '$hash','$_POST[age]','$_POST[gender]','$_POST[height]','$_POST[weight]')";
    $sql2="INSERT INTO bmi (email, suggestID, date, bmi_value) VALUES ('$_POST[email]','$suggestID','$currentdate','$bmi')";
    if(!mysqli_query($conn, $sql)){
    die('Error:' . mysqli_error($conn));
    }
    if(!mysqli_query($conn, $sql2)){
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
            font-family: 'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', 'sans-serif';
            padding-top: 50px;
        }
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
        th, td {
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
    <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height="auto"></a>
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
    <form method="post">
    <div class="search-container">
        <BR><BR><input class="search" type="text" name="search" placeholder="Search by email or username" value="<?php echo htmlspecialchars($search); ?>"><br><br>
        <div class="search-container2" ><button class="searchbtn" type="submit">Search</button></div>
        <br>
    </div> 
    </form>
    <br>
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
                <td><input type="text" name="email" id="email" required></td>
                <td><input type="text" name="username" required></td>
                <td><input type="text" name="password" required></td>
                <td><input type="text" name="age" id="age" required></td>
                <td>
                <select id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </td>
                <td><input type="text" name="height" id="height"></td>
                <td><input type="text" name="weight" id="weight"></td>
                <td><button name="addBtn" style="background-color: lightgreen;">Add</button></td>
            </form>
        </tr>
        <?php while ($rows = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $rows['email']; ?></td>
            <td><?php echo $rows['username']; ?></td>
            <td><?php echo "******"; ?></td>
            <td><?php echo $rows['age']; ?></td>
            <td><?php echo $rows['gender']; ?></td>
            <td><?php echo $rows['height']; ?></td>
            <td><?php echo $rows['weight']; ?></td>
            <td><?php echo "<a href=updateuser.php?email=$rows[email]><button style='background-color: lightgreen; margin-bottom: 5px'>Update</button></a>";?>
                <?php echo "<a href=delete.php?email=$rows[email]><button style='background-color: red;'>Delete</button></a>";?></td>
        </tr>
        <?php } ?>
    </table>
</section>
<script>
    //validate email
    var email = document.getElementById("email");

    function validateEmail(emailField) {
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(emailField.value)) {
            emailField.setCustomValidity("Please enter a valid email address.");
        } else {
            emailField.setCustomValidity('');
        }
    }
    email.oninput = function() {
        validateEmail(email);
    };

    var age = document.getElementById("age"),
            weight = document.getElementById("weight"),
            height = document.getElementById("height");

        //validate age range 13-100
        function validateAge() {
            if (age.value < 13 || age.value > 100) {
                age.setCustomValidity("Age must be between 13 and 100.");
            } else {
                age.setCustomValidity('');
            }
        }

        //validate weight 1-650
        function validateWeight() {
            if (weight.value < 1 || weight.value > 650) {
                weight.setCustomValidity("Weight must be between 1 and 650 kg.");
            } else {
                weight.setCustomValidity('');
            }
        }

        //validate height 1-250
        function validateHeight() {
            if (height.value < 1 || height.value > 250) {
                height.setCustomValidity("Height must be between 1 and 250 cm.");
            } else {
                height.setCustomValidity('');
            }
        }

        age.oninput = validateAge;
        weight.oninput = validateWeight;
        height.oninput = validateHeight;
</script>
</body>
</html>

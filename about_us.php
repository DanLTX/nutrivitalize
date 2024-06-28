<?php
include 'conn.php';
session_start();
$email = $_SESSION["email"];
$sqlauth = "SELECT * FROM user where email = '$email' ";
$result = mysqli_query($conn, $sqlauth);
if (mysqli_num_rows($result) == 1) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $auth = $row["email"];
    }
}
if (!isset($_SESSION['email']) || $_SESSION['email'] != $auth) {
    header('Location: login.php');
    session_destroy();
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/about_us.css">
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

    <section id="top">

        <h1>Contact Us</h1>

        <h3>Hello there! May I help you ?</h3>
        <h3></h3>
        <p>If you have any doubts and questions or you want to give us any feedback, than feel free contact us.</p>

    </section>

    <section id="middle">
        <h1>Our Team</h1>
        <div class="member-card">
            <div class="member">
                <img src="image/contact/img1.jpg" alt="img1">

                <h2>Rahul Garg</h2>

                <div class="icon">
                    <a href="mailto:rahulgarg3809@gmail.com" target="_blank"><img src="image/contact/gmail.svg"
                            alt="rahulgarg3809@gmail.com" style="width:24px;height:24px;"></a>

                    <a href="https://wa.me/9041339018" target="_blank"><img src="image/contact/whatsapp.svg"
                            alt="9041339018" style="width:24px;height:24px;"></a>

                    <a href="https://www.linkedin.com/in/rahul-garg3809/"
                        target="_blank"><img src="image/contact/linkedin.svg"
                            alt="https://www.linkedin.com/in/rahul-garg3809/"
                            style="width:24px;height:24px;"></a>
                    <a href="https://github.com/rahul-gargcoder" target="_blank"><img src="image/contact/github.svg"
                            alt="https://github.com/rahul-gargcoder" style="width:24px;height:24px;"></a>
                </div>
            </div>


            <div class="member">
                <img src="image/contact/img2.png" alt="img2">

                <h2>Yash Srivastava</h2>

                <div class="icon">
                    <a href="mailto:yashsrivastava123.ys@gmail.com" target="_blank"><img src="image/contact/gmail.svg"
                            alt="pushpendrasahu1122@gmail.com" style="width:24px;height:24px;"></a>

                    <a href="https://wa.me/919264954799" target="_blank"><img src="image/contact/whatsapp.svg"
                            alt="9264954799" style="width:24px;height:24px;"></a>

                    <a href="https://www.linkedin.com/in/yash-srivastava-8b6ab31a7/" target="_blank"><img
                            src="image/contact/linkedin.svg"
                            alt="https://www.linkedin.com/in/yash-srivastava-8b6ab31a7/"
                            style="width:24px;height:24px;"></a>
                    <a href="https://github.com/yash9264" target="_blank"><img src="image/contact/github.svg"
                            alt="https://github.com/yash9264" style="width:24px;height:24px;"></a>
                </div>


            </div>


            <div class="member">
                <img src="image/contact/img3.jpg" alt="img3">

                <h2>Pushpendra Sahu</h2>

                <div class="icon">
                    <a href="mailto:pushpendrasahu1122@gmail.com" target="_blank"><img src="image/contact/gmail.svg"
                            alt="pushpendrasahu1122@gmail.com" style="width:24px;height:24px;"></a>

                    <a href="https://wa.me/917909519551" target="_blank"><img src="image/contact/whatsapp.svg"
                            alt="7909519551" style="width:24px;height:24px;"></a>

                    <a href="https://www.linkedin.com/in/-pushpendra-sahu/"
                        target="_blank"><img src="image/contact/linkedin.svg"
                            alt="https://www.linkedin.com/in/-pushpendra-sahu/"
                            style="width:24px;height:24px;"></a>
                    <a href="https://github.com/pushpendrasahu11" target="_blank"><img src="image/contact/github.svg"
                            alt="https://github.com/pushpendrasahu11" style="width:24px;height:24px;"></a>
                </div>

            </div>

        </div>
    </section>







    <script src="contact.js"></script>
</body>

</html>
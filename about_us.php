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
    <div class="top-para">
        <h1>Nutrivitalize: Health Hub</h1>
        
        <p>Our company was created in late 2020 and was named “NutriVitalize : Health Hub”. The name encapsulates the essence of a nutritional and diet-based website. The name NutriVitalize is a combination of two words: “Nutri” which is related to nutrition, and “Vitalize” which is related to vitality or energy. By putting both together, we achieve the name that implies a focus on nourishment and wellness to promote overall health and energy levels. Health Hub is where everything related to nutrition can be found in one place on our website.</p><br>

        <p>"Empower you to thrive," sums up the path to vitality and self-improvement and aligns with the main goal of your project. It acts as a guiding light, inspiring people to welcome change and pursue personal development. The tagline encourages confidence and tenacity in achieving a better lifestyle by emphasizing empowerment and the possibility of flourishing. It conveys the idea that everyone is capable of changing their lives and realizing their goals. Essentially, our tagline will inspire people to take action toward their well-being and fulfillment by embodying the spirit of empowerment and resilience.</p>
        
        
    </div>
    </section>

    <section id="middle">
    <h1>Our Team</h1>
    <div class="member-card">
        <!-- Team Leader -->
        <div class="member">
            <img src="Hafiz.png" alt="MUHAMMAD HAFIZ DANIAL BIN ZAIDI">
            <h2>MUHAMMAD HAFIZ DANIAL BIN ZAIDI</h2>
            <p><Strong style="font-size:25px;">Project Manager</strong></p>
            <p><strong>Student Number:</strong> 2022481694</p>
            <p><strong>Program Code and Name:</strong> CS110 - Computer Science</p>
            <p><strong>Group/Class:</strong> JCDCS1104G</p>
            <div class="icon">
                <a href="mailto:daniallhafizz@gmail.com" target="_blank">
                    <i class="bi bi-envelope" style="font-size:50px;width:24px;"></i>
                </a>
                <a href="https://Wa.me/60199975463" target="_blank">
                    <i class="bi bi-whatsapp" style="font-size:50px;"></i>
                </a>
                <a href="https://www.linkedin.com/in/muhammad-hafiz-danial-zaidi-4712222a8/" target="_blank">
                    <i class="bi bi-linkedin" style="font-size:50px;"></i>
                </a>
                <a href="https://github.com/DanLTX" target="_blank">
                    <i class="bi bi-github" style="font-size:50px;"></i>
                </a>
            </div>
        </div>

        <!-- Database Designer -->
        <div class="member">
            <img src="Meor.png" alt="MEOR AFIF DINIE BIN MEOR MUHAMMAD AZMI">
            <h2>MEOR AFIF DINIE BIN MEOR MUHAMMAD AZMI</h2>
            <p><Strong style="font-size:25px;">Database Designer</strong></p>
            <p><strong>Student Number:</strong> 2022895442</p>
            <p><strong>Program Code and Name:</strong> CS110 - Computer Science</p>
            <p><strong>Group/Class:</strong> JCDCS1104G</p>
            <div class="icon">
                <a href="mailto:meorafif04@gmail.com" target="_blank">
                    <i class="bi bi-envelope" style="font-size:50px;"></i>
                </a>
                <a href="http://Wa.me/601154130454" target="_blank">
                    <i class="bi bi-whatsapp" style="font-size:50px;"></i>
                </a>
                <a href="https://www.linkedin.com/in/meorafif/" target="_blank">
                    <i class="bi bi-linkedin" style="font-size:50px;"></i>
                </a>
                <a href="https://github.com/MADlody" target="_blank">
                    <i class="bi bi-github" style="font-size:50px;"></i>
                </a>
            </div>
        </div>

        <!-- Programmer 1 -->
        <div class="member">
            <img src="Naqeeb.png" alt="MIQHAEL NAQEEB BIN LEMAN">
            <h2>MIQHAEL NAQEEB BIN LEMAN</h2>
            <p><Strong style="font-size:25px;">Programmer 1</strong></p>
            <p><strong>Student Number:</strong> 2022660938</p>
            <p><strong>Program Code and Name:</strong> CS110 - Computer Science</p>
            <p><strong>Group/Class:</strong> JCDCS1104G</p>
            <div class="icon">
                <a href="mailto:nmiqhael@gmail.com" target="_blank">
                    <i class="bi bi-envelope" style="font-size:50px;"></i>
                </a>
                <a href="https://wa.me/601132078747" target="_blank">
                    <i class="bi bi-whatsapp" style="font-size:50px;"></i>
                </a>
                <a href="https://www.linkedin.com/in/miqhael-naqeeb-2ba6772a8/" target="_blank">
                    <i class="bi bi-linkedin" style="font-size:50px;"></i>
                </a>
                <a href="https://github.com/Ryhito" target="_blank">
                    <i class="bi bi-github" style="font-size:50px;"></i>
                </a>
            </div>
        </div>

        <!-- Programmer 2 -->
        <div class="member">
            <img src="Han.png" alt="MOHAMAD HARITH NAZRIN BIN MOHD NAZRI">
            <h2>MOHAMAD HARITH NAZRIN BIN MOHD NAZRI</h2>
            <p><Strong style="font-size:25px;">Programmer 2</strong></p>
            <p><strong>Student Number:</strong> 2022466848</p>
            <p><strong>Program Code and Name:</strong> CS110 - Computer Science</p>
            <p><strong>Group/Class:</strong> JCDCS1104G</p>
            <div class="icon">
                <a href="mailto:harithjr1710@gmail.com" target="_blank">
                    <i class="bi bi-envelope" style="font-size:50px;"></i>
                </a>
                <a href="http://Wa.me/60127837005" target="_blank">
                    <i class="bi bi-whatsapp" style="font-size:50px;"></i>
                </a>
                <a href="https://www.linkedin.com/in/rohit-verma/" target="_blank">
                    <i class="bi bi-linkedin" style="font-size:50px;"></i>
                </a>
                <a href="https://github.com/hnharithnazrin" target="_blank">
                    <i class="bi bi-github" style="font-size:50px;"></i>
                </a>
            </div>
        </div>
    </div>
</section>







    <script src="contact.js"></script>
</body>

</html>
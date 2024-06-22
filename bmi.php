<?php
session_start();
include 'conn.php';

$email = $_SESSION["email"];
$sql = " SELECT bmi_value, MONTHNAME(date) FROM bmi WHERE email LIKE '%$email' ORDER BY date ASC";
$result = $conn->query($sql);
$conn->close();

$height = $_SESSION['height'] / 100;
$weight = $_SESSION['weight'];
$bmi = round($weight  / pow($height,2),1);

$dataPoints2 = array();
while($rows=$result->fetch_assoc()){

    $dataPoints2[] = array("y" => $rows['bmi_value'], "label" => $rows['MONTHNAME(date)']);
        
}
$dataPoints2[] =  array("y" => $bmi, "label" => date("F"));

/*
$dataPoints = array(

	array("y" => 25, "label" => "January"),
	array("y" => 23.3, "label" => "February"),
	array("y" => 24.1, "label" => "March"),
	array("y" => 25, "label" => "April"),
	array("y" => 22, "label" => "May"),
	array("y" => $bmi, "label" => "June"),
    array("y" => null, "label" => "July"),
    array("y" => null, "label" => "August"),
    array("y" => null, "label" => "September"),
    array("y" => null, "label" => "October"),
    array("y" => null, "label" => "November"),
    array("y" => null, "label" => "Disember"),
);
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/bmi.css">
</head>
<body>
<section id="header">
        <a href="#"><img id="logo" src="newlogo2.png" alt="" class="logo" width="90" height=auto></a>
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
    <div class="updatebar">
        <h1>Update height and weight on</h1>
        <h1>profile for your monthly BMI</h1>
        <div class="arrowbtn">
        <a href="update.php"><button class="arrow"><i class="bi bi-arrow-right"></i></button></a>
        </div>
    </div>
    

    <script>
    window.onload = function () {
    
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
            text: "Monthly BMI"
        },
        axisY: {
            title: "BMI"
        },
        data: [{
            type: "line",
            lineColor: "lightgreen",
            markerColor: "lightgreen",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart.render();
    
    }
    </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
    <?php
    $height = $_SESSION['height'] / 100;
    $weight = $_SESSION['weight'];
    $bmi = round($weight  / pow($height,2),1);
    echo "<h1 class=\"bmi\">BMI = $bmi</h1>";
    
    ?>
</body>
</html>
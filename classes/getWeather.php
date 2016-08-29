<?php
require_once './include/config.php';
try {
  $pdo = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

$getBaro = "SELECT * FROM cust_weatherOther WHERE date > DATE_SUB(NOW(), INTERVAL 24 HOUR)";

$getTemp = "SELECT DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') AS time, ROUND(AVG(temp),1) AS avgtemp, ROUND(AVG(humid),1) as avghumid FROM cust_weatherTemp WHERE date > DATE_SUB(NOW(), INTERVAL 24 HOUR) GROUP BY DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') - INTERVAL 24 HOUR ORDER BY DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') - INTERVAL 24 HOUR DESC";

$getTempHWK = "SELECT DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') AS time, ROUND(AVG(temp),1) AS avgtemp, ROUND(AVG(humid),1) as avghumid FROM cust_weatherTemp WHERE date > DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') - INTERVAL 1 HOUR ORDER BY DATE_FORMAT(`date`,'%Y-%m-%d %H:00:00') - INTERVAL 1 WEEK DESC";

// $getTempHr = "SELECT DATE_FORMAT(`date`,'%Y-%m-%d %H:%i:00') - INTERVAL (MINUTE(`date`)%5) MINUTE AS time, ROUND(AVG(temp),1) AS avgtemp, ROUND(AVG(humid),1) as avghumid FROM cust_weatherTemp GROUP BY DATE_FORMAT(`date`,'%Y-%m-%d %H:%i:00') - INTERVAL (MINUTE(`date`)%5) MINUTE ORDER BY DATE_FORMAT(`date`,'%Y-%m-%d %H:%i:00') - INTERVAL (MINUTE(`date`)%5) MINUTE DESC LIMIT 13;";
$getTempWk = "SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS day, ROUND(AVG(temp),1) AS avgtemp, ROUND(AVG(humid),1) as avghumid FROM cust_weatherTemp WHERE date > DATE_SUB(NOW(), INTERVAL 7 DAY) GROUP BY DAY(`date`) ORDER BY DAY(`date`) DESC";

$getTempYr = "SELECT DATE_FORMAT(`date`, '%Y-%m-%d') AS month, ROUND(AVG(temp),1) AS avgtemp, ROUND(AVG(humid),1) as avghumid FROM cust_weatherTemp WHERE date > DATE_SUB(NOW(), INTERVAL 1 Year) GROUP BY MONTH(`date`) ORDER BY MONTH(`date`) DESC LIMIT 12";

$getLatestTemp = "SELECT * FROM cust_weatherTemp ORDER BY date DESC LIMIT 1";
$getLatestBaro = "SELECT * FROM cust_weatherOther ORDER BY date DESC LIMIT 1";

$getLowTemp = "SELECT * FROM cust_weatherTemp WHERE temp =  ( SELECT MIN(temp) FROM cust_weatherTemp )";
$getHighTemp = "SELECT * FROM cust_weatherTemp WHERE temp =  ( SELECT MAX(temp) FROM cust_weatherTemp )";

$getLowHumid = "SELECT * FROM cust_weatherTemp WHERE humid =  ( SELECT MIN(humid) FROM cust_weatherTemp )";
$getHighHumid = "SELECT * FROM cust_weatherTemp WHERE humid =  ( SELECT MAX(humid) FROM cust_weatherTemp )";

$queryBaro = $pdo->query($getBaro);
$queryTemp = $pdo->query($getTemp);
$queryTempYR = $pdo->query($getTempYr);
$queryTempWK = $pdo->query($getTempWk);
$queryTempHWK = $pdo->query($getTempHWK);

$queryLatestBaro = $pdo->query($getLatestBaro);
$queryLatestTemp = $pdo->query($getLatestTemp);

$queryMinTemp = $pdo->query($getLowTemp);
$queryMaxTemp = $pdo->query($getHighTemp);

$queryMinHumid = $pdo->query($getLowHumid);
$queryMaxHumid = $pdo->query($getHighHumid);

$baroRows = array();
$tempRows = array();
$tempRowsYR = array();
$tempRowsWK = array();
$tempRowsHWK = array();

$countBaro = 0;
$countTemp = 0;
$countTempYR = 0;
$countTempWK = 0;
$countTempHWK = 0;

$latestBaro = 0;
$latestTemp = 0.0;

$lowTemp = 0.0;
$highTemp = 0.0;

$lowHumid = 0.0;
$highHumid = 0;

$countB = $pdo->prepare($getBaro);
$countB->execute();
$countBaro = $countB->rowCount();

$countT = $pdo->prepare($getTemp);
$countT->execute();
$countTemp = $countT->rowCount();

$countTYR = $pdo->prepare($getTempYr);
$countTYR->execute();
$countTempYR = $countTYR->rowCount();

$countTWK = $pdo->prepare($getTempWk);
$countTWK->execute();
$countTempWK = $countTWK->rowCount();

$countTHWK = $pdo->prepare($getTempHWK);
$countTHWK->execute();
$countTempHWK = $countTHWK->rowCount();

if($queryBaro){
    while ($row = $queryBaro->fetch(PDO::FETCH_ASSOC)) {
        array_push($baroRows, $row);
    }
}
if($queryTemp){
    while ($row = $queryTemp->fetch(PDO::FETCH_ASSOC)) {
        array_push($tempRows, $row);
    }
}
if($queryTempYR){
    while ($row = $queryTempYR->fetch(PDO::FETCH_ASSOC)) {
        array_push($tempRowsYR, $row);
    }
}
if($queryTempWK){
    while ($row = $queryTempWK->fetch(PDO::FETCH_ASSOC)) {
        array_push($tempRowsWK, $row);
    }
}
if($queryTempHWK){
    while ($row = $queryTempHWK->fetch(PDO::FETCH_ASSOC)) {
        array_push($tempRowsHWK, $row);
    }
}
if($queryLatestBaro){
    $latestBaro = $queryLatestBaro->fetch(PDO::FETCH_ASSOC);
}
if($queryLatestTemp){
    $latestTemp = $queryLatestTemp->fetch(PDO::FETCH_ASSOC);
}

if($queryMinTemp){
    $lowTemp = $queryMinTemp->fetch(PDO::FETCH_ASSOC);
}
if($queryMaxTemp){
    $highTemp = $queryMaxTemp->fetch(PDO::FETCH_ASSOC);
}

if($queryMinHumid){
    $lowHumid = $queryMinHumid->fetch(PDO::FETCH_ASSOC);
}
if($queryMaxHumid){
    $highHumid = $queryMaxHumid->fetch(PDO::FETCH_ASSOC);
}

switch ($latestBaro['forecast']) {
    case 0:
    $forecast = "Partly Cloudy";
    $fc_image = "weather_partly_cloudy";
    break;
    case 1:
    $forecast = "Sunny";
    $fc_image = "sunshine";
    break;
    case 2:
    $forecast = "Cloudy";
    $fc_image = "cloudy";
    break;
    case 3:
    $forecast = "Raining";
    $fc_image = "rainning";
    break;
    case 4:
    $forecast = "Snowy";
    $fc_image = "snowy";
    break;
}
?>
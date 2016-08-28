<?php
error_reporting(-1);
ini_set('display_errors', 'On');
parse_str(file_get_contents("php://input"), $_POST);

require_once './include/config.php';

try {
  $pdo = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

$mac = "";
$humidity = "";
$temprature = "";
$channel = "";
$barometer = "";
$wForecast = "";

$mac = $_POST['mac'];
$humidity = $_POST['oh'];
$temprature = $_POST['ot'];
$channel = $_POST['ch'];
$barometer = $_POST['baro'];
$wForecast = $_POST['wfor'];

if( $mac == $macaddress){
    if( isset($barometer) )
    {
        $stmt = $pdo->prepare ("INSERT INTO cust_weatherOther (baro, forecast) VALUES (:baro, :forecast)");
        $stmt -> bindParam(':baro', $barometer);
        $stmt -> bindParam(':forecast', $wForecast);
        $stmt -> execute();
    }
    elseif( isset($temprature) )
    {
        $stmt = $pdo->prepare ("INSERT INTO cust_weatherTemp (humid, temp) VALUES (:humid, :temp)");
        $stmt -> bindParam(':humid', $humidity);
        $stmt -> bindParam(':temp', $temprature);
        $stmt -> execute();
    }
    else
    {
        http_response_code(400);
        echo 'ERROR: Bad Request';
    }
    
}
else {
    http_response_code(400);
    echo 'ERROR: Bad Request';
}
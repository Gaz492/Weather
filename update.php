<?php
// error_reporting(-1);
// ini_set('display_errors', 'Off');
parse_str(file_get_contents("php://input"), $_POST);

require_once './include/config.php';

try {
  $pdo = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo 'Error: ' . $e->getMessage();
}

if( isset($_POST['mac']) ){
    // $channel = $_POST['ch'];

    if( $_POST['mac'] == $macaddress){
        if( isset($_POST['baro']) )
        {
            $stmt = $pdo->prepare ("INSERT INTO cust_weatherOther (baro, forecast) VALUES (:baro, :forecast)");
            $stmt -> bindParam(':baro', $_POST['baro']);
            $stmt -> bindParam(':forecast', $_POST['wfor']);
            $stmt -> execute();
        }
        elseif( isset($_POST['ot']) )
        {
            $stmt = $pdo->prepare ("INSERT INTO cust_weatherTemp (humid, temp) VALUES (:humid, :temp)");
            $stmt -> bindParam(':humid', $_POST['oh']);
            $stmt -> bindParam(':temp', $_POST['ot']);
            $stmt -> execute();
        }
        else
        {
            http_response_code(400);
            echo 'ERROR: Bad Request';
        }

    }
    else {
        http_response_code(401);
        echo 'ERROR: Unauthorized macaddress ' . $mac;
    }
}

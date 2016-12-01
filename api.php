<?php
// error_reporting(-1);
// ini_set('display_errors', 'Off');
require_once 'classes/getWeather.php';
header('Content-Type: application/json');

?>

{
    "current": {
        "temp": "<?php echo $latestTemp['temp']; ?>",
        "baro": "<?php echo $latestBaro['baro']; ?>",
        "humid": "<?php echo $latestTemp['humid']; ?>",
        "lowTemp": "<?php echo $lowTemp['temp']; ?>",
        "highTemp": "<?php echo $highTemp['temp']; ?>",
        "lowHumid": "<?php echo $lowHumid['humid']; ?>",
        "highHumid": "<?php echo $highHumid['humid']; ?>",
        "lowTemp24": "<?php echo $lowTemp24['temp']; ?>",
        "highTemp24": "<?php echo $highTemp24['temp']; ?>",
        "lowHumid24": "<?php echo $lowHumid24['humid']; ?>",
        "highHumid24": "<?php echo $highHumid24['humid']; ?>",
        "forecast": "<?php echo $forecast; ?>"
    },
    "24hr": {
        "time": [<?php for ($x = $countTemp - 1; $x >= 0; $x--) { echo '"' . $tempRows[$x]['time']; if($x == 0) {echo '"';} else {echo '", ';};} ?>],
        "temp": [<?php for ($x = $countTemp -1; $x >= 0; $x--) { echo $tempRows[$x]['avgtemp']; if($x == 0) {echo '';} else {echo ', ';};}?>]
    },
    "weekHR": {
        "time": [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo '"' . $tempRowsHWK[$x]['time']; if($x == 0) {echo '"';} else {echo '", ';};}?>],
        "temp": [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo $tempRowsHWK[$x]['avgtemp']; if($x == 0) {echo '';} else {echo ', ';};}?>]
    },
    "year": {
        "time": [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo '"' . $tempRowsYR[$x]['month']; if($x == 0) {echo '"';} else {echo '", ';};}?>],
        "temp": [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo $tempRowsYR[$x]['avgtemp']; if($x == 0) {echo '';} else {echo ', ';};}?>]
    }
}
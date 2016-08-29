<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require_once 'classes/getWeather.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Home Weather Monitor</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-HzUaiJdCTIY/RL2vDPRGdEQHHahjzwoJJzGUkYjHVzTwXFQ2QN/nVgX7tzoMW3Ov" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Weather</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>

  <div class="container">
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Overview</a></li>
      <li><a data-toggle="tab" href="#lastWK">Last Week</a></li>
      <li><a data-toggle="tab" href="#lastyr">Last Year</a></li>
    </ul>

    <div class="tab-content">
      <div id="home" class="tab-pane fade in active">
        <div class="container">
          <div class="row">
            <div class="col-md-6 info-panel">
              <h2>12-24 Hour Forecast</h2>
              <?php echo '<h3>Forecast: ' . $forecast . '<img src="./assets/images/forecast/' . $fc_image . '.png" alt="" style="position: absolute;"></h3>'; ?>
            </div>
            <div class="col-md-6 info-panel">
              <h2>Barometer <img src="./assets/images/icons/baro_icon.png" alt"" style="position: absolute;"></h2>
              <?php echo '<h3>Current Pressure: ' . $latestBaro['baro'] . ' hPa</h3>'; ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 info-panel">
              <h2>Temperature <img src="./assets/images/icons/tem_icon.png" alt"" style="position: absolute;"></h2>
              <?php
              echo '<h3>Current: ' . $latestTemp['temp'] . '°C</h3>';
              echo '<h4>Min: ' . $lowTemp['temp'] . '°C</h4>';
              echo '<h4>Max: ' . $highTemp['temp'] . '°C</h4>';
              ?>
            </div>
            <div class="col-md-6 info-panel">
              <h2>Humidity  <img src="./assets/images/icons/humidity_icon.png" alt"" style="position: absolute;"></h2>
              <?php
              echo '<h3>Current: ' . $latestTemp['humid'] . '%</h3>';
              echo '<h4>Min: ' . $lowHumid['humid'] . '%</h4>';
              echo '<h4>Max: ' . $highHumid['humid'] . '%</h4>';
              ?>
            </div>
            <div class="col-md-12 info-panel">
              <h3>Last 24 Hours</h3>
              <!-- <canvas id="hrAvg" width="800" height="200" style="background-color:rgba(255,255,255,1);"></canvas> -->
              <canvas id="lastDay" width="800" height="200"></canvas>
            </div>
            <div class="col-md-12 info-panel">
              <h3>Week Hourly</h3>
              <!-- <canvas id="hrAvg" width="800" height="200" style="background-color:rgba(255,255,255,1);"></canvas> -->
              <canvas id="lastHWeek" width="800" height="200"></canvas>
            </div>
          </div>
        </div>
      </div>
      <div id="lastWK" class="tab-pane fade">
        <div class="container info-panel">
          <h3>Last Week Average</h3>
          <canvas id="lastWeek" width="800" height="200"></canvas>
        </div>
      </div>
      <div id="lastyr" class="tab-pane fade">
        <div class="container info-panel">
          <h3>Average Temperature of the last year</h3>
          <canvas id="yearAvg" width="800" height="200"></canvas>
        </div>
      </div>
    </div>

    <p class="info-panel">Remember to do: set system static-host-mapping host-name gateway.weather.oregonscientific.com inet 192.168.1.32</p>
    <?php
    // echo 'Baro: ';
    // print_r($baroRows);
    // echo '<br/>';
    // print_r($countBaro);
    // echo '<br/>';
    // echo 'Temp: ';
    // print_r($tempRowsYR[0]['avgtemp']);
    // echo '<br/>';
    // print_r($countTemp);
    // echo '<br/>';
    // echo 'Latest ';
    // echo $latestTemp['temp'];
    // echo '<br/>';
    // print_r($latestTemp);
    // print_r($countTempHR);
    ?>
  </div>


  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.1/Chart.bundle.min.js"></script>
  <script>
    var yearAvg = document.getElementById("yearAvg");
    var lastWeek = document.getElementById("lastWeek");
    var lastHWeek = document.getElementById("lastHWeek");
    var lastDay = document.getElementById("lastDay");
    var lastWeek = new Chart(lastWeek, {
      type: 'line',
      data: {
        labels: [<?php for ($x = $countTempWK -1; $x >= 0; $x--) { echo "'" . $tempRowsWK[$x]['day'] . "', ";}?>],
        datasets: [
        {
          label: "Last Week",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: [<?php for ($x = $countTempWK - 1; $x >= 0; $x--) { echo "'" . $tempRowsWK[$x]['avgtemp'] . "', ";}?>],
          spanGaps: false,
        }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:false
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
          xAxes:[{
            type: 'time',
            time: {
              format: "YYYY-MM-DD-dddd",
              unit: 'day',
              unitStepSize: 7,
              tooltipFormat: 'DD dddd'
            },
            scaleLabel: {
              display: true,
              labelString: 'Day'
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
        }
      }
    });

    var lastHWeek = new Chart(lastHWeek, {
      type: 'line',
      data: {
        labels: [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo "'" . $tempRowsHWK[$x]['time'] . "', ";}?>],
        datasets: [
        {
          label: "Week Hourly",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo "'" . $tempRowsHWK[$x]['avgtemp'] . "', ";}?>],
          spanGaps: false,
        }
        ]
      },
      options: {
        responsive: true,
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:false
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
          xAxes:[{
            display: true,
            type: 'time',
            // time: {
            //   format: "YYYY-MM-DD HH:mm",
            //   unit: 'hour',
            //   unitStepSize: 5,
            //   tooltipFormat: 'HH:mm'
            // },
            scaleLabel: {
              display: true,
              labelString: 'Hours'
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
        }
      }
    });
    
    var lastDay = new Chart(lastDay, {
      type: 'line',
      data: {
        labels: [<?php for ($x = $countTemp -1; $x >= 0; $x--) { echo "'" . $tempRows[$x]['time'] . "', ";}?>],
        datasets: [
        {
          label: "Last 24 Hours",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: [<?php for ($x = $countTemp -1; $x >= 0; $x--) { echo "'" . $tempRows[$x]['avgtemp'] . "', ";}?>],
          spanGaps: false,
        }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:false
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
          xAxes:[{
            type: 'time',
            // time: {
            //   format: "YYYY-MM-DD HH:mm",
            //   unit: 'hour',
            //   unitStepSize: 1,
            //   tooltipFormat: 'HH:mm'
            // },
            scaleLabel: {
              display: true,
              labelString: 'Hours'
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
        }
      }
    });

    var yearAvg = new Chart(yearAvg, {
      type: 'line',
      data: {
        labels: [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo "'" . $tempRowsYR[$x]['month'] . "', ";} ?>],
        datasets: [
        {
          label: "Average Temperature",
          fill: false,
          lineTension: 0.1,
          backgroundColor: "rgba(75,192,192,0.4)",
          borderColor: "rgba(75,192,192,1)",
          borderCapStyle: 'butt',
          borderDash: [],
          borderDashOffset: 0.0,
          borderJoinStyle: 'miter',
          pointBorderColor: "rgba(75,192,192,1)",
          pointBackgroundColor: "#fff",
          pointBorderWidth: 1,
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(75,192,192,1)",
          pointHoverBorderColor: "rgba(220,220,220,1)",
          pointHoverBorderWidth: 2,
          pointRadius: 4,
          pointHitRadius: 10,
          data: [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo "'" . $tempRowsYR[$x]['avgtemp'] . "', ";} ?>],
          spanGaps: false,
        }
        ]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:false
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
          xAxes:[{
            type: "time",
            time: {
              format: "MMMM",
              unit: 'month',
              unitStepSize: 1,
              tooltipFormat: 'MMM YYYY'
            },
            scaleLabel: {
              display: true,
              labelString: 'Month'
            },
            gridLines:{
              color:"rgba(180, 180, 180, 1)",
              zeroLineColor:"rgba(180, 180, 180, 1)"
            }
          }],
        }
      }
    });
  </script>

</body>
</html>
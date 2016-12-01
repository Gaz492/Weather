<?php
// error_reporting(-1);
// ini_set('display_errors', 'Off');
require_once 'classes/getWeather.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>Home Weather</title>
	<link rel="shortcut icon" href="favicon.png">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<!-- <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" rel="stylesheet" integrity="sha384-HzUaiJdCTIY/RL2vDPRGdEQHHahjzwoJJzGUkYjHVzTwXFQ2QN/nVgX7tzoMW3Ov" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/bootstrap-material-design.min.css" integrity="sha256-j3CLSRG31GkOu6kaeLh7XsRgL2YNvRl9aOtXoAYt320=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/css/ripples.min.css" integrity="sha256-+Og2qJI9qzvKYwhGo/LYXg0FzE1BhEQfDsUSjKXQ3Bg=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">Weather</a>
				<a href="/update/"></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li class="active"><a href="">Home <span class="sr-only">(current)</span></a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<div class="container">
			<div class="row">
				<div class="col-md-6 info-panel">
					<h2>12-24 Hour Forecast</h2>
					<?php //echo '<h3>Forecast: ' . $forecast . '<img src="./assets/images/forecast/' . $fc_image . '.png" alt="" class="img-responsive img-rounded"></img></h3>'; ?>
					<?php echo '<h3>Forecast: ' . $forecast . '</h3>'; ?>
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
                    <h2>Last 24 Hours</h2>
                    <?php
                    echo '<h4>Min: ' . $lowTemp24['temp'] . '°C</h4>';
                    echo '<h4>Max: ' . $highTemp24['temp'] . '°C</h4>';
                    ?>
				</div>
				<div class="col-md-6 info-panel">
					<h2>Humidity  <img src="./assets/images/icons/humidity_icon.png" alt"" style="position: absolute;"></h2>
					<?php
					echo '<h3>Current: ' . $latestTemp['humid'] . '%</h3>';
					echo '<h4>Min: ' . $lowHumid['humid'] . '%</h4>';
					echo '<h4>Max: ' . $highHumid['humid'] . '%</h4>';
					?>
                    <h2>Last 24 Hours</h2>
                    <?php
                    echo '<h4>Min: ' . $lowHumid24['humid'] . '%</h4>';
                    echo '<h4>Max: ' . $highHumid24['humid'] . '%</h4>';
                    ?>
                </div>
				</div>
			</div>
			<div class="row">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist" >
					<li role="presentation" class="active"><a href="#temp" aria-controls="temp" role="tab" data-toggle="tab">Temprature</a></li>
					<li role="presentation"><a href="#humid" aria-controls="humid" role="tab" data-toggle="tab">Humidity</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="temp">
						<div class="col-md-12 info-panel">
							<h3>Last 24 Hours</h3>
							<div id="24Hr" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
						<div class="col-md-12 info-panel">
							<h3>Week Hourly</h3>
							<div id="weekHR" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
						<div class="col-md-12 info-panel">
							<h3>Week Average</h3>
							<div id="week" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
						<div class="col-md-12 info-panel">
							<h3>Average Temperature of the last year</h3>
							<div id="year" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane" id="humid">
						<div class="col-md-12 info-panel">
							<h3>Nothing Here Yet :(</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/material.min.js" integrity="sha256-uZbIqasulk7Y9yEwknbeQ0FpF3aUhtPwuggbpvQaI8Y=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.5.10/js/ripples.min.js" integrity="sha256-TY/EO/++Ug/P+fSBjaqlmtuphCBKwlP7TOnS+SGnN8g=" crossorigin="anonymous"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment.min.js"></script>
	<script>
		$(function () {

			Highcharts.setOptions({
				chart: {

				},
				series: [

				],
				credits: {
					enabled: false
				},
				tooltip: {
					crosshairs: true,
					shared: true,
					headerFormat: 'Temperature',
					formatter: function() {
				        return 'Temperature<br/><b>' + moment(this.x).format("MMM-Do HH:mm") + '</b> is <b>' + this.y + ' °c </b>';
				    }
				},
				plotOptions: {
					line: {
						events: {
							legendItemClick: function () {
								return false; 
							}
						}
					}
				},
			});

			$('#24Hr').highcharts({
				chart: {
					type: 'line'
				},
				title: {
					text: '24 Hour Average Temperature'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						formatter: function() {
							return moment(this.value).format("ddd HH:mm");
						}
					},
					categories: [<?php for ($x = $countTemp - 1; $x >= 0; $x--) { echo "'" . $tempRows[$x]['time'] . "', ";}?>]
				},
				yAxis: {
					title: {
						text: 'Temperature'
					},
					labels: {
						formatter: function () {
							return this.value + '°c';
						}
					}
				},
				series: [{
					name: 'Icy',
					color: '#33ccff',
					marker: {
						symbol: 'circle'
					},
					data: [<?php for ($x = $countTemp -1; $x >= 0; $x--) { echo $tempRows[$x]['avgtemp'] . ", ";}?>],
					zones: [{
						value: 0,
						color: '#33ccff'
					}, {
						value: 10,
						color: '#3399ff'
					}, {
						value: 20,
						color: '#90ed7d'
					}, {
						value: 30,
						color: '#ff8c1a'
					}, {
						value: 40,
						color: '#ff3300'
					}],
				},
				{
					name: 'Cold',
					color: '#3399ff',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Warm',
					color: '#90ed7d',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Hot',
					color: '#ff8c1a',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Very Hot',
					color: '#ff3300',
					marker: {
						symbol: 'circle'
					},
				}]
			});

			$('#weekHR').highcharts({
				chart: {
					type: 'line'
				},
				title: {
					text: 'Week Hourly Average Temperature'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						step: 7,
						rotation: -75,
						formatter: function() {
							return moment(this.value).format("MMM-Do HH:mm");
						}
					},
					categories: [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo "'" . $tempRowsHWK[$x]['time'] . "', ";}?>]
				},
				yAxis: {
					title: {
						text: 'Temperature'
					},
					labels: {
						formatter: function () {
							return this.value + '°c';
						}
					}
				},
				series: [{
					name: 'Icy',
					color: '#33ccff',
					marker: {
						symbol: 'circle'
					},
					data: [<?php for ($x = $countTempHWK -1; $x >= 0; $x--) { echo $tempRowsHWK[$x]['avgtemp'] . ", ";}?>],
					zones: [{
						value: 0,
						color: '#33ccff'
					}, {
						value: 10,
						color: '#3399ff'
					}, {
						value: 20,
						color: '#90ed7d'
					}, {
						value: 30,
						color: '#ff8c1a'
					}, {
						value: 40,
						color: '#ff3300'
					}],
				},
				{
					name: 'Cold',
					color: '#3399ff',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Warm',
					color: '#90ed7d',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Hot',
					color: '#ff8c1a',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Very Hot',
					color: '#ff3300',
					marker: {
						symbol: 'circle'
					},
				}]
			});

			$('#week').highcharts({
				chart: {
					type: 'line'
				},
				title: {
					text: 'Week Day Average Temperature'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						formatter: function() {
							return moment(this.value).format("dddd Do");
						}
					},
					categories: [<?php for ($x = $countTempWK -1; $x >= 0; $x--) { echo "'" . $tempRowsWK[$x]['day'] . "', ";}?>]
				},
				yAxis: {
					title: {
						text: 'Temperature'
					},
					labels: {
						formatter: function () {
							return this.value + '°c';
						}
					}
				},
				series: [{
					name: 'Icy',
					color: '#33ccff',
					marker: {
						symbol: 'circle'
					},
					data: [<?php for ($x = $countTempWK -1; $x >= 0; $x--) { echo $tempRowsWK[$x]['avgtemp'] . ", ";}?>],
					zones: [{
						value: 0,
						color: '#33ccff'
					}, {
						value: 10,
						color: '#3399ff'
					}, {
						value: 20,
						color: '#90ed7d'
					}, {
						value: 30,
						color: '#ff8c1a'
					}, {
						value: 40,
						color: '#ff3300'
					}],
				},
				{
					name: 'Cold',
					color: '#3399ff',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Warm',
					color: '#90ed7d',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Hot',
					color: '#ff8c1a',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Very Hot',
					color: '#ff3300',
					marker: {
						symbol: 'circle'
					},
				}]
			});

			$('#year').highcharts({
				chart: {
					type: 'line'
				},
				title: {
					text: 'Monthly Average Temperature'
				},
				xAxis: {
					type: 'datetime',
					labels: {
						formatter: function() {
							return moment(this.value).format("MMMM");
						}
					},
					categories: [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo "'" . $tempRowsYR[$x]['month'] . "', ";} ?>]
				},
				yAxis: {
					title: {
						text: 'Temperature'
					},
					labels: {
						formatter: function () {
							return this.value + '°c';
						}
					}
				},
				series: [{
					name: 'Icy',
					color: '#33ccff',
					marker: {
						symbol: 'circle'
					},
					data: [<?php for ($x = $countTempYR -1; $x >= 0; $x--) { echo $tempRowsYR[$x]['avgtemp'] . ", ";} ?>],
					zones: [{
						value: 0,
						color: '#33ccff'
					}, {
						value: 10,
						color: '#3399ff'
					}, {
						value: 20,
						color: '#90ed7d'
					}, {
						value: 30,
						color: '#ff8c1a'
					}, {
						value: 40,
						color: '#ff3300'
					}],
				},
				{
					name: 'Cold',
					color: '#3399ff',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Warm',
					color: '#90ed7d',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Hot',
					color: '#ff8c1a',
					marker: {
						symbol: 'circle'
					},
				},
				{
					name: 'Very Hot',
					color: '#ff3300',
					marker: {
						symbol: 'circle'
					},
				}]
			});
		});
	</script>

</body>
</html>
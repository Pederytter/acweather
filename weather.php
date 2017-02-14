<html>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
		<style>
			.container {
				width: 80%;
				margin: 15px auto;
			}
		</style>
		<script>
			$(document).ready(function(){
				var weatherArray = new Array();


				$( "input" ).keyup(function() {
					var city = $( this ).val();
					$( "#city" ).text( city );
				}).keyup();


				$("input").keyup(function(){

					$( "#div1" ).empty();
					var city = $( "input" ).val();
					var city = city.toString();
					var apiFirst = 'http://api.openweathermap.org/data/2.5/weather?q=' + city + ',dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric';
					$.getJSON(apiFirst, function(data){
						console.log(data);
						var test = data.main.temp;
						var standardValue = 0.2;
						$('#test').html(test);
						var ii = 0;
						for (i = 0; i < 56; i++) {
							var d = 0.4;
							standardValue = standardValue + 0.05;
							ii++;
							var timeDay = ii%8;
							if(timeDay == 0){
								var dayRange = 0;
							}else if(timeDay == 1){
								var dayRange = 1;
							}else if(timeDay == 2){
								var dayRange = 1.5;
							}else if(timeDay == 3){
								var dayRange = 2.4;
							}else if(timeDay == 4){
								var dayRange = 3;
							}else if(timeDay == 5){
								var dayRange = 2.3;
							}else if(timeDay == 6){
								var dayRange = 1;
							}else if(timeDay == 7){
								var dayRange = 0;
							} else {
								var dayRange = 0;
							}

							test = d * standardValue + test + dayRange;	
							weatherArray.push(test);	
							weatherGraph();		

							var para = document.createElement("p");
							var node = document.createTextNode(test);
							para.appendChild(node);
							var element = document.getElementById("div1");
							element.appendChild(para);
							test = test - dayRange;	

						};
						$.each(data,function(key,val){
							if(json_object.hasOwnProperty('main')){
								alert(test);
							};
						});
					});
				}).keyup();

				function weatherGraph() {
			var ctx = document.getElementById('myChart').getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				options: {
					scales: {
						xAxes: [{
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}
						}],
						yAxes: [{
							gridLines: {
								color: "rgba(0, 0, 0, 0)",
							}   
						}]
					},
					responsive: false
				},
				data: {
					labels: ['0:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00', '03:00', '06:00', '09:00'],
					yLabels: ['-5', '0', '5'],					
					datasets: [{
						label: 'temperatur',
						data: weatherArray,
						backgroundColor: "rgba(255, 204, 0, 0.2)",
						borderColor: "rgb(255, 204, 0)",
						hoverBackgroundColor: "rgb(255, 204, 0)"
					}]
				}
			});
		};
			});
		</script>
	</head>
	<body>

		<div class="container">
			<h2>Chart.js — Line Chart Demo</h2>
			<div>
				<canvas height="200px" width="3000px" id="myChart"></canvas>
			</div>
		</div>
		<input type="text" value="Ingen by"> <br>
		<p id="city"></p> <br>
		<div class="jsnCall">output json</div>
		<br>
		<p id="test"></p>
		<p id="numbers"></p>
		<div id="div1">

		</div>


		<script>

		</script>
	</body>
</html>
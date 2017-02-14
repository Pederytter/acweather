

<!DOCTYPE html>
<html lang="da">
	<head>
		<title>AcWeather</title>
		<meta name="description" content="">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/indexstyle.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
	</head>
	<body>
		<header>
			<h1>AC Weather</h1>
		</header>
		<main id="root">
			<form id="weatherform">
				<h1 id="mobillogo" class="showmobil">AC Weather</h1>
				<ul id="progressbar" class="showdesktop">
					<li class="active">Location</li>
					<li>Weather</li>
					<li>Share</li>
				</ul>

				<fieldset>
					<h2>Choose Location</h2>
					<div class="fieldsetwrapper">
						<input v-model="city" @keyup="getLocationKeyUp" type="text" name="location" placeholder="">
						<h3><span>{{city}}</span>: <span>{{degree}}</span></h3>
						<button type="button" v-on:click="getLocation" class="action-button">Get my location</button> 
					</div>

					<button type="button" name="next" class="next action-button">Next</button>
				</fieldset>
				<fieldset>
					<h2>Weather Options</h2>
					<div class="fieldsetwrapper">
						<label>
							<input type="radio" name="radio" value="1" />
							<img @click="sunny" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
						</label>
						<label>
							<input type="radio" name="radio" value="2" />
							<img @click="cold" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
						</label>
						<label>
							<input type="radio" name="radio" value="3" />
							<img src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
						</label>
						<label>
							<input type="radio" name="radio" value="4" />
							<img src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
						</label>
						<canvas height="200px" width="1000px" id="myChart"></canvas>
					</div>
					<input type="button" name="previous" class="previous action-button" value="Previous" />

					<input type="button" name="next" class="next action-button" value="Next" />
				</fieldset>
				<fieldset>
					<h2>Share Link</h2>
					<div class="fieldsetwrapper">

					</div>
					<input type="button" name="previous" class="previous action-button" value="Previous" />
				</fieldset>

			</form>

		</main>

		<footer></footer>

		<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
		<script type="text/javascript" src="js/vue.js"></script>
		<script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>

		<script type="text/javascript">

			var vue = new Vue({
				el: "#root",
				data: { 
					city: "Select City",
					degree: "",
					graphDegree:"",
					weatherArray: [],
					i: "",
					ii: "",
					standardValue: 0.2,
                    oneDay: "",
				},
				methods: {
					getLocation: function(){
						this.$http.get('/git/acweather/fetchLocation.php').then(function(cityName){
							this.city = cityName.data[0];
							this.degree = cityName.data[1];
						});
					},
					getLocationKeyUp: function() {
						this.$http.get('/git/acweather/getLocationKeyUp.php?city='+this.city).then(function(cityTemp){
							this.degree = cityTemp.data[0];
						});   
					},
					sunny: function(){
						this.graphDegree = this.degree;
						for (this.i = 0; this.i < 56; this.i++){
							var d = 0.4;
							this.standardValue = this.standardValue + 0.05;
							this.ii++;
							var timeDay = this.ii%8;
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
							
							this.graphDegree = d * this.standardValue +  this.graphDegree + dayRange;	
							this.weatherArray.push(this.graphDegree);	
							console.log(this.i);		
							this.graphDegree =  this.graphDegree - dayRange;	

						}
						this.weatherGraph();
						this.weatherArray = [];
						this.standardValue = 0.2;
						this.graphDegree = this.degree;
					},

					cold: function(){
						this.graphDegree = this.degree;
						for (this.i = 0; this.i < 56; this.i++){
							var d = 0.4;
							this.standardValue = this.standardValue - 0.05;
							this.ii++;
							var timeDay = this.ii%8;
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
							
							this.graphDegree = d * this.standardValue +  this.graphDegree + dayRange;	
							this.weatherArray.push(this.graphDegree);	
							console.log(this.i);		
							this.graphDegree =  this.graphDegree - dayRange;	

						}
						this.weatherGraph();
						this.weatherArray = [];
						this.standardValue = 0.2;
						this.graphDegree = this.degree;
					},

					weatherGraph: function() {
						console.log(this.weatherArray);
                        this.oneDay = this.weatherArray.slice(0, 9);
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
								labels: ['0:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00'],
								yLabels: ['-5', '0', '5'],					
								datasets: [{
									label: 'temperatur',
									data: this.oneDay,
									backgroundColor: "rgba(255, 204, 0, 0.2)",
									borderColor: "rgb(255, 204, 0)",
									hoverBackgroundColor: "rgb(255, 204, 0)",
								}]
							}
						})
						this.weatherArray = [];
						}

				},

				mounted: function(){
					this.$http.get('/git/acweather/fetchLocation.php').then(function(cityName){
						this.city = cityName.data[0];
						this.degree = cityName.data[1];
					});
				},
			});
		</script>
		<script type="text/javascript" src="js/formscript.js"></script>
	</body>
</html>
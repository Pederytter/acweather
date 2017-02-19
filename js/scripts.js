var vue = new Vue({
	el: "#root",
	data: { 
		city: "",
		degree: " ",
		graphDegree:"",
		humidity: "",
		wind: "",
		weatherDescrip: "",
		weatherArray: [],
		i: "",
		ii: "",
		standardValue: 0.2,
		oneDay: "",
		option: "",
		currentDay: "",
		activeId: null,
		fakeUrl: "",
	},
	methods: {
		getFakeUrl: function (){
			this.$http.get('/mdu/acweather2/acweather/process.php?city='+this.city+'&option='+this.option).then(function(cityName){
				this.fakeUrl = cityName.data;
			});			
		},
		getLocation: function(){
			this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=2').then(function(cityName){
				this.city = cityName.data.name;
				this.degree = Math.round(cityName.data.main.temp);
			});
		},
		getLocationKeyUp: function() {
			this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=1&city='+this.city).then(function(cityTemp){
				this.degree = cityTemp.data.main.temp;
			});   
		},
		sunny: function(){
			this.option = 1;
			this.graphDegree = this.degree;
			$('.allDays').css('display', 'block');
			this.weatherArray = [];
			for (this.i = 0; this.i < 64; this.i++){
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
				this.graphDegree = parseFloat(this.graphDegree);
				this.graphDegree = this.graphDegree.toFixed(2);
				this.weatherArray.push(this.graphDegree);	
				//console.log(this.graphDegree);		
				this.graphDegree =  this.graphDegree - dayRange;	
			}
			this.dayOne();
			this.standardValue = 0.2;
			this.graphDegree = this.degree;
			this.activeLink('link-1');
		},
		cold: function(){
			this.option = 2;
			this.graphDegree = this.degree;
			$('.allDays').css('display', 'block');
			this.weatherArray = [];
			for (this.i = 0; this.i < 64; this.i++){
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
				this.graphDegree = parseFloat(this.graphDegree).toFixed(1);
				this.weatherArray.push(this.graphDegree);		
				this.graphDegree =  this.graphDegree - dayRange;	
			}
			this.dayOne();
			this.standardValue = 0.2;
			this.graphDegree = this.degree;
			this.activeLink('link-1');
		},
		dayOne: function(){
			this.oneDay = this.weatherArray.slice(0, 9);
			this.weatherGraph();

		},
		dayTwo: function(){
			this.oneDay = this.weatherArray.slice(9, 18);
			this.weatherGraph();
		},
		dayThree: function(){
			this.oneDay = this.weatherArray.slice(18, 27);
			this.weatherGraph();
		},
		dayFour: function(){
			this.oneDay = this.weatherArray.slice(27, 36);
			this.weatherGraph();
		},
		dayFive: function(){
			this.oneDay = this.weatherArray.slice(36, 45);
			this.weatherGraph();
		},
		daySix: function(){
			this.oneDay = this.weatherArray.slice(45, 54);
			this.weatherGraph();
		},
		daySeven: function(){
			this.oneDay = this.weatherArray.slice(54, 63);
			this.weatherGraph();
		},
		weatherGraph: function() {
			var ctx = $('#myChart').get(0).getContext('2d');
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
					tooltips: {
						enabled: false,
					}
				},
				data: {
					labels: ['0:00', '03:00', '06:00', '09:00','12:00', '15:00', '18:00', '21:00', '24:00'],
					yLabels: ['-5', '0', '5'],
					datasets: [{
						label: 'temperatur',
						data: this.oneDay,
						backgroundColor: "rgba(255, 204, 0, 0.2)",
						borderColor: "rgb(255, 204, 0)",
						pointColor: "rgba(220,220,220,1)",
						pointStrokeColor: "#fff",
						pointHighlightFill: "#fff",
						pointHighlightStroke: "rgba(220,220,220,1)",
						hoverBackgroundColor: "rgb(255, 204, 0)",
					}]
				}
			})
			},

		activeLink(linkIdent) {
			//console.log(linkIdent);
			if(linkIdent != this.activeId){
			this.activeId = this.activeId === linkIdent ? null : linkIdent
			}
		},
	},
	mounted: function(){
		console.log(this.city);
		// this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=2&city='+this.city).then(function(cityName){
		// 	this.city = cityName.data.name;
		// 	this.degree = Math.round(cityName.data.main.temp);
		// 	this.graphDegree = Math.round(cityName.data.main.temp)
		// 	this.wind = cityName.data.wind.speed;
		// 	this.humidity = cityName.data.main.humidity;
		// 	this.weatherDescrip = cityName.data.weather[0].description;
		// });
		this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=1&city='+this.city).then(function(cityName){
			//this.degree = Math.round(cityName.data.main.temp);
			this.degree = cityName.data.main.temp;
			this.graphDegree = Math.round(cityName.data.main.temp)
			this.wind = cityName.data.wind.speed;
			this.humidity = cityName.data.main.humidity;
			this.weatherDescrip = cityName.data.weather[0].description;
			console.log(this.city+" mounted "+this.degree);
		});
	},
});
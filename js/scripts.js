var vue = new Vue({
    el: "#root",
    data: { 
        city: "viby",
        degree: "",
        graphDegree:"",
        humidity: "",
        wind: "",
        weatherDescrip: "",
        weatherArray: [],
        i: "",
        ii: "",
        standardValue: 0.2,
        oneDay: "",
        option: "1",
    },
    methods: {
        getLocation: function(){
            this.$http.get('/mdu/acweather/processLocation.php?action=2').then(function(cityName){
                this.city = cityName.data.name;
                this.degree = Math.round(cityName.data.main.temp);
            });
        },
        getLocationKeyUp: function() {
            this.$http.get('/mdu/acweather/processLocation.php?action=1&city='+this.city).then(function(cityTemp){
                this.degree = cityTemp.data.main.temp;
            });   
        },
        sunny: function(){
            this.graphDegree = this.degree;
            this.weatherArray = [];
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
            this.standardValue = 0.2;
            this.graphDegree = this.degree;
        },
        cold: function(){
            this.graphDegree = this.degree;
            this.weatherArray = [];
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
            this.standardValue = 0.2;
            this.graphDegree = this.degree;
        },

        sunnyDayOne: function(){
            this.oneDay = this.weatherArray.slice(0, 9);
            this.weatherGraph();

        },
        sunnyDayTwo: function(){
            this.oneDay = this.weatherArray.slice(9, 18);
            this.weatherGraph();
        },
        sunnyDayThree: function(){
            this.oneDay = this.weatherArray.slice(18, 27);
            this.weatherGraph();
        },
        sunnyDayFour: function(){
            this.oneDay = this.weatherArray.slice(27, 36);
            this.weatherGraph();
        },
        weatherGraph: function() {
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
            }
    },
    mounted: function(){
            this.$http.get('/mdu/acweather/processLocation.php?action=2&city='+this.city).then(function(cityName){
                this.city = cityName.data.name;
                this.degree = Math.round(cityName.data.main.temp);
                this.graphDegree = Math.round(cityName.data.main.temp)
                this.wind = cityName.data.wind.speed;
                this.humidity = cityName.data.main.humidity;
                this.weatherDescrip = cityName.data.weather[0].description;
            });
            if(this.option == 1) {
                this.sunny();
            }
    },
});
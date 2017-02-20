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
        daysSorted: [],
        activeId: null,
        fakeUrl: "",
        facebookLink: "",
        days: ['sat', 'sun', 'mon', 'tue', 'wed', 'thu', 'fri'],
		weatherImage: '',
        
    },
    methods: {
        onStart: function(){ //Function call on start for indexGoogle.php. 
            this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=1&city='+this.city).then(function(cityName){ //Makes AJAX call
                this.city = cityName.data.name; //Gets cityname from API in php AJAX
                this.degree = Math.round(cityName.data.main.temp); //Gets temperature from API in php AJAX
                this.graphDegree = Math.round(cityName.data.main.temp) //Gets temperature from API in php AJAX
                this.wind = cityName.data.wind.speed; //Gets windspeed from API in php AJAX
                this.humidity = cityName.data.main.humidity; //Gets humidity from API in php AJAX
                this.weatherDescrip = cityName.data.weather[0].description; //Gets description from API in php AJAX
            });
        },
        onStartIp: function(){ //Function call on start for index.php. 
            this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=2&city='+this.city).then(function(cityName){//Makes AJAX call
                this.city = cityName.data.name; //Gets cityname from API in php AJAX
                this.degree = Math.round(cityName.data.main.temp); //Gets temperature from API in php AJAX
                this.graphDegree = Math.round(cityName.data.main.temp) //Gets temperature from API in php AJAX
                this.wind = cityName.data.wind.speed; //Gets windspeed from API in php AJAX
                this.humidity = cityName.data.main.humidity; //Gets humidity from API in php AJAX
                this.weatherDescrip = cityName.data.weather[0].description; //Gets description from API in php AJAX
            });
        },
        getFakeUrl: function (){
            this.$http.get('/mdu/acweather2/acweather/process.php?city='+this.city+'&option='+this.option).then(function(data){//Makes AJAX call
                this.city = cityName.data.name; //Gets cityname from API in php AJAX
                this.fakeUrl = data.data; //Gets all data from API in php AJAX
                this.facebookLink = "https://www.facebook.com/sharer/sharer.php?u=" + data.data; //Creates a facebook URL for sharin
            });			
        },
        getLocation: function(){
            if($('#citydegreebutton').hasClass('enterKeyPressed')){
                $('#citydegreebutton').removeClass('enterKeyPressed');
            } else {
                this.$http.get('/mdu/acweather/processLocation.php?action=2').then(function(cityName){
                    this.city = cityName.data.name; //Gets cityname from API in php AJAX
                    this.degree = Math.round(cityName.data.main.temp); //Gets temperature rounded to the nearst number from API in php AJAX
                });
            }
        },
        getLocationKeyUp: function() {
            this.$http.get('/mdu/acweather2/acweather/processLocation.php?action=1&city='+this.city).then(function(cityTemp){
                this.degree = cityTemp.data.main.temp; //Gets temperature from API in php AJAX
            });   
        },
        sunny: function(){ //Function for warm weather
            this.option = 1;
            this.graphDegree = this.degree;
            $('.allDays').css('display', 'block');
            this.weatherArray = [];
            for (this.i = 0; this.i < 64; this.i++){ //Math for weathergraph
                var d = 0.4;
                this.standardValue = this.standardValue + 0.05;
                this.ii++;
                var timeDay = this.ii%9;
                switch(timeDay){  //Gives the weather graph a day / night temperature
                    case 0:
                        var dayRange = 0;
                        break;
                    case 1:
                        var dayRange = 0.7;
                        break;
                    case 2:
                        var dayRange = 1.5;
                        break;
                    case 3:
                        var dayRange = 1.9;
                        break;
                    case 4:
                        var dayRange = 2.3;
                        break;
                    case 5:
                        var dayRange = 2.1;
                        break;
                    case 6:
                        var dayRange = 1.5;
                        break;
                    case 7:
                        var dayRange = 0.7;
                        break;
                    case 8:
                        var dayRange = 0.2;
                        break;
                }
                this.graphDegree = d * this.standardValue +  this.graphDegree + dayRange;	
                this.graphDegree = parseFloat(this.graphDegree);
                this.graphDegree = this.graphDegree.toFixed(1);
                this.weatherArray.push(this.graphDegree);	
                //console.log(this.graphDegree);		
                this.graphDegree =  this.graphDegree - dayRange;	
            }
            this.dayOne();
            this.dayName();
            this.standardValue = 0.2;
			this.ii = 0;
            this.graphDegree = this.degree;
            this.activeLink('link-1');
			this.weatherImages('images/sunny.png');
        },
        cold: function(){ //Function for cold weather
            this.option = 2;
            this.graphDegree = this.degree;
            $('.allDays').css('display', 'block');
            this.weatherArray = [];
            for (this.i = 0; this.i < 64; this.i++){ //Math for weathergraph
                var d = 0.4;
                this.standardValue = this.standardValue - 0.05;
                this.ii++;
                var timeDay = this.ii%9;
                switch(timeDay){   //Gives the weather graph a day / night temperature
                    case 0:
                        var dayRange = 0;
                        break;
                    case 1:
                        var dayRange = 0.7;
                        break;
                    case 2:
                        var dayRange = 1.5;
                        break;
                    case 3:
                        var dayRange = 1.9;
                        break;
                    case 4:
                        var dayRange = 2.3;
                        break;
                    case 5:
                        var dayRange = 2.1;
                        break;
                    case 6:
                        var dayRange = 1.5;
                        break;
                    case 7:
                        var dayRange = 0.7;
                        break;
                    case 8:
                        var dayRange = 0.2;
                        break;
                }
                this.graphDegree = d * this.standardValue +  this.graphDegree + dayRange;
                this.graphDegree = parseFloat(this.graphDegree).toFixed(1);
                this.weatherArray.push(this.graphDegree);		
                this.graphDegree =  this.graphDegree - dayRange;	
            }
            this.dayOne();
            this.dayName();
            this.standardValue = 0.2;
			this.ii = 0;
            this.graphDegree = this.degree;
            this.activeLink('link-1');
			this.weatherImages('images/snow_light.png');
        },
        dayOne: function(){ //slices the weatherArray into showing only day one
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
        dayName: function(){ //Names the next 7 days from the current day
            var today = new Date();
            var daysSorted = [];

            for(var i = 0; i < 7; i++)
            {
                var newDate = new Date(today.setDate(today.getDate() + 1));
                this.daysSorted.push(this.days[newDate.getDay()]);
            }

        },
		weatherImages: function(imagePath){ //changes the path for weather day images
			this.weatherImage = imagePath;
		},
        weatherGraph: function() {  //Chartjs code (Renders the graph)
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
});
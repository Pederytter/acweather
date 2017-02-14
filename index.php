

<!DOCTYPE html>
<html lang="da">
    <head>
        <title>AcWeather</title>
        <meta name="description" content="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    </head>
    <body>
        <header>
            <h1>AC Weather</h1>
        </header>
        <main id="root">
            <form id="weatherform">
                <ul id="progressbar">
                    <li class="active">Location</li>
                    <li>Weather</li>
                    <li>Share</li>
                </ul>

                <fieldset>
                    <h2>Choose Location</h2>
                    <div class="fieldsetwrapper">
                        <input v-model="city" @keyup="getLocationKeyUp" type="text" name="location" placeholder="">
                        <h3><span>{{city}}</span>: <span>{{degree}}</span></h3>
                        <button type="button" v-on:click="getLocation">Get my location</button> 
                    </div>

                    <button type="button" name="next" class="next action-button">Next</button>
                </fieldset>
                <fieldset>
                    <h2>Weather Options</h2>
                    <div class="fieldsetwrapper">
                        
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
                },
                methods: {
                    getLocation: function(){
                        this.$http.get('/mdu/acweather/fetchLocation.php').then(function(cityName){
                        this.city = cityName.data[0];
                        this.degree = cityName.data[1];
                        });
                    },
                    getLocationKeyUp: function() {
                        this.$http.post('/mdu/acweather/getLocationKeyUp.php?city='+this.city).then(function(cityTemp){
                            this.degree = cityTemp.data[0];
                        });                        
                    }
                },
                mounted: function(){
                        this.$http.get('/mdu/acweather/fetchLocation.php').then(function(cityName){
                        this.city = cityName.data[0];
                        this.degree = cityName.data[1];
                        });
                },
            });
        </script>
                <script type="text/javascript" src="js/formscript.js"></script>
    </body>
</html>


<!DOCTYPE html>
<html lang="da">
    <head>
        <title>AcWeather</title>
        <meta name="description" content="">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


        <link rel="stylesheet" type="text/css" href="css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="css/component.css" />
        <script src="js/modernizr.custom.js"></script>
    </head>
    <body>
        <div class="container">
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
                            <input v-model="city" @keyup="getLocationKeyUp" type="text" name="location" placeholder="" id="cityinput" autocomplete="off">
                            <section id="citydegree">
                                <h3 id="citydegreeh3"><span id="selectcitytjek">{{city}}</span>: <span>{{degree}}°</span></h3>
                                
                    
                                <button id="citydegreebutton" type="button" class="progress-button" data-style="fill" data-horizontal v-on:click="getLocation">Current Location</button>
                            </section>
                        </div>

                        <button type="button" name="next" class="next action-button">Next</button>
                    </fieldset>
                    <fieldset>
                        <h2>Weather Options</h2>
                        <div class="fieldsetwrapper">
                            <label>
                                <input type="radio" name="radio" value="1" />
                                <img src="images/1.jpg">
                            </label>
                            <label>
                                <input type="radio" name="radio" value="2" />
                                <img src="images/2.jpg">
                            </label>
                            <label>
                                <input type="radio" name="radio" value="3" />
                                <img src="images/3.jpg">
                            </label>
                            <label>
                                <input type="radio" name="radio" value="4" />
                                <img src="images/4.jpg">
                            </label>
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
            <script src="js/classie.js"></script>
            <script src="js/progressButton.js"></script>
            <script src="js/loaded.js"></script>
            <script>
                [].slice.call( document.querySelectorAll( 'button.progress-button' ) ).forEach( function( bttn ) {
                    new ProgressButton( bttn, {
                        callback : function( instance ) {
                            var progress = 0,
                                interval = setInterval( function() {
                                    progress = Math.min( progress + Math.random() * 0.1, 1 );
                                    instance._setProgress( progress );

                                    if( progress === 1 ) {
                                        instance._stop(1);
                                        clearInterval( interval );
                                    }
                                }, 130 );
                        }
                    } );
                } );
            </script>
        </div>
    </body>
</html>
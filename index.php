

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
    <script>
            $(document).ready(function(){
                $("input").keyup(function(){
                    var city = $("input").val();
                    var city = city.toString();
                    var apiFirst = 'http://api.openweathermap.org/data/2.5/weather?q=' + city + ',dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric';
                    $.getJSON(apiFirst, function(data){
                        console.log(data);
                        var test = data.main.temp;
                        $('#test').html(test);
                        $.each(data,function(key,val){
                            if(json_object.hasOwnProperty('main')){
                                alert(test);
                            };
                        });
                    });
                }).keyup();

            });
        </script>
        <main id="root">


        <div id="demo"></div>
            <form id="weatherform">
                <ul id="progressbar">
                    <li class="active">Location</li>
                    <li>Weather</li>
                    <li>Share</li>
                </ul>

                <fieldset>
                    <h2>Choose Location</h2>
                    <div class="fieldsetwrapper">
                        <input v-model="city" type="text" name="location" placeholder="">
                        <h3><span>{{city}}</span>: <span id="test"></span></h3>
                        <p id="city"></p>
                        <button type="button" @click="getLocation">Get my location</button>
                        {{city}}
                        
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
        <script type="text/javascript" src="js/formscript.js"></script>
        <script type="text/javascript" src="js/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>

        <script type="text/javascript">
            var vue = new Vue({
                el: "#root",
                data: {
                    city: "No city chosen",
                },
                methods: {
                    getLocation: function(){
                        $.ajax({
                            url: "getLocation.php",
                            success: function(data) {
                                // var successmessage = "Hey!";
                                this.city = data;
                                //$('#city').html(data);
                            },
                            error: function(data) {
                                successmessage = 'Error';
                                $("#city").text(successmessage);
                            },
                        });
                    },
                },
            });
        </script>

        <script type="text/javascript">

            // $(document).ready(function{
            //         var city = $("input").val();
            //         var city = city.toString();
            //         var apiFirst = 'http://api.openweathermap.org/data/2.5/weather?q=' + city + ',dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric';
            //         $.getJSON(apiFirst, function(data){
            //             console.log(data);
            //             var test = data.main.temp;
            //             $('#test').html(test);
            //             $.each(data,function(key,val){
            //                 if(json_object.hasOwnProperty('main')){
            //                     alert(test);
            //                 };
            //             });
            //         });

            //     $('#getLocation').click(function{

            //     });
            // });

        </script>
    </body>
</html>
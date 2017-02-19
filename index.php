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
							<section id="weatherOpt">
								<label>
									<input type="radio" name="radio" value="1" />
									<img class="weatherOption" @click="sunny" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
								</label>
								<label>
									<input type="radio" name="radio" value="2" />
									<img class="weatherOption" @click="cold" src="images/snow-icon-5.png">
								</label>
							</section>
							<section id="weatherPreview">
							<canvas height="200px" width="750px" id="myChart"></canvas>
							<section class="allDays">
								<div class="day" :class="{ active: activeId == 'link-1' }" @click.prevent="activeLink('link-1')" @click="dayOne">
									<p>{{currentDay}}</p>
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[0]}}°</span>
										<span class="dayTempMin">{{weatherArray[8]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-2' }" @click.prevent="activeLink('link-2')" @click="dayTwo">
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[9]}}°</span>
										<span class="dayTempMin">{{weatherArray[16]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-3' }" @click.prevent="activeLink('link-3')" @click="dayThree">
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[17]}}°</span>
										<span class="dayTempMin">{{weatherArray[24]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-4' }" @click.prevent="activeLink('link-4')" @click="dayFour">
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[25]}}°</span>
										<span class="dayTempMin">{{weatherArray[32]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-5' }" @click.prevent="activeLink('link-5')" @click="dayFive">
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[33]}}°</span>
										<span class="dayTempMin">{{weatherArray[40]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-6' }" @click.prevent="activeLink('link-6')" @click="daySix">
									<img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[41]}}°</span>
										<span class="dayTempMin">{{weatherArray[48]}}°</span>
									</div>
								</div>
								<div class="day" :class="{ active: activeId == 'link-7' }" @click.prevent="activeLink('link-7')" @click="daySeven">
									<img class="weatherDay"  src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
									<div class="dayTemp">
										<span class="dayTempMax">{{weatherArray[49]}}</span>
										<span class="dayTempMin">{{weatherArray[56]}}</span>
									</div>
								</div>
							</section>
                       </section>
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

            <script type="text/javascript" src="js/scripts.js"></script>
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
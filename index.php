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
                <img src="images/logodesk.png" id="logodesk" class="hidemobil">
                <h1 class="hidemobil">AC Weather</h1>
            </header>
            <main id="root">
                <form id="weatherform">
                    <div id="logomobilwrapper">
                        <img src="images/logomobil.png" id="logomobil" class="showmobil">
                        <h1 id="mobillogo" class="showmobil">AC Weather</h1>
                    </div>

                    <ul id="progressbar" class="showdesktop">
                        <li class="active">Location</li>
                        <li>Weather</li>
                        <li>Share</li>
                    </ul>

                    <fieldset>
                        <h2>Choose Location</h2>
                        <div class="fieldsetwrapper">
                            <p id="fieldsetp1">Search for a city you want to prank people in.<br> </p>
                            <input v-model="city" @keyup="getLocationKeyUp" type="text" name="location" placeholder="" id="cityinput" autocomplete="off">
                            <section id="citydegree">
                                <h3 id="citydegreeh3"><span id="selectcitytjek">{{city}}</span>: <span>{{degree}}°</span></h3>
                                <button id="citydegreebutton" type="button" class="progress-button" data-style="fill" data-horizontal v-on:click="getLocation">Current Location</button>
                            </section>
                        </div>
                        <button type="button" name="next" class="next action-button" id="fieldset1button">Next</button>
                    </fieldset>
                    <fieldset>
                        <h2>Weather Options</h2>
                        <div class="fieldsetwrapper">
                            <p>Choose whether you want to have heatweave or extreme cold. Its up to you!</p>
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
                                        <p>{{daysSorted[0]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[0]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[8]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-2' }" @click.prevent="activeLink('link-2')" @click="dayTwo">
                                        <p>{{daysSorted[1]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[9]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[16]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-3' }" @click.prevent="activeLink('link-3')" @click="dayThree">
                                        <p>{{daysSorted[2]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[17]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[24]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-4' }" @click.prevent="activeLink('link-4')" @click="dayFour">
                                        <p>{{daysSorted[3]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[25]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[32]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-5' }" @click.prevent="activeLink('link-5')" @click="dayFive">
                                        <p>{{daysSorted[4]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[33]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[40]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-6' }" @click.prevent="activeLink('link-6')" @click="daySix">
                                        <p>{{daysSorted[5]}}</p>
                                        <img class="weatherDay" src="http://ssl.gstatic.com/onebox/weather/64/sunny.png">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[41]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[48]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-7' }" @click.prevent="activeLink('link-7')" @click="daySeven">
                                        <p>{{daysSorted[6]}}</p>
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
                            <p>Now it's time to share your newly made prank forecast. Choose to either share it on Facebook or get your own link, you can use copy and paste yo your friends! Have fun!</p>
                            <section class="shareSection">
                                <button type="button" @click="getFakeUrl">Get url</button>
                                <h3>Your url:<br> {{fakeUrl}}</h3>
                            </section>
                            <section v-if="fakeUrl != ''" class="shareSection">
                                <p>Share on Facebook</p>
                                <div class="fb-share-button" data-href="<?php $url ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" :href="facebookLink">Share your link</a></div>
                            </section>
                        </div>
                        <input type="button" name="previous" class="previous action-button" value="Previous" />
                    </fieldset>

                </form>

            </main>

            <footer>
                <h3>Copyright © 2017 Malthe Petersen, Peter Rytter and Christian Bonde</h3>
            </footer>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
            <script type="text/javascript" src="js/vue.js"></script>
            <script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>

            <script type="text/javascript" src="js/scripts.js"></script>
            <script type="text/javascript" src="js/formscript.js"></script>
            <script src="js/classie.js"></script>
            <script src="js/progressButton.js"></script>
            <script src="js/loaded.js"></script>

            <script type="text/javascript">
                (function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&version=v2.8&appId=428746910592865";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
                
                vue.onStartIp();
            </script>
        </div>
    </body>
</html>
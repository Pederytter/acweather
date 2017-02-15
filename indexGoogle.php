<?php 
	$ogtitle = "Google Weather";
	$ogurl = "www.Google.dk";
	$ogimage = "images/google.png";
	include "includes/header.php";
	$city = $_GET['city'];
	$option = $_GET['option'];
	$today = date('l H.i');
?>
<script>            
	//window.history.pushState("object or string", "Title", "/www.google.dk/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=weather");
</script>
<div id="fb-root"></div>
<!--<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&version=v2.8&appId=428746910592865";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
	<header>
		<section id="searchForm">
				<img src="images/google.png">
				<form>
					<input type="text" name="search">
						<img src="images/tia.png">
						<img src="images/download.png">
					<a href="">
						<svg focusable="false" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
							<path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
						</svg>
					</a>
				</form>
				<a href="" class="btn login">Log ind</a>
				<nav>
					<ul>
						<li><a href="">Alle</a></li>
						<li><a href="">Billeder</a></li>
						<li><a href="">Maps</a></li>
						<li><a href="">Videoer</a></li>
						<li><a href="">Shopping</a></li>
						<li><a href="">Mere</a></li>
						<li class="divider"></li>
						<li><a href="">Instillinger</a></li>
						<li><a href="">Værktøjer</a></li>
					</ul>
				</nav>
		</section>
	</header>
	<main class="containerSearch" id="root">
		<div class="fb-share-button" data-href="<?php $url ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Del</a></div>
		<section class="status">
			<p>Ca. 1.190.000.000 results (0,44 seconds)</p>
		</section>
		<section class="searchResults">
			<article class="weather"> 	
			<input type="hidden" v-model="city" value="">
				<h4 class="city" ><?php echo ucfirst($city); ?></h4>
				<p><?php echo $today; ?></p>
				<p>{{weatherDescrip}}</p>
				<button type="button" @click="cold">Klik</button>
				<div class="seperator"></div>
				<section class="weatherInfo">
					<div>
						<img src="images/snow_light.png">
						<h5>{{degree}}<span class="super"><span>o</span>C | <span>o</span>F</span></h5>
					</div>
					<article>
						<p>Humidity: <span>{{humidity}}%</span></p>
						<p>Wind: <span>{{wind}} m/s</spawindn></p>
						<section>
							<div>Temperatur</div>
							<div>Nedbør</div>
							<div>Vind</div>
						</section>
					</article>
				</section>
				<div>
			<canvas height="200px" width="600px" id="myChart"></canvas>
				<div style="padding-top: 7px; white-space: nowrap; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px); transition: -webkit-transform 0ms ease-in-out;" id="wob_dp" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQimsIGjAA"><div class="wob_df wob_ds" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="0" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIGygAMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="onsdag">ons.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Snebyger" src="//ssl.gstatic.com/onebox/weather/48/snow_light.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">-2</span><span class="wob_t" style="display:none">29</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-3</span><span class="wob_t" style="display:none">27</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="1" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIHCgBMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="torsdag">tor.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Skyet" src="//ssl.gstatic.com/onebox/weather/48/cloudy.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">-1</span><span class="wob_t" style="display:none">31</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-2</span><span class="wob_t" style="display:none">28</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="2" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIHSgCMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="fredag">fre.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Skyet" src="//ssl.gstatic.com/onebox/weather/48/cloudy.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">1</span><span class="wob_t" style="display:none">33</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-2</span><span class="wob_t" style="display:none">28</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="3" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIHigDMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="lørdag">lør.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Mest skyet" src="//ssl.gstatic.com/onebox/weather/48/partly_cloudy.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">1</span><span class="wob_t" style="display:none">33</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-2</span><span class="wob_t" style="display:none">28</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="4" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIHygEMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="søndag">søn.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Skyet" src="//ssl.gstatic.com/onebox/weather/48/cloudy.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">0</span><span class="wob_t" style="display:none">32</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-3</span><span class="wob_t" style="display:none">27</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="5" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIICgFMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="mandag">man.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Pletvist overskyet" src="//ssl.gstatic.com/onebox/weather/48/partly_cloudy.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">0</span><span class="wob_t" style="display:none">32</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-3</span><span class="wob_t" style="display:none">27</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="6" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIISgGMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="tirsdag">tir.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Solskin" src="//ssl.gstatic.com/onebox/weather/48/sunny.png" ></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">3</span><span class="wob_t" style="display:none">37</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-3</span><span class="wob_t" style="display:none">26</span>°</div></div></div><div class="wob_df" style="display:inline-block;line-height:1;text-align:center;-webkit-transition-duration:200ms,200ms,200ms;-webkit-transition-property:background-image,border,font-weight;font-weight:13px;height:90px;width:73px" wob_di="7" data-ved="0ahUKEwjXhMr1-oDSAhXCzxQKHWbQAHoQi2sIIigHMAA"><div class="vk_lgy" style="padding-top:7px;line-height:15px" aria-label="onsdag">ons.</div><div style="display:inline-block"><img style="margin:1px 4px 0;height:48px;width:48px" alt="Overvejende solskin" src="//ssl.gstatic.com/onebox/weather/48/partly_cloudy.png"></div><div style="font-weight:normal;line-height:15px;font-size:13px"><div class="vk_gy" style="display:inline-block;padding-right:5px"><span class="wob_t" style="display:inline">3</span><span class="wob_t" style="display:none">37</span>°</div><div class="vk_lgy" style="display:inline-block"><span class="wob_t" style="display:inline">-2</span><span class="wob_t" style="display:none">28</span>°</div></div></div></div>
			</article>
			<article class="searchResult">
				<h3><a href="">National and Local Weather Forecast, Hurricane, Radar and Report</a></h3>
				<cite>https://weather.com/</cite>
				<p>The Weather Channel and weather.com provide a national and local weather forecast for cities, as well as weather radar, report and hurricane coverage.</p>
			</article>
			<article class="searchResult">
				<h3><a href="">National and Local Weather Forecast, Hurricane, Radar and Report</a></h3>
				<cite>https://weather.com/</cite>
				<p>The Weather Channel and weather.com provide a national and local weather forecast for cities, as well as weather radar, report and hurricane coverage.</p>
			</article>
			<article class="searchResult">
				<h3><a href="">National and Local Weather Forecast, Hurricane, Radar and Report</a></h3>
				<cite>https://weather.com/</cite>
				<p>The Weather Channel and weather.com provide a national and local weather forecast for cities, as well as weather radar, report and hurricane coverage.</p>
			</article>
		</section>
	</main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

		<script type="text/javascript" src="js/vue.js"></script>
		<script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>

		<script type="text/javascript">
			var vue = new Vue({
				el: "#root",
				data: { 
					city: "",
					degree: "",
					humidity: "",
					wind: "",
					weatherDescrip: "",
					graphDegree:"",
					weatherArray: [],
					i: "",
					ii: "",
					standardValue: 0.2,
				},

				methods: {
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
					this.weatherGraph();
					this.weatherArray = [];
						this.standardValue = 0.2;
					this.$http.get('/mdu/acweather/fetchLocationGoogle.php?city='+this.city).then(function(cityName){
						this.degree = Math.round(cityName.data.main.temp);
						this.graphDegree = Math.round(cityName.data.main.temp)
						this.wind = cityName.data.wind.speed;
						this.humidity = cityName.data.main.humidity;
						this.weatherDescrip = cityName.data.weather[0].description;
					});
				},
			});
		</script>
<?php 
	include "includes/footer.php";
?>

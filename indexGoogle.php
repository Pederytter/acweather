<?php 
	$ogtitle = "Google Weather";
	$ogurl = "www.Google.dk";
	$ogimage = "images/google.png";
	include "includes/header.php";
	$city = $_GET['city'];
	$option = $_GET['option'];
	$today = date('l H.i');
	include 'articles.php';
?>
<script>            
	//window.history.pushState("object or string", "Title", "/www.google.dk/webhp?sourceid=chrome-instant&ion=1&espv=2&ie=UTF-8#q=weather");
</script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/da_DK/sdk.js#xfbml=1&version=v2.8&appId=428746910592865";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<header>
		<section id="searchForm">
				<img src="images/google.png">
				<form>
					<input type="text" name="search" value="weather">
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
<!-- 			<input type="hidden" v-model="city" value="<?php echo $city; ?>">
			<input type="hidden" v-model="option" value="<?php echo $option; ?>"> -->
		<div class="fb-share-button" data-href="<?php $url ?>" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Del</a></div>
		<section class="status">
			<p>Ca. 1.190.000.000 results (0,44 seconds) {{city}}{{option}}</p>
		</section>
		<section class="searchResults">
			<article class="weather"> 	
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
			<?php
			if($option == 1){
				for ($row = 0; $row < 7; $row++) {
					echo '<article class="searchResult">
					<h3><a href="">' . $articlesSunny[$row]['title'] . '</a></h3>
					<cite>' . $articlesSunny[$row]['url'] . '</cite>
					<p>' . $articlesSunny[$row]['description'] . '</p>
				</article>'; 
				}
			} else {
				for ($row = 0; $row < 7; $row++) {
					echo '<article class="searchResult">
					<h3><a href="">' . $articlesCold[$row]['title'] . '</a></h3>
					<cite>' . $articlesCold[$row]['url'] . '</cite>
						<p>' . $articlesCold[$row]['description'] . '</p>
					</article>'; 
				}
			}
			
			?>


		</section>
	</main>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/vue.js"></script>
		<script src="https://cdn.jsdelivr.net/vue.resource/1.2.0/vue-resource.min.js"></script>
		<script type="text/javascript" src="js/scripts.js"></script>

<?php 
	// include "includes/footer.php";
?>

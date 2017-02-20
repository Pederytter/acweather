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

		<section class="status">
			<p>Ca. 1.190.000.000 results (0,44 seconds) {{city}}{{option}}</p>
		</section>
		<section class="searchResults">
			<article class="weather"> 	
				<h4 class="city" ><?php echo ucfirst($city); ?></h4>
				<p><?php echo $today; ?></p>
				<p>{{weatherDescrip}}</p>
				<div class="seperator"></div>
				<section class="weatherInfo">
					<div>
						<img v-bind:src='weatherImage'>
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
                            <section id="weatherPreview">
                                <canvas height="200px" width="750px" id="myChart"></canvas>
                                <section class="allDays">
                                    <div class="day" :class="{ active: activeId == 'link-1' }" @click.prevent="activeLink('link-1')" @click="dayOne">
                                        <p>{{daysSorted[0]}}</p>
                                        <img v-bind:src='weatherImage' class="weatherDay">
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[0]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[8]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-2' }" @click.prevent="activeLink('link-2')" @click="dayTwo">
                                        <p>{{daysSorted[1]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[9]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[16]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-3' }" @click.prevent="activeLink('link-3')" @click="dayThree">
                                        <p>{{daysSorted[2]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[17]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[24]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-4' }" @click.prevent="activeLink('link-4')" @click="dayFour">
                                        <p>{{daysSorted[3]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[25]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[32]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-5' }" @click.prevent="activeLink('link-5')" @click="dayFive">
                                        <p>{{daysSorted[4]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[33]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[40]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-6' }" @click.prevent="activeLink('link-6')" @click="daySix">
                                        <p>{{daysSorted[5]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[41]}}°</span>
                                            <span class="dayTempMin">{{weatherArray[48]}}°</span>
                                        </div>
                                    </div>
                                    <div class="day" :class="{ active: activeId == 'link-7' }" @click.prevent="activeLink('link-7')" @click="daySeven">
                                        <p>{{daysSorted[6]}}</p>
                                        <img class="weatherDay" v-bind:src='weatherImage'>
                                        <div class="dayTemp">
                                            <span class="dayTempMax">{{weatherArray[49]}}</span>
                                            <span class="dayTempMin">{{weatherArray[56]}}</span>
                                        </div>
                                    </div>
                                </section>
                            </section>
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
		<script type="text/javascript">
			vue.city = "<?php echo $_GET['city']; ?>";
			var option = "<?php echo $option; ?>";
			vue.onStart();
			if(option == 2) {
				vue.cold();
			} else if(option == 1){
				vue.sunny();
			}
		</script>

<?php 
	 include "includes/footer.php";
?>

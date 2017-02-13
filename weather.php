<html>
	<head>
		<meta charset="UTF-8">
		<title>Document</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){


				$( "input" ).keyup(function() {
					var city = $( this ).val();
					$( "#city" ).text( city );
				}).keyup();


				$("input").keyup(function(){
					var city = $( "input" ).val();
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
	</head>
	<body>
	<?php
	$ip = $_SERVER('REMOTE_ADDR');

		$record = geoip_record_by_name();
		if ($record) {
		    print_r($record);
		}
	?>
		<input type="text" value="Ingen by"> <br>
		<p id="city"></p> <br>
		<div class="jsnCall">output json</div>
		<br>
		<p id="test"></p>
	</body>
</html>
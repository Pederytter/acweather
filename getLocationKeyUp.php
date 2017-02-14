<?php
	$cityName = $_GET['city'];
	$apiFirst = 'http://api.openweathermap.org/data/2.5/weather?q='.$cityName.',dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric';
	$jsonCityName = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$cityName},dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric");
	$decoded = json_decode($jsonCityName);
	$array = [$decoded->main->temp];
	$array = json_encode($array);
	echo $array;
?>

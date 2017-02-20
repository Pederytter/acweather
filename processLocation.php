<?php
if($_GET['action'] == 1) { //Check whether its action 1 or 2 to make
	$cityName = $_GET['city']; //Get city from URL
	$cityDetails = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$cityName},dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric"); //Get data from API
	$cityDetails = json_decode($cityDetails); //Decode string
    $cityDetails = json_encode($cityDetails); //Encode string to JSON
	echo $cityDetails; //Returns all details in JSON string
}
else if($_GET['action'] == 2) { //Check whether its action 1 or 2 to make
    $ip = $_SERVER['REMOTE_ADDR']; //Get IP address from server
    $ipDetails = json_decode(file_get_contents("http://ip-api.com/json/{$ip}")); //Get IP details from API
    $cityName = $ipDetails->city; //Get cityname from API
    $cityDetails = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$cityName},dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric"); //Get data from API
    $cityDetails = json_decode($cityDetails); //Decode string
    $cityDetails = json_encode($cityDetails); //Encode string to JSON
    echo $cityDetails; //Returns all details in JSON string
}
?>
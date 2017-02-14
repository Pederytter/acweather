<?php
	$cityIp = $_GET['city'];
    //$ip = '195.254.169.71'; //$_SERVER['REMOTE_ADDR'];

    $cityDetails = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$cityIp},dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric");
    $cityDetails = json_decode($cityDetails);
    $array = [$cityDetails->main->temp, $cityDetails->wind->speed, $cityDetails->main->humidity, $cityDetails->weather->description];
    $array = json_encode($array);
    echo $array;
   
?>

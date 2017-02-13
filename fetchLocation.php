<?php
    $ip = '195.254.169.71'; //$_SERVER['REMOTE_ADDR'];
    $ipDetails = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
    $cityIp = $ipDetails->city;
    $cityDetails = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q={$cityIp},dk&appid=9e24f0bb5893a49bb7e40a9bf368bc7c&units=metric");
    $cityDetails = json_decode($cityDetails);
    $array = [$cityIp, $cityDetails->main->temp];
    $array = json_encode($array);
    // print_r($cityDetails);
    // echo $cityDetails->main->temp;
    // print_r($array);
     echo $array;
?>

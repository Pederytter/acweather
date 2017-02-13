<?php
    $ip = '195.254.169.71'; //$_SERVER['REMOTE_ADDR'];
    $details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
    $cityIp = $details->city;
    echo $cityIp;
?>

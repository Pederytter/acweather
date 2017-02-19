
<?php
$city = $_GET['city'];
$option = $_GET['option'];
// This is the URL you want to shorten
$longUrl = 'malthebp.dk/eaaa/acweather/indexGoogle.php?city='.$city.'&option='.$option;

// Get API key from : http://code.google.com/apis/console/
$apiKey = 'AIzaSyCZcJ0mw1KM-enBL1QUDHjvJdgsAlHQMwU';

$postData = array('longUrl' => $longUrl, 'key' => $apiKey);
$jsonData = json_encode($postData);

$curlObj = curl_init();

curl_setopt($curlObj, CURLOPT_URL, 'https://www.googleapis.com/urlshortener/v1/url?key='.$apiKey);
curl_setopt($curlObj, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curlObj, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($curlObj, CURLOPT_HEADER, 0);
curl_setopt($curlObj, CURLOPT_HTTPHEADER, array('Content-type:application/json'));
curl_setopt($curlObj, CURLOPT_POST, 1);
curl_setopt($curlObj, CURLOPT_POSTFIELDS, $jsonData);

$response = curl_exec($curlObj);

// Change the response json string to object
$json = json_decode($response);

curl_close($curlObj);
echo $json->id;
?>
<?php
$access_token = 'YNjsjurrJe8/74ZkrudrQCFjyWiWcujuzzhAMZ/fden0FBNYAfT+2Q6qAIzBrVDN273QKEVlUinjTeNPh+6696J4NBEPF34LaT8GfExE118m0I8sfZfdfr4jgd0g8H0viC+Sfk15MmzWbtODBuS0UwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
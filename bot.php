<?php

include_once("vendor/autoload.php");

$channelToken = "YNjsjurrJe8/74ZkrudrQCFjyWiWcujuzzhAMZ/fden0FBNYAfT+2Q6qAIzBrVDN273QKEVlUinjTeNPh+6696J4NBEPF34LaT8GfExE118m0I8sfZfdfr4jgd0g8H0viC+Sfk15MmzWbtODBuS0UwdB04t89/1O/w1cDnyilFU=";
$channelSecret = "0607c7cf2e8d92697898857ff87a69b5";


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($channelToken);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello');
$response = $bot->replyMessage('<replyToken>', $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

echo "OK";
?>
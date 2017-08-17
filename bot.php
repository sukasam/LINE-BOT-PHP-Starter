<?php

include_once("vendor/autoload.php");

$channelToken = "YNjsjurrJe8/74ZkrudrQCFjyWiWcujuzzhAMZ/fden0FBNYAfT+2Q6qAIzBrVDN273QKEVlUinjTeNPh+6696J4NBEPF34LaT8GfExE118m0I8sfZfdfr4jgd0g8H0viC+Sfk15MmzWbtODBuS0UwdB04t89/1O/w1cDnyilFU=";
$channelSecret = "0607c7cf2e8d92697898857ff87a69b5";


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($channelToken);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken
			$replyToken = $event['replyToken'];
			
			$userId = $event['source']['userId'];
			
			if($text == "สวัสดี" || $text == "Hello"){
				
				$response = $bot->getProfile($userId);
				if ($response->isSucceeded()) {
					$profile = $response->getJSONDecodedBody();
					$response = $bot->replyText($replyToken, $profile['displayName']);
				}else{
					$response = $bot->replyText($replyToken, $text);
				}
				
			}else{
				$response = $bot->replyText($replyToken, $text);
			}
			
			
		}
	}
}
echo "OK";
?>
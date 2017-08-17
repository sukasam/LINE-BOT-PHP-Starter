<?php

include ('line-bot.php');

$channelSecret = '0607c7cf2e8d92697898857ff87a69b5';
$access_token  = 'YNjsjurrJe8/74ZkrudrQCFjyWiWcujuzzhAMZ/fden0FBNYAfT+2Q6qAIzBrVDN273QKEVlUinjTeNPh+6696J4NBEPF34LaT8GfExE118m0I8sfZfdfr4jgd0g8H0viC+Sfk15MmzWbtODBuS0UwdB04t89/1O/w1cDnyilFU=';

$bot = new BOT_API($channelSecret, $access_token);
	
if (!empty($bot->isEvents)) {
		
    $bot->replyMessageNew($bot->replyToken, json_encode($bot->message));
    if ($bot->isSuccess()) {
        echo 'Succeeded!';
        exit();
    }
    // Failed
    echo $bot->response->getHTTPStatus . ' ' . $bot->response->getRawBody(); 
    exit();
}
echo "OK";
?>
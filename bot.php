<?php
$access_token = 'j2cvIqu3dkuoH3jnHpwXm8T21k7HG2ivHxRJ5RdnXVFdWLjmMlgFNJL82OIfocOOp1LHsZkPrXzZQcrQx2TrEVAKxSOuXJupP+DN/aBQ5KOYCD/9OhPSI5eekFGRDMgz2RwEOZDr/SN3NHnkKgZcAQdB04t89/1O/w1cDnyilFU=';

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

			if (strpos($text, 'สเต็ก') !== false) {
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ร้านสเต็ก...'
				];
			}
			else { 
				$messages = [
					'type' => 'template',
					'altText' => 'this is a carousel template',
					'template' => [
						'type' => 'carousel',
						'columns' => [
							'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg',
							'title' => 'this is menu',
							'text' => 'description',
							'actions' => [
								'type' => 'postback',
								'label' => 'Buy',
								'data' => 'action=buy&itemid=111'
							]
						]
					]
				];
			}
			
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
			$post = json_encode($data);
			$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
			curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$result = curl_exec($ch);
			curl_close($ch);

			echo $result . "\r\n";
		}
	}
}
echo "OK";
?>

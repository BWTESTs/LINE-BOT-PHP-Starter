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
					'type' => 'image', 
					'originalContentUrl' => 'https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwiskZyb-tLTAhXJpY8KHfNLCEQQjRwIBw&url=http%3A%2F%2Fwallpaper-gallery.net%2Fwallpapers%2Fpicture.html&psig=AFQjCNFDoENIepDEiS_-OSYAxcSVwRotTQ&ust=1493874461269393', 
					'previewImageUrl' => 'https://www.google.co.th/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&cad=rja&uact=8&ved=0ahUKEwjt9eWo-tLTAhXJLI8KHeLOC-MQjRwIBw&url=%2Furl%3Fsa%3Di%26rct%3Dj%26q%3D%26esrc%3Ds%26source%3Dimages%26cd%3D%26cad%3Drja%26uact%3D8%26ved%3D%26url%3Dhttp%253A%252F%252Fwww.news.com.au%252Ftechnology%252Fscience%252Fanimals%252Fseal-pup-allows-photographer-rare-close-up%252Fnews-story%252Fb90f6bbeb759e985fbed067ca40dc18f%26psig%3DAFQjCNFDoENIepDEiS_-OSYAxcSVwRotTQ%26ust%3D1493874461269393&psig=AFQjCNFDoENIepDEiS_-OSYAxcSVwRotTQ&ust=1493874461269393'
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

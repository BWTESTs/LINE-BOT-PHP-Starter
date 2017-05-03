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

			if (strpos(strtolower($text), 'help') !== false || strpos($text, 'หาอะไรได้บ้าง') !== false) {
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ค้นหาร้านอาหาร หรือสอบถามข้อมูลได้ง่าย ๆ ดังนี้
					1.ค้นหาร้านอาหารแนะนำ
					2.ค้นหาร้านอาหาร
					3.ค้นหาอาหารตามประเภท
					4.ค้นหาจากชื่อร้าน
					5.ขอสูตรอาหาร
					6.ค้นหาโปรโมชั่น'
				];
			}
			else if (strpos($text, 'แนะนำ') !== false) {
				// Build message to reply back
				$messages = [
					  'type' => 'template', 
					  'altText' => 'this is a carousel template', 
					  'template' =>  
					  array ( 
					    'type' => 'carousel', 
					    'columns' =>  
					    array ( 
					      array ( 
						'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg', 
						'title' => 'this is menu', 
						'text' => 'description', 
						'actions' =>  
						  array ( 
						    'type' => 'postback', 
						    'label' => 'Add to cart', 
						    'data' => 'action=add&itemid=111', 
						  ),
					      ), 
					      array ( 
						'thumbnailImageUrl' => 'https://example.com/bot/images/item2.jpg', 
						'title' => 'this is menu', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    'type' => 'postback', 
						    'label' => 'Add to cart', 
						    'data' => 'action=add&itemid=111', 
						  ),
					      ), 
					    ), 
					  ), 
				];
			}
			else if (strpos($text, 'ค้นหาร้าน') !== false)
			{
				
			}
			else if (strpos($text, 'โปรโมชัน') !== false || strpos($text, 'โปรโมชั่น') !== false || strpos(strtolower($text), 'promotion') !== false)
			{
				
			}
			else if (strpos($text, 'เลือกประเภทอาหาร') !== false)
			{
				
			}
			else if (strpos($text, 'สูตรอาหาร') !== false)
			{
				
			}
			else { 
				$messages = [
					  'type' => 'imagemap', 
					  'text' => 'a'
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

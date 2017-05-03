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
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/02/22/cac93497800a43aabd8b7feae8053ed7.jpg', 
						'title' => 'ก๋วยเตี๋ยว', 
						'text' => 'description', 
						'actions' =>  
						  array ( 
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Select', 
							    'data' => 'action=add&itemid=111',
							    'text' => 'ก๋วยเตี๋ยว',
							  ),
						  ),
					      ), 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/11/01/ddb28578db4d41b08ca94af7c85f8b8c.jpg', 
						'title' => 'สเต็ก', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    array ( 
							    'type' => 'postback', 
							    'label' => 'Select', 
							    'data' => 'action=add&itemid=111',
							    'text' => 'สเต็ก',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2015/09/17/ba9b0a672fbf43b8b9d13d17fb2c1721.jpg', 
						'title' => 'หมูกะทะ', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    array ( 
							    'type' => 'postback', 
							    'label' => 'Select', 
							    'data' => 'action=add&itemid=111',
							    'text' => 'หมูกะทะ',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/09/20/8006bef53887403e9d27815ed15f6470.jpg', 
						'title' => 'ส้มตำ', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    array ( 
							    'type' => 'postback', 
							    'label' => 'Select', 
							    'data' => 'action=add&itemid=111',
							    'text' => 'ส้มตำ',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/08/21/c25acd780f4649d499bf9d90502d7ada.jpg', 
						'title' => 'อาหารญี่ปุ่น', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    array ( 
							    'type' => 'postback', 
							    'label' => 'Select', 
							    'data' => 'action=add&itemid=111',
							    'text' => 'อาหารญี่ปุ่น',
							  ),
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
			else if (strpos($text, 'ก๋วยเตี๋ยว') !== false)
			{
				$messages = [
					  'type' => 'template', 
					  'altText' => 'this is a carousel template', 
					  'template' =>  
					  array ( 
					    'type' => 'carousel', 
					    'columns' =>  
					    array ( 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/02/22/cac93497800a43aabd8b7feae8053ed7.jpg', 
						'title' => 'ร้าน พี่อ้อ ก๋วยเตี๋ยวต้มยำ', 
						'text' => 'description', 
						'actions' =>  
						  array ( 
							  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/4fe806fabb7b422584f53b73715b9c09',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ), 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/05/15/fa90d9d1578a4679981de801f2e47e85.jpg', 
						'title' => 'ร้าน รุ่งเรือง ก๋วยเตี๋ยวหมู', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/80cdeca431564f75a04f3bec3731482b',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/07/06/a924ead1af68471caa4882bf192d0be2.jpg', 
						'title' => 'ร้าน รวยแซ่บ ก๋วยเตี๋ยวต้มยำไข่หวาน', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/675501d64a3249b7a0c9612d4accf667',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/01/14/a991d52eb630401e932e8eee55a86974.jpg', 
						'title' => 'ร้าน เหล่ากุ้ย บะหมี่อัศวิน', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/919a4b70a2c24822b258d1a3c9c0246a',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2012/04/28/a9bd566389c14e3fbb55ba66efe87406.jpg', 
						'title' => 'ร้าน โกบู้รสซิ่ง', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/e617f3e7c0fb4a77b77c83ec0e7ec89e',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					    ), 
					  ),
				];
			}
			else if (strpos($text, 'สเต็ก') !== false)
			{
				$messages = [
					  'type' => 'template', 
					  'altText' => 'this is a carousel template', 
					  'template' =>  
					  array ( 
					    'type' => 'carousel', 
					    'columns' =>  
					    array ( 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/11/01/ddb28578db4d41b08ca94af7c85f8b8c.jpg', 
						'title' => 'ร้าน Arno"s Butcher and Eatery', 
						'text' => 'description', 
						'actions' =>  
						  array ( 
							  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/d7d8e9e75bf841cc8724f25e59513488',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ), 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/06/19/a2a8f17558764ee2be573211057ec2e5.jpg', 
						'title' => 'ร้าน El Gaucho Argentinian Steakhouse', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/b5ffccc708e44a44ae9879cced423b26',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2015/04/24/00cb90b5f9d64009be5e7fc4a22537ff.jpg', 
						'title' => 'ร้าน Kritsada Steak House', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/9a412c24510d4e8f813a807f7d99b0f7',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/11/06/0f980e8aece64b76a4223fd5d7fa8042.jpg', 
						'title' => 'ร้าน Eat Am Are', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/d4ef2adb6a614ddc83298503819ff3b0',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/11/19/26da29c395dc45c6b391735c1060ebd7.jpg', 
						'title' => 'ร้าน Kobe Steakhouse', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/844be4ff506b48ebad403e36986e26d6',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					    ), 
					  ),
				];
			}
			else if (strpos($text, 'หมูกะทะ') !== false)
			{
				$messages = [
					  'type' => 'template', 
					  'altText' => 'this is a carousel template', 
					  'template' =>  
					  array ( 
					    'type' => 'carousel', 
					    'columns' =>  
					    array ( 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2015/09/17/ba9b0a672fbf43b8b9d13d17fb2c1721.jpg', 
						'title' => 'ร้าน มังกรซีฟู้ดส์', 
						'text' => 'description', 
						'actions' =>  
						  array ( 
							  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/e3b9916e89b64da794a5be43a51b07e8',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ), 
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2011/10/13/ff80808132d2fde50132f9b380315dca.jpg', 
						'title' => 'ร้าน เอี่ยมโภชนา', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/bac3332eacb545d294992f7fbddb86e9',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2015/03/21/060216e0926b4d44babf19864cf14637.jpg', 
						'title' => 'ร้าน บาร์บีคิว รีสอร์ท', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/69e8ea66d20f40999a4fbdb44e587270',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2012/02/20/ff808081357c87fe013599e623625480.jpg', 
						'title' => 'ร้าน เดอะซีซั่น', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/317289c508e94ab289d6681f1db59375',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array ( 
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/03/11/d92274ed48c440a4bf3b1a397aea8b7d.jpg', 
						'title' => 'ร้าน Grill Station', 
						'text' => 'description', 
						'actions' =>  
						array ( 
						    	  array ( 
							    'type' => 'uri', 
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/2b725afae2d7444eb93bd79045ff8b19',
							  ),
							  array ( 
							    'type' => 'postback', 
							    'label' => 'Tel:0xx-xxx-xxxx', 
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					    ), 
					  ),
				];
			}
			else if (strpos($text, 'สูตรอาหาร') !== false)
			{
				
			}
			else { 
				$messages = [
					  'type' => 'imagemap', 
					  'baseUrl' => 'https://example.com/bot/images/rm001', 
					  'altText' => 'this is an imagemap', 
					  'baseSize' =>  
					  array ( 
					    'height' => 1040, 
					    'width' => 1040, 
					  ), 
					  'actions' =>  
					  array ( 
					    0 =>  
					    array ( 
					      'type' => 'uri', 
					      'linkUri' => 'https://example.com/', 
					      'area' =>  
					      array ( 
						'x' => 0, 
						'y' => 0, 
						'width' => 520, 
						'height' => 1040, 
					      ), 
					    ), 
					    1 =>  
					    array ( 
					      'type' => 'message', 
					      'text' => 'hello', 
					      'area' =>  
					      array ( 
						'x' => 520, 
						'y' => 0, 
						'width' => 520, 
						'height' => 1040, 
					      ), 
					    ), 
					  )
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

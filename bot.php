<?php
$access_token = '5eJQBT5OVKGnLsE6lXXUHhxo3ySkrok2TzSc+JbWs/I7l9jC91Ymn5WDELvNADkMjzirUo0XRjswVSHpIEoNyvEkaMPzHJfz6xyyIwo/H9yFVYtJbkKlYmX9bOWn9AIOur5vWMlhlU+xtEm3e9rNqAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');
// Parse JSON
$events = json_decode($content, true);
// Validate parsed JSON data
if (!is_null($events['events'])) {
	// Loop through each event
	foreach ($events['events'] as $event) {
		// Reply only when message sent is in 'text' format
		if ($event['message']['type'] == 'location')
		{
			$messages = [
				'type' => 'text',
				'text' => 'latitude '.$event['message']['latitude'].' : longitude '.$event['message']['longitude']
			];
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages],
			];
		}
		else if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
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

				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'แบงค์') !== false) {
				$messages = [
					'type' => 'text',
					'text' => 'ยินดีที่ได้รู้จักนะแบงค์'
				];
				$messages_2 = [
					'type' => 'text',
					'text' => 'กินไรยังเนี่ย?'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages,$messages_2],
				];
			}
			else if (strpos($text, 'ยัง') !== false) {
				$messages = [
					'type' => 'text',
					'text' => 'มีร้านในใจยัง ให้สิงหาแนะนำป่ะ'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'มีอะไรให้เลือก') !== false || strpos($text, 'แนะนำ') !== false) {
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'อยากกินแนวไหนดีล่ะ?'
				];
				$messages_2 = [
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
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages, $messages_2],
				];
			}
			else if (strpos($text, 'ก๋วยเตี๋ยว') !== false || strpos($text, 'สเต็ก') !== false ||
							strpos($text, 'หมูกระทะ') !== false || strpos($text, 'ส้มตำ') !== false ||
							strpos($text, 'อาหารญี่ปุ่น') !== false)
			{
				$messages = [
					'type' => 'text',
					'text' => 'เอาร้านรอบตัวแบงค์มั้ย หรือหาร้านแถวไหนดี?'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'รอบตัว') !== false)
			{
				$messages = [
					'type' => 'template',
					'altText' => 'this is a buttons template',
					'template' =>
					array (
						'type' => 'buttons',
						//'thumbnailImageUrl' => 'https://example.com/bot/images/image.jpg',
						//'title' => 'Menu',
						'text' => 'ช่วยกดแชร์ Location มาให้เราหน่อย เดี๋ยวเราจะลองหาร้านแถวนั้นให้',
						'actions' =>
						array (
							array (
								'type' => 'postback',
								'label' => 'แชร์ Location',
								'data' => 'action=buy&itemid=123',
							),
						),
					),
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
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
							    'type' => 'uri',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'uri' => 'tel:0952514507',
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
			else if (strpos($text, 'ส้มตำ') !== false)
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
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/09/20/8006bef53887403e9d27815ed15f6470.jpg',
						'title' => 'ร้าน ไก่ทอดเจ๊กี (ส้มตำโปโล)',
						'text' => 'description',
						'actions' =>
						  array (
							  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/7ca91f1f976a4997a91db0b659c2d5bd',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2014/10/11/d2071a33561c4a65a8fe3d476c8541ad.jpg',
						'title' => 'ร้าน แซ่บวัน รัชดา',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/f91f13c8cb3d43febcf9b95502e15b90',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2015/08/28/17b446dada4e4b0599b35b2167d90237.jpg',
						'title' => 'ร้าน ส้มตำนัว',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/05603d626b474ebf898646b59931a89e',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/11/02/a33510c319484f78bedd0379234d0f63.jpg',
						'title' => 'ร้าน ส้มตำเจ๊แดง',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/9d06defdae3e449ab46760ed2b041f53',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2010/12/16/ff8080812ceed075012cefcba36a0034.jpg',
						'title' => 'ร้าน ยอดลาบเป็ดอุดร',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/7e1fb66eb9e84beca6fe3b9662f5387d',
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
			else if (strpos($text, 'อาหารญี่ปุ่น') !== false)
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
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/08/21/c25acd780f4649d499bf9d90502d7ada.jpg',
						'title' => 'ร้าน Isao',
						'text' => 'description',
						'actions' =>
						  array (
							  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/53ffe27e22fa4c749c0e758e4b933de5',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/01/09/68415c2144d5412da602f9d7cba54827.jpg',
						'title' => 'ร้าน Bankara Ramen',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/42bbb54bdbc941e2924a0fd8940c7b2f',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2017/04/21/0cbd35e84edc4bf68f04d34d123c41e0.jpg',
						'title' => 'ร้าน Sushi Masa',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/e7a3e90f8e3140b39ee4ae8643fec13b',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/09/18/4c435ec173aa46a9bb6ebe1510e4972d.jpg',
						'title' => 'ร้าน Katsushin',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/8c7d1568569b4be4a9a31e73345e4c5e',
							  ),
							  array (
							    'type' => 'postback',
							    'label' => 'Tel:0xx-xxx-xxxx',
							    'data' => 'action=add&itemid=111',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://img-wongnai.cdn.byteark.com/p/t/2016/10/07/7e73b81acde04d54a3d2b718c1c9cf12.jpg',
						'title' => 'ร้าน Umenohana',
						'text' => 'description',
						'actions' =>
						array (
						    	  array (
							    'type' => 'uri',
							    'label' => 'View detail',
							    'uri' => 'https://www.wongnai.com/reviews/c2dc8aaaadd549e0a94e155e53a97984',
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
					  'type' => 'text',
					  'text' => 'โทษที...เราไม่เข้าใจ'
				];
			}
			// Make a POST Request to Messaging API to reply to sender
			$url = 'https://api.line.me/v2/bot/message/reply';

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

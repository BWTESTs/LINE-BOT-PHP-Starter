<?php
function str_starts_with($haystack, $needle)
{
    return strpos($haystack, $needle) === 0;
}

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

		// token to confirm reply to correct message
		$replyToken = $event['replyToken'];

		// get user id
		$userId = null;
		$groupId = null;
		$roomId = null;
		if ($event['source']['type'] == 'user') {
			$userId = $event['source']['userId'];
		}
		if ($event['source']['type'] == 'group') {
			$groupId = $event['source']['groupId'];
		}
		if ($event['source']['type'] == 'room') {
			$roomId = $event['source']['roomId'];
		}

		// get location
		if ($event['type'] == 'message' && $event['message']['type'] == 'location')
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
								'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_peeor-tomyum.jpg',
								'title' => 'ร้าน พี่อ้อ ก๋วยเตี๋ยวต้มยำ',
								'text' => 'เด็ดที่รสชาติ การใช้วัตถุดิบปัง ราคาแพงลิ่ว',
								'actions' =>
				  				array (
					  				array (
									    'type' => 'uri',
									    'label' => 'ดูข้อมูลและรีวิว',
									    'uri' => 'https://www.wongnai.com/restaurants/peeortomyum',
									  ),
									  array (
									    'type' => 'uri',
									    'label' => 'โทร 081-443-6629',
									    'uri' => 'tel:0822318917',
									  ),
				  				),
			      	),
			      	array (
								'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_rungrueang-noodle.jpg',
								'title' => 'ร้าน รุ่งเรือง ก๋วยเตี๋ยวหมู',
								'text' => 'ก๋วยเตี๋ยวหมูลูกชิ้นปลารสชาติคลาสสิคร้านดัง',
								'actions' =>
									array (
									  array (
									    'type' => 'uri',
									    'label' => 'ดูข้อมูลและรีวิว',
									    'uri' => 'https://www.wongnai.com/restaurants/rungrueangnoodle',
									  ),
									  array (
									    'type' => 'uri',
									    'label' => 'โทร 02-258-6746',
									    'uri' => 'tel:0822318917',
									  ),
							  	),
				      ),
			      	array (
								'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_ruai-zabb-tom-yam-kai-wan-noodle.jpg',
								'title' => 'ร้าน รวยแซ่บ ก๋วยเตี๋ยวต้มยำไข่หวาน',
								'text' => 'มาม่าไข่หวานอร่อยอ่าาา ชามใหญ่ เครื่องเยอะ รสชาติเข้มข้น',
								'actions' =>
									array (
										array (
											'type' => 'uri',
											'label' => 'ดูข้อมูลและรีวิว',
											'uri' => 'https://www.wongnai.com/restaurants/ruai-zabb-tom-yam-kai-wan-noodle',
										),
										array (
											'type' => 'uri',
											'label' => 'โทร 091-142-8989',
											'uri' => 'tel:0822318917',
										),
								  ),
			      	),
	      			array (
								'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_lao-kui-bahmee-assawin.jpg',
								'title' => 'ร้าน เหล่ากุ้ย บะหมี่อัศวิน',
								'text' => 'ลองสั่งมาทานที่บ้าน',
								'actions' =>
								array (
									array (
										'type' => 'uri',
										'label' => 'ดูข้อมูลและรีวิว',
										'uri' => 'https://www.wongnai.com/restaurants/10185Rh-%E0%B9%80%E0%B8%AB%E0%B8%A5%E0%B9%88%E0%B8%B2%E0%B8%81%E0%B8%B8%E0%B9%89%E0%B8%A2-%E0%B8%9A%E0%B8%B0%E0%B8%AB%E0%B8%A1%E0%B8%B5%E0%B9%88%E0%B8%AD%E0%B8%B1%E0%B8%A8%E0%B8%A7%E0%B8%B4%E0%B8%99',
									),
									array (
										'type' => 'uri',
										'label' => 'โทร 089-446-3818',
										'uri' => 'tel:0822318917',
									),
							  ),
				      ),
			      	array (
								'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_ko-boo-rossing-noodle.jpg',
								'title' => 'ร้าน โกบู้รสซิ่ง',
								'text' => 'สมกับที่ดั้นด้นมากินให้ได้ อร่อยจริง แม้จะแพงไปนิด',
								'actions' =>
									array (
										array (
											'type' => 'uri',
											'label' => 'ดูข้อมูลและรีวิว',
											'uri' => 'https://www.wongnai.com/restaurants/8332PT-%E0%B9%82%E0%B8%81%E0%B8%9A%E0%B8%B9%E0%B9%89%E0%B8%A3%E0%B8%AA%E0%B8%8B%E0%B8%B4%E0%B9%88%E0%B8%87-%E0%B8%AA%E0%B8%B2%E0%B8%82%E0%B8%B2-1-%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%97%E0%B8%A2-7',
										),
										array (
											'type' => 'uri',
											'label' => 'โทร 087-698-8913',
											'uri' => 'tel:0822318917',
										),
								  ),
			      	),
		    		),
		  	),
			];
			$messages_2 = [
				'type' => 'text',
				'text' => 'เป็นไง ร้านโดนใจมั้ย?'
			];
			$data = [
				'replyToken' => $replyToken,
				'messages' => [$messages, $messages_2],
			];

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
		else if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			// Get text sent
			$text = $event['message']['text'];
			// Get replyToken

			if (strpos(strtolower($text), 'help') !== false || strpos($text, 'หาอะไรได้บ้าง') !== false) {
				// Build message to reply back
				$messages = [
					'type' => 'text',
					'text' => 'ค้นหาร้านอาหาร หรือสอบถามข้อมูลได้ง่าย ๆ ดังนี้
					'."\n".'[1] ค้นหาร้านอาหารแนะนำ
					'."\n".'[2] ค้นหาร้านอาหาร
					'."\n".'[3] ค้นหาอาหารตามประเภท
					'."\n".'[4] ค้นหาจากชื่อร้าน
					'."\n".'[5] ขอสูตรอาหาร
					'."\n".'[6] ค้นหาโปรโมชั่น'
				];

				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (str_starts_with(strtolower($text), 'singha') !== false || str_starts_with($text, 'สิงห์') !== false) {

				$user_name = '';
				$file = fopen("filename.dat", "r");
				if ($file) {
					while (($line = fgets($file)) !== false) {
						// process the line read.
						$data = explode("|", $line);
						if ($data[0] == $userId) {
							$user_name = $data[1];
						}
					}
					fclose($file);
				} else {
					// error opening the file.
				}

				$messages = [
					'type' => 'text',
					'text' => 'ว่าไง' . $user_name
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'ทำไรอยู่') !== false || strpos($text, 'เฮ้ย') !== false) {
				$array_messages = array("นั่งหาร้านอาหารอร่อยๆ อยู่อ่ะ กินไรยังเนี่ย?", "กำลังจะอาบน้ำ ว่าจะไปหาอะไรกินสักหน่อย แล้วนี่กินไรยัง?", "กำลังจะทำกับข้าวกินกับที่บ้าน กินไรยัง?");
				$messages = [
					'type' => 'text',
					'text' => ''.$array_messages[rand(0,2)]
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'ชื่อ') !== false) {
				$user_name = trim(explode(" ",trim(explode("ชื่อ", $text)[1]))[0]);

				$file = fopen("filename.dat", "r+");
				if ($file) {
					while (($line = fgets($file)) !== false) {
						// process the line read.
						$data = explode("|", $line);
						if ($data[0] == $userId) {
							// remove userId
						}
						else {
							// write other userId
							fwrite($file, $line . PHP_EOL);
						}
					}
					// write userId with new name
					fwrite($file, $userId . '|' . $user_name . PHP_EOL);

					fclose($file);
				} else {
					// error opening the file.
				}

				$messages = [
					'type' => 'text',
					'text' => 'ยินดีที่ได้รู้จักนะ' . $user_name
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
			else if ($text == 'give me user id') {
				$messages = [
					'type' => 'text',
					'text' => 'รหัสของคุณคือ ' . $userId
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'ยัง') !== false) {
				$messages = [
					'type' => 'text',
					'text' => 'มีเมนูหรือร้านในใจยัง ให้ SINGHA FOOD แนะนำป่ะ'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'มีอะไรให้เลือก') !== false || strpos($text, 'แนะนำ') !== false || strpos($text, 'ค้นหาตามประเภท') !== false) {
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
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/%E0%B8%81%E0%B9%8B%E0%B8%A7%E0%B8%A2%E0%B9%80%E0%B8%95%E0%B8%B5%E0%B9%8A%E0%B8%A2%E0%B8%A7%E0%B9%80%E0%B8%A3%E0%B8%B7%E0%B8%AD_1024px.jpg',
						'title' => 'ก๋วยเตี๋ยว',
						'text' => ' ',
						'actions' =>
						  array (
							  array (
							    'type' => 'postback',
							    'label' => 'กดเลือก ก๋วยเตี๋ยว',
							    'data' => 'action=add&itemid=111',
							    'text' => 'เราเลือกก๋วยเตี๋ยว',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/5239_1024px.jpg',
						'title' => 'สเต็ก',
						'text' => ' ',
						'actions' =>
						array (
						    array (
							    'type' => 'postback',
							    'label' => 'กดเลือก สเต็ก',
							    'data' => 'action=add&itemid=111',
							    'text' => 'เราเลือกสเต็ก',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/%E0%B8%AB%E0%B8%A1%E0%B8%B9%E0%B8%81%E0%B8%A3%E0%B8%B0%E0%B8%97%E0%B8%B01_1024px.jpg',
						'title' => 'หมูกะทะ',
						'text' => ' ',
						'actions' =>
						array (
						    array (
							    'type' => 'postback',
							    'label' => 'กดเลือก หมูกะทะ',
							    'data' => 'action=add&itemid=111',
							    'text' => 'เราเลือกหมูกะทะ',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/%E0%B8%AA%E0%B9%89%E0%B8%A1%E0%B8%95%E0%B8%B3_1000px.jpg',
						'title' => 'ส้มตำ',
						'text' => ' ',
						'actions' =>
						array (
						    array (
							    'type' => 'postback',
							    'label' => 'กดเลือก ส้มตำ',
							    'data' => 'action=add&itemid=111',
							    'text' => 'เราเลือกส้มตำ',
							  ),
						  ),
					      ),
					      array (
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/2743_1024px.jpg',
						'title' => 'อาหารญี่ปุ่น',
						'text' => ' ',
						'actions' =>
						array (
						    array (
							    'type' => 'postback',
							    'label' => 'กดเลือก อาหารญี่ปุ่น',
							    'data' => 'action=add&itemid=111',
							    'text' => 'เราเลือกอาหารญี่ปุ่น',
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
			else if ($text == 'เราเลือกก๋วยเตี๋ยว' || $text == 'เราเลือกสเต็ก' || $text == 'เราเลือกหมูกระทะ' || $text == 'เราเลือกส้มตำ' || $text == 'เราเลือกอาหารญี่ปุ่น')
			{
				$user_name = 'คุณ';
				$file = fopen("filename.dat", "r");
				if ($file) {
					while (($line = fgets($file)) !== false) {
						// process the line read.
						$data = explode("|", $line);
						if ($data[0] == $userId) {
							$user_name = $data[1];
						}
					}
					fclose($file);
				} else {
					// error opening the file.
				}

				$messages = [
					'type' => 'text',
					'text' => 'เอาร้านรอบตัว ' . $user_name . 'มั้ย หรือหาร้านแถวไหนดี?'
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
								'data' => 'action=location',
							),
						),

					),
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'ไม่โดนใจ') !== false)
			{
				$messages = [
					'type' => 'text',
					'text' => 'งั้นขอ SINGHA FOOD แก้ตัวใหม่นะ'
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
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_arnos-butcher-and-eatery.jpg',
										'title' => 'ร้าน Arno"s Butcher and Eatery',
										'text' => 'ร้านสเต๊กและอาหารสไตล์ฝรั่งเศส โดยคนฝรั่งเศส ปริมาณคุ้มค่า คุ้มราคา',
										'actions' =>
							  			array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/arnosbutcher',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 02-678-8340',
											    'uri' => 'tel:0822318917',
											  ),
							  			),
				      		),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_el-gaucho-argentinian-steakhouse.jpg',
										'title' => 'ร้าน El Gaucho Argentinian Steakhouse',
										'text' => 'มื้อเที่ยงแบบจัดหนัก',
										'actions' =>
											array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/arnosbutcher',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 02-255-2864',
											    'uri' => 'tel:0822318917',
											  ),
										  ),
						      ),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kritsada-steak-house.jpg',
										'title' => 'ร้าน Kritsada Steak House',
										'text' => 'อิ่ม อร่อย ราคา (ไม่) แรงมาก',
										'actions' =>
											array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/kritsadasteak',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 081-844-9931',
											    'uri' => 'tel:0822318917',
											  ),
					  					),
					      	),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_eat-am-are.jpg',
										'title' => 'ร้าน Eat Am Are',
										'text' => 'ร้านสเต๊กที่มีคนชวนมาทาน',
										'actions' =>
											array (
												array (
													'type' => 'uri',
													'label' => 'ดูข้อมูลและรีวิว',
													'uri' => 'https://www.wongnai.com/restaurants/132053RI-eat-am-are-fashion-mall',
												),
												array (
													'type' => 'uri',
													'label' => 'โทร 085-099-4956',
													'uri' => 'tel:0822318917',
												),
							  			),
					      	),
						      array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kobe-steakhouse.jpg',
										'title' => 'ร้าน Kobe Steakhouse',
										'text' => 'ร้านสเต็กที่อยู่คู่สยามมายาวนาน',
										'actions' =>
											array (
												array (
													'type' => 'uri',
													'label' => 'ดูข้อมูลและรีวิว',
													'uri' => 'https://www.wongnai.com/restaurants/3590ar-kobe-steakhouse-%E0%B8%AD%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%A2%E0%B8%B2%E0%B8%A1%E0%B8%81%E0%B8%B4%E0%B8%95%E0%B8%95%E0%B9%8C',
												),
												array (
													'type' => 'uri',
													'label' => 'โทร 02-251-1336',
													'uri' => 'tel:0822318917',
												),
						  				),
					      	),
					    	),
					  ),
				];
				$messages_3 = [
					'type' => 'text',
					'text' => 'แล้วร้านพวกนี้ล่ะ โดนใจมั้ย'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages, $messages_2, $messages_3],
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
									'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_peeor-tomyum.jpg',
									'title' => 'ร้าน พี่อ้อ ก๋วยเตี๋ยวต้มยำ',
									'text' => 'เด็ดที่รสชาติ การใช้วัตถุดิบปัง ราคาแพงลิ่ว',
									'actions' =>
					  				array (
						  				array (
										    'type' => 'uri',
										    'label' => 'ดูข้อมูลและรีวิว',
										    'uri' => 'https://www.wongnai.com/restaurants/peeortomyum',
										  ),
										  array (
										    'type' => 'uri',
										    'label' => 'โทร 081-443-6629',
										    'uri' => 'tel:0822318917',
										  ),
					  				),
				      	),
				      	array (
									'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_rungrueang-noodle.jpg',
									'title' => 'ร้าน รุ่งเรือง ก๋วยเตี๋ยวหมู',
									'text' => 'ก๋วยเตี๋ยวหมูลูกชิ้นปลารสชาติคลาสสิคร้านดัง',
									'actions' =>
										array (
										  array (
										    'type' => 'uri',
										    'label' => 'ดูข้อมูลและรีวิว',
										    'uri' => 'https://www.wongnai.com/restaurants/rungrueangnoodle',
										  ),
										  array (
										    'type' => 'uri',
										    'label' => 'โทร 02-258-6746',
										    'uri' => 'tel:0822318917',
										  ),
								  	),
					      ),
				      	array (
									'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_ruai-zabb-tom-yam-kai-wan-noodle.jpg',
									'title' => 'ร้าน รวยแซ่บ ก๋วยเตี๋ยวต้มยำไข่หวาน',
									'text' => 'มาม่าไข่หวานอร่อยอ่าาา ชามใหญ่ เครื่องเยอะ รสชาติเข้มข้น',
									'actions' =>
										array (
											array (
												'type' => 'uri',
												'label' => 'ดูข้อมูลและรีวิว',
												'uri' => 'https://www.wongnai.com/restaurants/ruai-zabb-tom-yam-kai-wan-noodle',
											),
											array (
												'type' => 'uri',
												'label' => 'โทร 091-142-8989',
												'uri' => 'tel:0822318917',
											),
									  ),
				      	),
		      			array (
									'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_lao-kui-bahmee-assawin.jpg',
									'title' => 'ร้าน เหล่ากุ้ย บะหมี่อัศวิน',
									'text' => 'ลองสั่งมาทานที่บ้าน',
									'actions' =>
									array (
										array (
											'type' => 'uri',
											'label' => 'ดูข้อมูลและรีวิว',
											'uri' => 'https://www.wongnai.com/restaurants/10185Rh-%E0%B9%80%E0%B8%AB%E0%B8%A5%E0%B9%88%E0%B8%B2%E0%B8%81%E0%B8%B8%E0%B9%89%E0%B8%A2-%E0%B8%9A%E0%B8%B0%E0%B8%AB%E0%B8%A1%E0%B8%B5%E0%B9%88%E0%B8%AD%E0%B8%B1%E0%B8%A8%E0%B8%A7%E0%B8%B4%E0%B8%99',
										),
										array (
											'type' => 'uri',
											'label' => 'โทร 089-446-3818',
											'uri' => 'tel:0822318917',
										),
								  ),
					      ),
				      	array (
									'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/noodle/web_ko-boo-rossing-noodle.jpg',
									'title' => 'ร้าน โกบู้รสซิ่ง',
									'text' => 'สมกับที่ดั้นด้นมากินให้ได้ อร่อยจริง แม้จะแพงไปนิด',
									'actions' =>
										array (
											array (
												'type' => 'uri',
												'label' => 'ดูข้อมูลและรีวิว',
												'uri' => 'https://www.wongnai.com/restaurants/8332PT-%E0%B9%82%E0%B8%81%E0%B8%9A%E0%B8%B9%E0%B9%89%E0%B8%A3%E0%B8%AA%E0%B8%8B%E0%B8%B4%E0%B9%88%E0%B8%87-%E0%B8%AA%E0%B8%B2%E0%B8%82%E0%B8%B2-1-%E0%B9%80%E0%B8%AA%E0%B8%A3%E0%B8%B5%E0%B9%84%E0%B8%97%E0%B8%A2-7',
											),
											array (
												'type' => 'uri',
												'label' => 'โทร 087-698-8913',
												'uri' => 'tel:0822318917',
											),
									  ),
				      	),
			    		),
			  	),
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
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
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_arnos-butcher-and-eatery.jpg',
										'title' => 'ร้าน Arno"s Butcher and Eatery',
										'text' => 'ร้านสเต๊กและอาหารสไตล์ฝรั่งเศส โดยคนฝรั่งเศส ปริมาณคุ้มค่า คุ้มราคา',
										'actions' =>
							  			array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/arnosbutcher',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 02-678-8340',
											    'uri' => 'tel:0822318917',
											  ),
							  			),
				      		),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_el-gaucho-argentinian-steakhouse.jpg',
										'title' => 'ร้าน El Gaucho Argentinian Steakhouse',
										'text' => 'มื้อเที่ยงแบบจัดหนัก',
										'actions' =>
											array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/arnosbutcher',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 02-255-2864',
											    'uri' => 'tel:0822318917',
											  ),
										  ),
						      ),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kritsada-steak-house.jpg',
										'title' => 'ร้าน Kritsada Steak House',
										'text' => 'อิ่ม อร่อย ราคา (ไม่) แรงมาก',
										'actions' =>
											array (
												array (
											    'type' => 'uri',
											    'label' => 'ดูข้อมูลและรีวิว',
											    'uri' => 'https://www.wongnai.com/restaurants/kritsadasteak',
											  ),
											  array (
											    'type' => 'uri',
											    'label' => 'โทร 081-844-9931',
											    'uri' => 'tel:0822318917',
											  ),
					  					),
					      	),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_eat-am-are.jpg',
										'title' => 'ร้าน Eat Am Are',
										'text' => 'ร้านสเต๊กที่มีคนชวนมาทาน',
										'actions' =>
											array (
												array (
													'type' => 'uri',
													'label' => 'ดูข้อมูลและรีวิว',
													'uri' => 'https://www.wongnai.com/restaurants/132053RI-eat-am-are-fashion-mall',
												),
												array (
													'type' => 'uri',
													'label' => 'โทร 085-099-4956',
													'uri' => 'tel:0822318917',
												),
							  			),
					      	),
						      array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kobe-steakhouse.jpg',
										'title' => 'ร้าน Kobe Steakhouse',
										'text' => 'ร้านสเต็กที่อยู่คู่สยามมายาวนาน',
										'actions' =>
											array (
												array (
													'type' => 'uri',
													'label' => 'ดูข้อมูลและรีวิว',
													'uri' => 'https://www.wongnai.com/restaurants/3590ar-kobe-steakhouse-%E0%B8%AD%E0%B8%B2%E0%B8%84%E0%B8%B2%E0%B8%A3%E0%B8%AA%E0%B8%A2%E0%B8%B2%E0%B8%A1%E0%B8%81%E0%B8%B4%E0%B8%95%E0%B8%95%E0%B9%8C',
												),
												array (
													'type' => 'uri',
													'label' => 'โทร 02-251-1336',
													'uri' => 'tel:0822318917',
												),
						  				),
					      	),
					    	),
					  ),
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'หมูกะทะ') !== false || strpos($text, 'ชื่นชอบ') !== false)
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
											'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/grill_pork/web_mangkorn-seafood.jpg',
											'title' => 'ร้าน มังกรซีฟู้ดส์',
											'text' => 'description',
											'actions' =>
					  						array (
													array (
														'type' => 'uri',
														'label' => 'ดูข้อมูลและรีวิว',
														'uri' => 'https://www.wongnai.com/restaurants/195156Es-%E0%B8%A1%E0%B8%B1%E0%B8%87%E0%B8%81%E0%B8%A3%E0%B8%8B%E0%B8%B5%E0%B8%9F%E0%B8%B9%E0%B9%89%E0%B8%94%E0%B8%AA%E0%B9%8C',
													),
													array (
														'type' => 'uri',
														'label' => 'โทร 083-096-6379',
														'uri' => 'tel:0822318917',
													),
						  					),
					      		),
					      		array (
											'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/grill_pork/web_aiem-pochana.jpg',
											'title' => 'ร้าน เอี่ยมโภชนา',
											'text' => 'หม้อไฟก็ดี หมูกระทะก็โดนหอยแครงก็เด็ด',
											'actions' =>
												array (
													array (
														'type' => 'uri',
														'label' => 'ดูข้อมูลและรีวิว',
														'uri' => 'https://www.wongnai.com/restaurants/10689hY-%E0%B9%80%E0%B8%AD%E0%B8%B5%E0%B9%88%E0%B8%A2%E0%B8%A1%E0%B9%82%E0%B8%A0%E0%B8%8A%E0%B8%99%E0%B8%B2',
													),
													array (
														'type' => 'uri',
														'label' => 'โทร 02-225-0582',
														'uri' => 'tel:0822318917',
													),
						  					),
					      		),
					      		array (
											'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/grill_pork/web_bar-b-q-resort.jpg',
											'title' => 'ร้าน บาร์บีคิว รีสอร์ท',
											'text' => 'ร้านหมูกะทะในย่านรามอินทรา ร้านนี้ดีที่สุด เพราะแถบนี้มีร้านเดียว',
											'actions' =>
												array (
													array (
														'type' => 'uri',
														'label' => 'ดูข้อมูลและรีวิว',
														'uri' => 'https://www.wongnai.com/restaurants/9030na-%E0%B8%9A%E0%B8%B2%E0%B8%A3%E0%B9%8C%E0%B8%9A%E0%B8%B5%E0%B8%84%E0%B8%B4%E0%B8%A7-%E0%B8%A3%E0%B8%B5%E0%B8%AA%E0%B8%AD%E0%B8%A3%E0%B9%8C%E0%B8%97-%E0%B8%A3%E0%B8%B2%E0%B8%A1%E0%B8%AD%E0%B8%B4%E0%B8%99%E0%B8%97%E0%B8%A3%E0%B8%B2',
													),
													array (
														'type' => 'uri',
														'label' => 'โทร 088-249-5299',
														'uri' => 'tel:0822318917',
													),
						  					),
					      		),
					      		array (
											'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/grill_pork/web_the-season.jpg',
											'title' => 'ร้าน เดอะซีซั่น',
											'text' => 'บุฟเฟต์ที่คุ้มที่สุดในราคาแค่นี้',
											'actions' =>
												array (
													array (
														'type' => 'uri',
														'label' => 'ดูข้อมูลและรีวิว',
														'uri' => 'https://www.wongnai.com/restaurants/13673ku-%E0%B9%80%E0%B8%94%E0%B8%AD%E0%B8%B0%E0%B8%8B%E0%B8%B5%E0%B8%8B%E0%B8%B1%E0%B9%88%E0%B8%99',
													),
													array (
														'type' => 'uri',
														'label' => 'โทร 082-344-5024',
														'uri' => 'tel:0822318917',
													),
						  					),
					      		),
							      array (
											'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/grill_pork/web_grill-station.jpg',
											'title' => 'ร้าน Grill Station',
											'text' => 'กลางๆ ไม่ดี ไม่เลว',
											'actions' =>
												array (
													array (
														'type' => 'uri',
														'label' => 'ดูข้อมูลและรีวิว',
														'uri' => 'https://www.wongnai.com/restaurants/grill-station',
													),
													array (
														'type' => 'uri',
														'label' => 'โทร 098-367-3732',
														'uri' => 'tel:0822318917',
													),
								  			),
							      ),
					    	),
					  ),
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
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
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
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
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'สูตรอาหาร') !== false)
			{
				$messages = [
					  'type' => 'text',
					  'text' => 'อยากได้สูตรเมนูไหนล่ะ'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'สปาเก็ตตี้คาโบนาร่า') !== false)
			{
				$messages = [
					'type' => 'image',
					'originalContentUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/web_spaghetti_carbonara.jpg',
					'previewImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/web_240p_spaghetti_carbonara'
				];
				$messages_2 = [
					'type' => 'text',
					'text' => 'ส่วนผสม
					'."\n".'1. เบคอน (ปริมาณตามชอบ)
					'."\n".'2. นมสด 200 มิลลิลิตร
					'."\n".'3. ไข่ไก่ 1 ฟอง
					'."\n".'4. พาร์เมซานชีสขูด 1 ช้อนโต๊ะ
					'."\n".'5. น้ำสำหรับต้มเส้นสปาเกตตี
					'."\n".'6. เส้นสปาเกตตี 25 กรัม
					'."\n".'7. เกลือป่น
					'."\n".'8. น้ำมันมะกอก
					'."\n".'9. กระเทียมสับ
					'."\n".'10. พริกไทยดำ'
				];
				$messages_3 = [
					'type' => 'text',
					'text' => 'ขั้นตอนการทำ
					'."\n".'1. หั่นเบคอนเป็นชิ้นเล็ก ๆ เตรียมไว้
					'."\n".'2. ตีผสมนมสดกับไข่ไก่เข้าด้วยกัน
					'."\n".'3. จากนั้นใส่พาร์เมซานชีสลงไปตีให้เข้ากันอีกครั้ง เตรียมไว้
					'."\n".'4. ใส่น้ำลงในหม้อ ตามดวยเกลือป่นและน้ำมันมะกอกเล็กน้อย
					'."\n".'5. ใส่เส้นสปาเกตตีลงไปต้มในน้ำเดือดประมาณ 5 นาที
					'."\n".'6. พอสุกแล้วตักเส้นสปาเกตตีใส่ลงในน้ำเย็น
					'."\n".'7. จากนั้นตักเส้นสปาเกตตีขึ้นสะเด็ดน้ำมัน ใส่น้ำมันมะกอกลงไปเล็กน้อย
					'."\n".'8. เคล้าผสมเส้นสปาเกตตีกับน้ำมันเพื่อให้เส้นไม่ติดกัน เตรียมไว้
					'."\n".'9. นำเบคอนที่หั่นไว้ลงไปทอดในกระทะที่ใส่น้ำมันไว้เล็กน้อย ทอดจนเบคอนเหลืองกรอบ (ตักแบ่งเบคอนกรอบเล็กน้อยไว้สำหรับโรยหน้าก่อนเสิร์ฟ)
					'."\n".'10. ใส่กระเทียมลงไปผัดจนหอม
					'."\n".'11. ใส่เส้นสปาเกตตีลงไปผัดจนเส้นสุกนุ่มตามต้องการ
					'."\n".'12. เทส่วนผสมซอสคาโบนาราลงไป
					'."\n".'13. ผัดให้เข้ากันและส่วนผสมเดือด
					'."\n".'14. ตักใส่จาน โรยหน้าด้วยพาร์เมซานชีส พริกไทยดำ และเบคอนทอดกรอบ พร้อมเสิร์ฟ'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages, $messages_2, $messages_3],
				];
			}
			else if (strpos($text, 'ขอบคุณ') !== false || strpos($text, 'ขอบใจ') !== false) {
				$array_messages = array(120, 122, 125, 130, 132);
				$messages = [
					'type' => 'sticker',
					'packageId' => '1',
					'stickerId' => ''.$array_messages[rand(0,4)]
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else {
				$messages = [
					  'type' => 'text',
					  'text' => 'โทษที...เราไม่เข้าใจ'
				];
				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
// 			$data = [
// 				'replyToken' => $replyToken,
// 				'messages' => [$messages],
// 			];
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

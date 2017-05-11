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
									    'uri' => 'tel:0952514507',
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
									    'uri' => 'tel:0952514507',
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
											'uri' => 'tel:0952514507',
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
										'uri' => 'tel:0952514507',
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
											'uri' => 'tel:0952514507',
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
					[1] ค้นหาร้านอาหารแนะนำ
					[2] ค้นหาร้านอาหาร
					[3] ค้นหาอาหารตามประเภท
					[4] ค้นหาจากชื่อร้าน
					[5] ขอสูตรอาหาร
					[6] ค้นหาโปรโมชั่น'
				];

				$data = [
					'replyToken' => $replyToken,
					'messages' => [$messages],
				];
			}
			else if (strpos($text, 'สิงหา') !== false || strpos($text, 'เฮ้ย') !== false) {

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
					'text' => 'มีเมนูหรือร้านในใจยัง ให้สิงหาแนะนำป่ะ'
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
						'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/%E0%B8%81%E0%B9%8B%E0%B8%A7%E0%B8%A2%E0%B9%80%E0%B8%95%E0%B8%B5%E0%B9%8A%E0%B8%A2%E0%B8%A7%E0%B9%80%E0%B8%A3%E0%B8%B7%E0%B8%AD_1024px.jpg',
						'title' => 'ก๋วยเตี๋ยว',
						'text' => 'description',
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
						'text' => 'description',
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
						'text' => 'description',
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
						'text' => 'description',
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
						'text' => 'description',
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
				  'type' => 'template',
				  'altText' => 'this is a carousel template',
				  'template' =>
				  	array (
					    'type' => 'carousel',
					    'columns' =>
					    	array (
						      array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/arnos-butcher-and-eatery.jpg',
										'title' => 'ร้าน Arno"s Butcher and Eatery',
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
							  			),
				      		),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/el-gaucho-argentinian-steakhouse.jpg',
										'title' => 'ร้าน El Gaucho Argentinian Steakhouse',
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
										  ),
						      ),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/kritsada-steak-house.jpg',
										'title' => 'ร้าน Kritsada Steak House',
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
					  					),
					      	),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/eat-am-are.jpg',
										'title' => 'ร้าน Eat Am Are',
										'text' => 'description',
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
													'uri' => 'tel:0952514507',
												),
							  			),
					      	),
						      array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/kobe-steakhouse.jpg',
										'title' => 'ร้าน Kobe Steakhouse',
										'text' => 'description',
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
													'uri' => 'tel:0952514507',
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
										    'uri' => 'tel:0952514507',
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
										    'uri' => 'tel:0952514507',
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
												'uri' => 'tel:0952514507',
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
											'uri' => 'tel:0952514507',
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
												'uri' => 'tel:0952514507',
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
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
							  			),
				      		),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_el-gaucho-argentinian-steakhouse.jpg',
										'title' => 'ร้าน El Gaucho Argentinian Steakhouse',
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
										  ),
						      ),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kritsada-steak-house.jpg',
										'title' => 'ร้าน Kritsada Steak House',
										'text' => 'description',
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
											    'uri' => 'tel:0952514507',
											  ),
					  					),
					      	),
					      	array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_eat-am-are.jpg',
										'title' => 'ร้าน Eat Am Are',
										'text' => 'description',
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
													'uri' => 'tel:0952514507',
												),
							  			),
					      	),
						      array (
										'thumbnailImageUrl' => 'https://bw-chatbot-singha.herokuapp.com/images/steak/web_kobe-steakhouse.jpg',
										'title' => 'ร้าน Kobe Steakhouse',
										'text' => 'description',
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
													'uri' => 'tel:0952514507',
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
					  'text' => 'ค้นหาสูตรอาหาร'
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

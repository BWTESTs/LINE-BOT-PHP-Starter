<?php
$access_token = '5eJQBT5OVKGnLsE6lXXUHhxo3ySkrok2TzSc+JbWs/I7l9jC91Ymn5WDELvNADkMjzirUo0XRjswVSHpIEoNyvEkaMPzHJfz6xyyIwo/H9yFVYtJbkKlYmX9bOWn9AIOur5vWMlhlU+xtEm3e9rNqAdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
?>

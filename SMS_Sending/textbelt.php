<!-- $ curl -X POST http://textbelt.com/text \
   -d number=5551234567 \
   -d "message=I sent this message for free with textbelt.com" -->


<?php

$url = "http://textbelt.com/text";
$data = array("number" => "8266857005", "message" => "Hello");
$post = http_build_query($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

$result = curl_exec($ch);
curl_close($ch);
var_dump($post);
var_dump($result);

?>
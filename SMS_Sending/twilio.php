<?php

// $curl -X POST 'https://api.twilio.com/2010-04-01/Accounts/Twilio-Id/Messages.json' \
// --data-urlencode 'To=Mobile-No'  \
// --data-urlencode 'From=Twilio-Mobile-No'  \
// --data-urlencode 'Body=Message' \
// -u Twilio-Id:Twilio-Token"

$id  = "Twilio-Id";
$token = "Twilio-Token";
$url = "https://api.twilio.com/2010-04-01/Accounts/Twilio-Id/SMS/Messages";
$data = array("To" => "Mobile-No", "From" => "Twilio-Mobile-No" , "Body" => "Message");
$post = http_build_query($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$id:$token");
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

// curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
// curl_setopt($ch, CURLOPT_HTTPHEADER, array(
//     'Content-Type: application/json',
//     'Content-Length: ' . strlen($data_string))
// );

$result = curl_exec($ch);
curl_close($ch);
var_dump($post);
var_dump($result);
?>
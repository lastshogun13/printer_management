<?php

$line_token = 'xdPwyH2YHyLfqdkxqzjImaJn0+hLm8aZ6xEYiH+U1GgeYv9BSUemFdlkJ3uJXly3c2RnD2eLxdVFipjbznGGdQLXN6fJJHsRwcVPq2dvELBKUFl/l21n/ryXnrdM+/19MOSeL3wFqubr/tEB8B9ukAdB04t89/1O/w1cDnyilFU=';
$line_to_user = 'U53fc87e5a030c6b5e031ff381c7cec26';
$line_text = 'สวัสดี , Hello, world';


$header = [
    'Authorization: Bearer {' .$line_token. '}',  // 前準備で取得したtokenをヘッダに含める
    'Content-Type: application/json',
];

#$message = '[ { "type":"text", "text":"'.$line_text.'" }]';
#$message = '[ { "type":"sticker", "packageId":"1", "stickerId":"2" }]';
$message = '[ { "type":"text", "text":"'.$line_text.'" }, { "type":"sticker", "packageId":"1", "stickerId":"2" }]';

$curl=curl_init("https://api.line.me/v2/bot/message/push");
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_POSTFIELDS, '{ "to": "'.$line_to_user.'", "messages":'.$message.'}');
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);  // 
curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$output= curl_exec($curl);
?>

test

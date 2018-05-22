Start from xampp(ArrServ)


start URL
http://localhost/printer_management/admin_login.php
http://localhost/printer_management/login.php

DB management
http://localhost/phpmyadmin/



C:\AppServ\www\printer_management




医務室の管理システム概要

○Table
・nurse_table
ID
PW
first_name
last_name

・student_table
student_id
first_name
last_name
sex
birthday
blood_type
weight
height

・illness_history
nurse_id
student_id
datetime_come_in
datetime_go_out
illness_name
medicine
is_sent_message

・teacher
teacher_id
first_name
last_name






LINEコンソール
https://developers.line.me/console/

LINE@MANAGER
https://admin-official.line.me/

説明マニュアル
https://developers.line.me/ja/docs/messaging-api/getting-started/


channel secret : 
Channel access token : 

Channel ID: 1582505422
Channel Secret: 9c4260be9962a65a83e86ee900e3fcae

Your user ID : U53fc87e5a030c6b5e031ff381c7cec26

pcctrg-keisuke

https://pcctrg-keisuke.herokuapp.com/callback



heroku login

heroku logs --tail --app pcctrg-keisuke

cd c:\git
heroku git:clone -a pcctrg-keisuke
cd pcctrg-keisuke


https://git.heroku.com/pcctrg-keisuke.git


# どのサーバーからやっても大丈夫
curl -v -X POST https://api.line.me/v2/bot/message/push \
-H 'Content-Type:application/json' \
-H 'Authorization: Bearer {xdPwyH2YHyLfqdkxqzjImaJn0+hLm8aZ6xEYiH+U1GgeYv9BSUemFdlkJ3uJXly3c2RnD2eLxdVFipjbznGGdQLXN6fJJHsRwcVPq2dvELBKUFl/l21n/ryXnrdM+/19MOSeL3wFqubr/tEB8B9ukAdB04t89/1O/w1cDnyilFU=}' \
-d '{ "to": "U53fc87e5a030c6b5e031ff381c7cec26", "messages":[ { "type":"text", "text":"Hello, world2" }]}'

-d '{
    "to": "U53fc87e5a030c6b5e031ff381c7cec26",
    "messages":[
        {
            "type":"text",
            "text":"Hello, world2"
        }
    ]
}'


<?php

$header = [
    'Authorization: Bearer {xdPwyH2YHyLfqdkxqzjImaJn0+hLm8aZ6xEYiH+U1GgeYv9BSUemFdlkJ3uJXly3c2RnD2eLxdVFipjbznGGdQLXN6fJJHsRwcVPq2dvELBKUFl/l21n/ryXnrdM+/19MOSeL3wFqubr/tEB8B9ukAdB04t89/1O/w1cDnyilFU=}',  // 前準備で取得したtokenをヘッダに含める
    'Content-Type: application/json',
];

$curl=curl_init("https://api.line.me/v2/bot/message/push");
curl_setopt($curl, CURLOPT_POST, TRUE);
curl_setopt($curl, CURLOPT_POSTFIELDS, '{ "to": "U53fc87e5a030c6b5e031ff381c7cec26", "messages":[ { "type":"text", "text":"Hello, world2" }]}');
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, FALSE);  // オレオレ証明書対策
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, FALSE);  // 
curl_setopt($curl,CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
$output= curl_exec($curl);
?>

test

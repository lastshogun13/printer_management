<?php
include_once "lib/lib.php";

$id             = $_GET['id'];
$student_id     = $_GET['student_id'];
$teacher_id     = $_GET['teacher_id'];

#print $id;
#exit;


############# DB
#$query = "SELECT is_sent_message, first_name, last_name FROM illness_historys WHERE id = '{$id}'";

$query = <<< EOM
SELECT ih.is_sent_message, s.first_name, s.last_name 
  FROM illness_historys AS ih
  LEFT OUTER JOIN students AS s ON ih.student_id = s.id
 WHERE ih.id = '{$id}'
EOM;


if ($result = $mysqli->query($query)) {
	$row = $result->fetch_assoc();
	$is_sent_message = $row["is_sent_message"];
	$student_name  = $row["first_name"] . ' ' . $row["last_name"];
#	echo($id . "_" . $is_sent_message);
	if($is_sent_message == 1){
		$new_is_sent_message = 0;
		$line_text = $student_name . ' is not illness.';
	} else {
		$new_is_sent_message = 1;
		$line_text = $student_name . ' is staying in medical office.';
	}
} else {
	$new_is_sent_message = 0;
	$line_text = 'student is not illness.';
}

$query = "SELECT first_name, last_name FROM teachers WHERE id = '{$teacher_id}'";
#echo($query);

if ($result = $mysqli->query($query)) {
	$row = $result->fetch_assoc();
	$teacher_name  = $row["first_name"] . ' ' . $row["last_name"];
	$line_text = $teacher_name . ', ' . $line_text;
}


############# LINE

$line_token = 'xdPwyH2YHyLfqdkxqzjImaJn0+hLm8aZ6xEYiH+U1GgeYv9BSUemFdlkJ3uJXly3c2RnD2eLxdVFipjbznGGdQLXN6fJJHsRwcVPq2dvELBKUFl/l21n/ryXnrdM+/19MOSeL3wFqubr/tEB8B9ukAdB04t89/1O/w1cDnyilFU=';
$line_to_user = 'U53fc87e5a030c6b5e031ff381c7cec26';
#$line_text = 'สวัสดี , Hello, world';


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




############# DB
// mysqli
$query = "
UPDATE illness_historys SET is_sent_message='{$new_is_sent_message}' WHERE id='{$id}';
";

if( $mysqli->query( $query ) ) {
#	echo '成功';
}
else {
#	echo '失敗';
}
$mysqli->close();


$url = "/printer_management/admin_history_list.php?student_id=$student_id";
header("Location: {$url}");
exit;
?>

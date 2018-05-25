<?php
include_once "lib/lib.php";


$student_id     = $_POST['student_id'];
$nurse_id      = $_POST['nurse_id'];
$datetime_come_in    = $_POST['datetime_come_in'];
$datetime_go_out     = $_POST['datetime_go_out'];
$illness_name    = $_POST['illness_name'];
$medicine    = $_POST['medicine'];

#print $id;
#exit;

// mysqli
$query = <<< EOM
INSERT INTO `illness_historys` 
(`student_id`, `nurse_id`, `datetime_come_in`, `datetime_go_out`, `illness_name`, `medicine`, `is_sent_message`, `created_at`, `updated_at`) 
VALUES 
('$student_id', '$nurse_id', '$datetime_come_in', '$datetime_go_out', '$illness_name', '$medicine', 0, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
EOM;

#echo $query;
#exit;

if( $mysqli->query( $query ) ) {
#	echo 'INSERT成功';
}
else {
#	echo 'INSERT失敗';
}
$mysqli->close();


$url = "/printer_management/admin_history_list.php?student_id=$student_id";
header("Location: {$url}");
exit;
?>

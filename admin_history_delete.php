<?php
include_once "lib/lib.php";

$id            = $_GET['id'];
$student_id    = $_GET['student_id'];

#print $id;
#exit;

// mysqli
$query = "
DELETE FROM illness_historys 
WHERE id = $id;
";

if( $mysqli->query( $query ) ) {
#	echo 'DELETE成功';
}
else {
#	echo 'DELETE失敗';
}
$mysqli->close();


$url = "/printer_management/admin_history_list.php?student_id=$student_id";
header("Location: {$url}");
exit;
?>

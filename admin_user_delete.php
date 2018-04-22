<?php
include_once "lib/lib.php";

$id            = $_GET['id'];

#print $id;
#exit;

// mysqli
$query = "
DELETE FROM students 
WHERE id = $id;
";

if( $mysqli->query( $query ) ) {
#	echo 'DELETE成功';
}
else {
#	echo 'DELETE失敗';
}
$mysqli->close();


$url = '/printer_management/admin_user_list.php';
header("Location: {$url}");
exit;
?>

<?php
include_once "lib/lib.php";

$id            = $_GET['id'];

#print $id;
#exit;


$query = "SELECT is_paid FROM print_historys WHERE id = '{$id}'";
#echo($query);

if ($result = $mysqli->query($query)) {
	$row = $result->fetch_assoc();
	$is_paid = $row["is_paid"];
	echo($id . "_" . $is_paid);
	if($is_paid == 1){
		$new_is_paid = 0;
	} else {
		$new_is_paid = 1;
	}
} else {
	$new_is_paid = 0;
}


// mysqli
$query = "
UPDATE print_historys SET is_paid='{$new_is_paid}' WHERE id='{$id}';
";

if( $mysqli->query( $query ) ) {
#	echo '成功';
}
else {
#	echo '失敗';
}
$mysqli->close();


$url = '/printer_management/admin_history_list.php';
header("Location: {$url}");
exit;
?>

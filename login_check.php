<?php
include_once "lib/lib.php";


$input_id    = $_POST['input_id'];
$input_pw    = $_POST['input_password'];
$remember_me = $_POST['remember_me'];
echo($input_id);
echo($input_pw);
echo($remember_me);

// mysqli
$query = "SELECT * FROM students WHERE login_key = '{$input_id}'";
echo($query);
 	
if ($result = $mysqli->query($query)) {
	$row = $result->fetch_assoc();
	$password = $row["password"];
	echo($password . "_" . $input_pw);
 	if($password != $input_pw){
		echo("Failed login.\n");
		exit;
	}
	
}else{
	echo("Table mysqli select failed.\n");
    exit;
}

$url = '/printer_management/list.php';
header("Location: {$url}");
exit;
?>

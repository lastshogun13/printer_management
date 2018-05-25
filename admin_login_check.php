<?php
include_once "lib/lib.php";


$input_id    = $_POST['input_id'];
$input_pw    = $_POST['input_password'];
#$remember_me = $_POST['remember_me'];
#echo($input_id);
#echo($input_pw);
#echo($remember_me);

$is_success = check_login($mysqli, $input_id, $input_pw);

if(!$is_success){
	echo("Login failed.\n");
	exit;
}

$url = '/printer_management/admin_user_list.php';
header("Location: {$url}");
exit;
?>

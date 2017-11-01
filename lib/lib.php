<?php
// mysqli
$mysqli = new mysqli("localhost", "root", "aaaaaaaa", "printer_manage");



function check_login($mysqli, $input_id, $input_pw){
	// mysqli
	$query = "SELECT * FROM students WHERE login_key = '{$input_id}'";
	#echo($query);

	if ($result = $mysqli->query($query)) {
		$row = $result->fetch_assoc();
		$password = $row["password"];
	#	echo($password . "_" . $input_pw);
		if($password != $input_pw){
			return false;
		}
	} else {
		return false;
	}
	return true;
}


?>

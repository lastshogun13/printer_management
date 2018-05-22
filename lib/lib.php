<?php
// mysqli
$mysqli = new mysqli("localhost", "root", "12345678", "medical_office_management");



function check_login($mysqli, $input_id, $input_pw){
	// mysqli
	$query = "SELECT * FROM nurses WHERE login_key = '{$input_id}'";
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


function check_admin_login($mysqli, $input_id, $input_pw){
	if($input_id == 'admin' && $input_pw == 'admin'){
		return true;
	}
	return false;
}


?>

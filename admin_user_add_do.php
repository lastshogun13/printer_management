<?php
include_once "lib/lib.php";


$id            = $_POST['id'];
$login_key     = $_POST['login_key'];
$password      = $_POST['password'];
$first_name    = $_POST['first_name'];
$last_name     = $_POST['last_name'];
$class_name    = $_POST['class_name'];

#print $id;
#exit;

// mysqli
$query = "
INSERT INTO students (
  id,
  login_key,
  password,
  first_name,
  last_name,
  class_name
)
VALUES
(
   '$id',
   '$login_key',
   '$password',
   '$first_name',
   '$last_name',
   '$class_name'
)
";

if( $mysqli->query( $query ) ) {
#	echo 'INSERT成功';
}
else {
#	echo 'INSERT失敗';
}
$mysqli->close();


$url = '/printer_management/admin_user_list.php';
header("Location: {$url}");
exit;
?>

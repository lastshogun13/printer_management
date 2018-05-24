<?php
include_once "lib/lib.php";


$id             = $_POST['id'];
$first_name     = $_POST['first_name'];
$last_name      = $_POST['last_name'];
$class_name     = $_POST['class_name'];
$student_number = $_POST['student_number'];
$sex            = $_POST['sex'];
$birthday       = $_POST['birthday'];
$blood_type     = $_POST['blood_type'];
$height         = $_POST['height'];
$weight         = $_POST['weight'];


#print $id;
#exit;

// mysqli
$query = "
INSERT INTO students (
  id,
  first_name,
  last_name,
  class_name,
  student_number,
  sex,
  birthday,
  blood_type,
  height,
  weight
)
VALUES
(
   '$id',
   '$first_name',
   '$last_name',
   '$class_name',
   '$student_number',
   '$sex',
   '$birthday',
   '$blood_type',
   '$height',
   '$weight'
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

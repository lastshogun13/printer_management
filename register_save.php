<?php
$student_id = $_POST['student_id'];
$first_name = $_POST['first_name'];
$last_name  = $_POST['last_name'];
$room_name  = $_POST['room_name'];
$page_count = $_POST['page_count'];
$datetime   = $_POST['datetime'];



// mysqli
$mysqli = new mysqli("localhost", "root", "", "printer_manage");

$query = "INSERT INTO `print_historys`(`student_id`, `first_name`, `last_name`, `room_name`, `page_count`, `is_paid`, `created_at`, `updated_at`) VALUES ('" . $student_id . "','" . $first_name . "','" . $last_name . "','" . $room_name . "'," . $page_count . ",0,'" . $datetime . "', CURRENT_TIMESTAMP)";
#echo($query);

if ($mysqli->query($query) !== TRUE) {
    echo("Table mysqli insert failed.\n");
    exit;
}

$url = '/printer_management/list.php';
header("Location: {$url}");
exit;
?>

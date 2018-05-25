<?php
include_once "lib/lib.php";

$filepath = "db_dump/Book1.csv";


/*
$file_handler = fopen($filepath, "r");
while($line = fgetcsv($file_handler)){
	# 読み込んだ結果を表示します。
	var_dump($line);
}
fclose($file_handler);

*/

$file_handler = fopen($filepath, "r");
$i = 0;
while($line = fgetcsv($file_handler)){
	# 読み込んだ結果を表示します。
	#var_dump($line);
	if($i == 0){ next; }
	$query = <<< EOM
INSERT INTO `students` 
(`first_name`, `last_name`, `student_number`, `class_name`, `sex`) 
VALUES 
('$line[0]', '$line[1]', '$line[2]', '$line[3]', '$line[4]');
EOM;
	echo $query;
	$mysqli->query( $query );
	$i ++;
}
fclose($file_handler);


?>
complete2

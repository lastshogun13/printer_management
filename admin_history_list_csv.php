<?php
include_once "lib/lib.php";

$student_id     = $_GET['student_id'];

if($student_id > 0){
  $where = " WHERE s.id = $student_id";
} else {
  $where = "";
}


$query = <<< EOM
SELECT ih.id, ih.datetime_come_in, ih.datetime_go_out, ih.illness_name, ih.medicine, ih.is_sent_message, 
       s.id AS s_id, s.class_name AS s_class_room, s.student_number AS s_number, s.first_name, s.last_name,
       n.id AS n_id, n.first_name AS nf_name, n.last_name AS nl_name
  FROM illness_historys AS ih 
  LEFT OUTER JOIN students AS s ON ih.student_id = s.id
  LEFT OUTER JOIN nurses AS n ON ih.nurse_id = n.id
$where
 ORDER BY ih.datetime_come_in DESC, ih.id
EOM;


$data = [];
if ($result = $mysqli->query($query)) {
	while ($row = $result->fetch_assoc()) {
		$one = [];
		$one[] = $row["datetime_come_in"];
		$one[] = $row["datetime_go_out"];
		$one[] = $row["s_class_room"];
		$one[] = $row["first_name"];
		$one[] = $row["last_name"];
		$one[] = $row["nf_name"];
		$one[] = $row["nl_name"];
		$one[] = $row["illness_name"];
		$one[] = $row["medicine"];
		$data[] = $one;
	}
}




#$data = [
#    ['ID', '名前', '年齢'],
#    ['1', '田中', '30'],
#    ['2', '小林', '26'],
#    ['3', '江口', '32']
#];


$filepath = 'temp.csv';

$fp = fopen($filepath, 'w');
 
foreach ($data as $line) {
	fputcsv($fp, $line);
}
 
fclose($fp);


// HTTPヘッダを設定
header('Content-Type: application/octet-stream');
header('Content-Length: '.filesize($filepath));
header('Content-Disposition: attachment; filename=download.csv');

echo pack('C*',0xEF,0xBB,0xBF);

// ファイル出力
readfile($filepath);

?>

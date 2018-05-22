<?php
include_once "lib/lib.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>drawer test</title>

    <link rel="stylesheet" href="css/drawer.min.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  </head>

<body class="drawer drawer--left">
  <header role="banner">
    <button type="button" class="drawer-toggle drawer-hamburger">
      <span class="sr-only">toggle navigation</span>
      <span class="drawer-hamburger-icon"></span>
    </button>
    <nav class="drawer-nav" role="navigation">
      <ul class="drawer-menu">
        <li><a class="drawer-brand" href="admin_history_list.php">History</a></li>
        <li><a class="drawer-brand" href="admin_user_list.php">User</a></li>
      </ul>
    </nav>
  </header>
  <main role="main">
    <!-- Page content -->

<div class="container">

	<a class="btn btn-primary" href="admin_history_add.php" role="button">History Add</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>datetime_come_in</th>
        <th>datetime_go_out</th>
        <th>student_name</th>
        <th>nurse_name</th>
        <th>illness_name</th>
        <th>medicine</th>
        <th>is_sent_message</th>
      </tr>
    </thead>
    <tbody>

<?php
$query = <<< EOM
SELECT * FROM teachers ORDER BY id
EOM;

$teachers = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
		$teachers[$row["id"]] = $row["first_name"] . " " . $row["last_name"];
	}
}



// mysqli
#$query = "SELECT * FROM illness_historys";
#$query = "SELECT ih.id, ih.datetime_come_in, ih.datetime_go_out, ih.illness_name, ih.medicine, ih.is_sent_message, s.first_name, s.last_name FROM illness_historys AS ih LEFT OUTER JOIN students AS s ON ih.student_id = s.id ORDER BY ih.id LEFT OUTER JOIN students AS s ON ih.student_id = s.id ORDER BY ih.id";

$query = <<< EOM
SELECT ih.id, ih.datetime_come_in, ih.datetime_go_out, ih.illness_name, ih.medicine, ih.is_sent_message, 
       s.id AS s_id, s.class_name AS s_class_room, s.student_number AS s_number, s.first_name, s.last_name,
       n.id AS n_id, n.first_name AS nf_name, n.last_name AS nl_name
  FROM illness_historys AS ih 
  LEFT OUTER JOIN students AS s ON ih.student_id = s.id
  LEFT OUTER JOIN nurses AS n ON ih.nurse_id = n.id
 ORDER BY ih.created_at DESC, ih.id
EOM;


if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
?>

      <tr>
        <td><?php echo($row["id"]); ?></td>
        <td><?php echo($row["datetime_come_in"]); ?></td>
        <td><?php echo($row["datetime_go_out"]); ?></td>
        <td><?php echo($row["first_name"]); ?> <?php echo($row["last_name"]); ?> (<?php echo($row["s_class_room"]); ?> <?php echo($row["s_number"]); ?>)</td>
        <td><?php echo($row["nf_name"]); ?> <?php echo($row["nl_name"]); ?> (<?php echo($row["n_id"]); ?>)</td>
        <td><?php echo($row["illness_name"]); ?></td>
        <td><?php echo($row["medicine"]); ?></td>
        <td><?php if($row["is_sent_message"] == 1){ echo("sent"); }else{ echo("not yet"); } ?></td>
        <td>
        <form action="admin_history_paid_change.php" method="GET">
          <input type="hidden" name="id" value="<?php echo($row["id"]); ?>">
          <select name="teacher_id">
<?php
foreach ($teachers as $tid => $tname){
  print '<option value="'.$tid.'">'.$tname.' ('.$tid.')</option>';
}
?>
          </select>
          <input type="submit" value="send">
        </form>
      </tr>

<?php
	}

	/* 結果セットを開放します */
	$result->close();
}
?>
    </tbody>
  </table>
</div>

<!--<?php print_r($teachers)  ?>-->

  </main>

<!-- jquery & iScroll -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.min.js"></script>



    <script src="js/drawer.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.drawer').drawer();
    });
  </script>

</body>


</html>
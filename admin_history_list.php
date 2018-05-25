<?php
include_once "lib/lib.php";

$student_id     = $_GET['student_id'];



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


$query = <<< EOM
SELECT * FROM students ORDER BY id
EOM;

$students = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
		$students[$row["id"]] = "( " . $row["class_name"] . " " . $row["student_number"] . " ) " . $row["first_name"] . " " . $row["last_name"];
	}
}



?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History List</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">

  </head>

<body>
  <!-- Start Header Area -->
  <header class="default-header">
    <div class="container">
      <div class="header-wrap">
        <div class="header-top d-flex justify-content-between align-items-center">
          <div class="logo">
            <a href="."><img src="images/logo.png" alt=""></a>
          </div>
          <div class="main-menubar d-flex align-items-center">
            <nav>
              <a href="admin_user_list.php" >Student</a>
              <a href="admin_history_list.php" >History</a>
              <a href="index.php" class="logout">Logout</a>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Area -->

  <main role="main" style="padding-top: 90px;">
    <!-- Page content -->

    <div class="container">

      <form action="admin_history_list.php" method="GET">
        <div class="form-row mx-auto">
          <div class="col-3">
            <label class="sr-only" for="inlineFormInput">Student</label>
            <select class="custom-select" name="student_id" id="select_student_id">
              <option>choose student</option>
<?php
foreach ($students as $sid => $sname){
  if($sid == $student_id){
    print '<option value="'.$sid.'" selected>'.$sname.'</option>';
  } else {
    print '<option value="'.$sid.'">'.$sname.'</option>';
  }
}
?>
            </select>
          </div>
          <div class="col-2">
            <button type="submit" class="btn btn-primary mb-2">Filter</button>
          </div>
          <div class="col-7">
            <a href="admin_history_add.php?student_id=<?php echo $student_id; ?>" role="button" class="nw-btn primary-btn">Add History<span class="lnr lnr-arrow-right"></span></a>
          </div>
        </div>
      </form>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>come_in</th>
            <th>go_out</th>
            <th>student_name</th>
            <th>nurse_name</th>
            <th>illness_name</th>
            <th>medicine</th>
            <th>is_sent_message</th>
          </tr>
        </thead>
        <tbody>

<?php

// mysqli
#$query = "SELECT * FROM illness_historys";
#$query = "SELECT ih.id, ih.datetime_come_in, ih.datetime_go_out, ih.illness_name, ih.medicine, ih.is_sent_message, s.first_name, s.last_name FROM illness_historys AS ih LEFT OUTER JOIN students AS s ON ih.student_id = s.id ORDER BY ih.id LEFT OUTER JOIN students AS s ON ih.student_id = s.id ORDER BY ih.id";

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


if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
?>

          <tr>
            <td><?php echo($row["datetime_come_in"]); ?></td>
            <td><?php echo($row["datetime_go_out"]); ?></td>
            <td>(<?php echo($row["s_class_room"]); ?>) <?php echo($row["first_name"]); ?> <?php echo($row["last_name"]); ?></td>
            <td>(<?php echo($row["n_id"]); ?>) <?php echo($row["nf_name"]); ?> <?php echo($row["nl_name"]); ?></td>
            <td><?php echo($row["illness_name"]); ?></td>
            <td><?php echo($row["medicine"]); ?></td>
    <!--        <td><?php if($row["is_sent_message"] == 1){ echo("sent"); }else{ echo("not yet"); } ?></td> -->
            <td>
            <form action="admin_history_send_line.php" method="GET">
              <input type="hidden" name="id" value="<?php echo($row["id"]); ?>">
              <select name="teacher_id">
<?php
foreach ($teachers as $tid => $tname){
  print '<option value="'.$tid.'">('.$tid.') '.$tname.'</option>';
}
?>
              </select>
              <input type="submit" value="send"><?php if($row["is_sent_message"] == 1){ echo("sent"); } ?><br/>

            </form>
            <form action="admin_history_delete.php" method="GET">
              <input type="hidden" name="id" value="<?php echo($row["id"]); ?>">
              <input type="hidden" name="student_id" value="<?php echo($student_id); ?>">
              <input type="submit" value="delete">
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

      <div class="row">
        <div class="col-6">
          <a href="admin_history_add.php?student_id=<?php echo $student_id; ?>" role="button" class="nw-btn primary-btn">Add History<span class="lnr lnr-arrow-right"></span></a>
        </div>

        <div class="col-6">
          <a href="admin_history_list_csv.php?student_id=<?php echo $student_id; ?>" role="button" class="nw-btn primary-btn">Excel Output<span class="lnr lnr-arrow-right"></span></a>
        </div>
      </div>

    </div>

<!--<?php print_r($teachers)  ?>-->

  </main>

<!-- jquery & iScroll -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>


</html>
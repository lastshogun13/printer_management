<?php
include_once "lib/lib.php";


# students
$query = <<< EOM
SELECT * FROM students ORDER BY id
EOM;

$students = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
		$students[$row["id"]] = $row["first_name"] . " " . $row["last_name"];
	}
}

# nurses
$query = <<< EOM
SELECT * FROM nurses ORDER BY id
EOM;

$nurses = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
		$nurses[$row["id"]] = $row["first_name"] . " " . $row["last_name"];
	}
}

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
        <li><a class="drawer-brand" href="admin_user_list.php">Student</a></li>
      </ul>
    </nav>
  </header>
  <main role="main">
    <!-- Page content -->

<div class="container">

      <form action="admin_history_add_do.php" method="post">
        <h2 class="form-signin-heading">History add</h2>
        <label for="basic-url">student</label>
        <select class="form-control" name="student_id">
<?php
foreach ($students as $id => $name){
  print '<option value="'.$id.'">'.$name.' ('.$id.')</option>';
}
?>
        </select>
        <label for="basic-url">nurse_id</label>
        <select class="form-control" name="nurse_id">
<?php
foreach ($nurses as $id => $name){
  print '<option value="'.$id.'">'.$name.' ('.$id.')</option>';
}
?>
        </select>
        <label for="basic-url">datetime_come_in</label>
        <input type="datetime-local" class="form-control" name="datetime_come_in" min="1000-01-01" max="3000-12-31" value="<?php date_default_timezone_set('GMT');echo(strftime('%Y-%m-%dT%H:%M:%S')); ?>">
        <label for="basic-url">datetime_go_out</label>
        <input type="datetime-local" class="form-control" name="datetime_go_out" min="1000-01-01" max="3000-12-31" value="<?php date_default_timezone_set('GMT');echo(strftime('%Y-%m-%dT%H:%M:%S')); ?>">
        <label for="basic-url">illness_name</label>
        <input type="text" class="form-control" name="illness_name" placeholder="illness_name">
        <label for="basic-url">medicine</label>
        <input type="text" class="form-control" name="medicine" placeholder="medicine">

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
      </form>

</div>


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
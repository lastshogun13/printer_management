<?php
include_once "lib/lib.php";

$student_id     = $_GET['student_id'];

# students
$query = <<< EOM
SELECT * FROM students ORDER BY id
EOM;

$students = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
#		$students[$row["id"]] = $row["first_name"] . " " . $row["last_name"];
		$students[$row["id"]] = "(" . $row["class_name"] . " " . $row["student_number"] . ") " . $row["first_name"] . " " . $row["last_name"];	}
}

# nurses
$query = <<< EOM
SELECT * FROM nurses ORDER BY id
EOM;

$nurses = array();
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
#		$nurses[$row["id"]] = $row["first_name"] . " " . $row["last_name"];
		$nurses[$row["id"]] = '(' . $row["id"] . ') '  . $row["last_name"] . " " . $row["first_name"];
	}
}

?>




<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Add</title>

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
        <div class="header-top d-flex justify-content-between align-items-center" style="background-image: url(images/banner_nurse.png); width:1270px; height: 150px; ">
<!--
          <div class="logo">
            <a href="."><img src="images/logo.png" alt=""></a>
          </div>
          <div class="main-menubar d-flex align-items-center pull-right" style="width: 900px">
            <nav class="">
              <a href="admin_user_list.php" >Student</a>
              <a href="admin_history_list.php" >History</a>
              <a href="index.php" class="logout">Logout</a>
            </nav>
          </div>
-->

          <div class="container">
            <div class="row">
              <div class="col-5"></div>
              <div class="col-7">
                <nav class="">
                  <a href="admin_user_list.php" >Student</a>
                  <a href="admin_history_list.php" >History</a>
                  <a href="index.php" class="logout">Logout</a>
                </nav>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </header>
  <!-- End Header Area -->

  <main role="main" style="padding-top: 210px;">
    <!-- Page content -->

    <div class="container">

      
      <form action="admin_history_add_do.php" method="post">

        <div class="form-group row">
          <div class="col-12">
            <h2>History add</h2>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">student</label>
          <div class="col-10">
            <select class="form-control" name="student_id">
<?php
foreach ($students as $id => $name){
	if($student_id == $id){
		print '<option value="'.$id.'" selected>'.$name.'</option>';
	} else {
		print '<option value="'.$id.'">'.$name.'</option>';
	}
}
?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">nurse</label>
          <div class="col-10">
            <select class="form-control" name="nurse_id">
<?php
foreach ($nurses as $id => $name){
  print '<option value="'.$id.'">'.$name.'</option>';
}
?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">come_in</label>
          <div class="col-10">
            <input type="datetime-local" class="form-control" name="datetime_come_in" min="1000-01-01" max="3000-12-31" value="<?php date_default_timezone_set('GMT');echo(strftime('%Y-%m-%dT%H:%M:%S')); ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">go_out</label>
          <div class="col-10">
            <input type="datetime-local" class="form-control" name="datetime_go_out" min="1000-01-01" max="3000-12-31" value="<?php date_default_timezone_set('GMT');echo(strftime('%Y-%m-%dT%H:%M:%S')); ?>">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">illness_name</label>
          <div class="col-10">
            <input type="text" class="form-control" name="illness_name" placeholder="illness_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">medicine</label>
          <div class="col-10">
            <input type="text" class="form-control" name="medicine" placeholder="medicine">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-12">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
          </div>
        </div>
      </form>

    </div>

  </main>

<!-- jquery & iScroll -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
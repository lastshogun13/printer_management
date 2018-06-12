<?php
include_once "lib/lib.php";

$search_key     = $_GET['key'];



$query = <<< EOM
SELECT * FROM teachers ORDER BY id
EOM;


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student List</title>

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

      <div class="col-auto">
	      <form action="admin_user_list.php" method="get">
        <div class="input-group">
          <input type="text" name="key" class="form-control" aria-label="Text input with segmented dropdown button" placeholder="Student Name" value="<?php echo $search_key; ?>">
          <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary">Search</button>
            <button type="button" class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="#">Search</a>
            </div>
          </div>
        </div>
	      </form>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th>first name</th>
            <th>last name</th>
            <th>class</th>
            <th>number</th>
            <th>sex</th>
            <th>birthday</th>
            <th>blood</th>
            <th>weight</th>
            <th>height</th>
          </tr>
        </thead>
        <tbody>

<?php
// mysqli
if($search_key != ''){
  $where = " WHERE first_name LIKE '%$search_key%' OR first_name LIKE '%$search_key%'";
} else {
  $where = "";
}

$query = <<< EOM
SELECT *
  FROM students
$where
 ORDER BY id
EOM;


#$query = "SELECT * FROM students order by id";

if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
?>
          <tr>
            <td><?php echo($row["first_name"]); ?></td>
            <td><?php echo($row["last_name"]); ?></td>
            <td><?php echo($row["class_name"]); ?></td>
            <td><?php echo($row["student_number"]); ?></td>
            <td><?php if($row["sex"] == 1) { echo('male'); } else { echo('female'); } ?></td>
            <td><?php echo($row["birthday"]); ?></td>
            <td><?php echo($row["blood_type"]); ?></td>
            <td><?php echo($row["weight"]); ?></td>
            <td><?php echo($row["height"]); ?></td>

            <td>
              <!--<a href="admin_history_list.php?student_id=<?php echo($row["id"]); ?>">ShowHistory</a>-->
              <a href="admin_history_list.php?student_id=<?php echo($row["id"]); ?>" role="button" class="nw-btn primary-btn">ShowHistory<span class="lnr lnr-arrow-right"></span></a>
            </td>
            <td><a href="admin_user_delete.php?id=<?php echo($row["id"]); ?>">delete</a></td>
          </tr>

<?php
	}

	/* 結果セットを開放します */
	$result->close();
}
?>
        </tbody>
      </table>

      <div class="col-auto">
        <a href="admin_user_add.php" role="button" class="nw-btn primary-btn">Student Add<span class="lnr lnr-arrow-right"></span></a>
      </div>

    </div>

  </main>

<!-- jquery & iScroll -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
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

		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

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

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>date</th>
        <th>student_id</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>room_name</th>
        <th>page_count</th>
        <th>is_paid</th>
      </tr>
    </thead>
    <tbody>

<?php
// mysqli
$query = "SELECT * FROM print_historys";
if ($result = $mysqli->query($query)) {
	/* 連想配列を取得します */
	while ($row = $result->fetch_assoc()) {
?>

      <tr>
        <td><?php echo($row["student_id"]); ?></td>
        <td><?php echo($row["created_at"]); ?></td>
        <td><?php echo($row["student_id"]); ?></td>
        <td><?php echo($row["first_name"]); ?></td>
        <td><?php echo($row["last_name"]); ?></td>
        <td><?php echo($row["room_name"]); ?></td>
        <td><?php echo($row["page_count"]); ?></td>
        <td><?php if($row["is_paid"] == 1){ echo("paid"); }else{ echo("not yet"); } ?></td>
        <td><a href="admin_history_paid_change.php?id=<?php echo($row["id"]); ?>">change</a></td>
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
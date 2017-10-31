<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>register</title>

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/jquery-ui.min.css">

<!--		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"> -->

  </head>

<body>
	<div class="container">
	  <!-- Content here -->
		<form action="register_save.php" method="POST">
		  <div class="form-group">
		    <label for="exampleFormControlInput1">ID</label>
		    <input type="text" class="form-control" id="student_id" name="student_id" placeholder="12345">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">first name</label>
		    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Keisuke">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">last name</label>
		    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Minami">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlInput1">page count</label>
		    <input type="text" class="form-control" id="page_count" name="page_count" placeholder="10">
		  </div>
		  <div class="form-group">
		    <label for="exampleFormControlSelect1">room</label>
		    <select class="form-control" id="room_name" name="room_name">
		      <option>com A</option>
		      <option>com B</option>
		      <option>1001</option>
		      <option>1002</option>
		      <option>2011</option>
		    </select>
		  </div>
		  <div class="form-group">
				Date: <input type="text" id="datetime" name="datetime">
		  </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		</form>
	</div>


<!-- jquery & iScroll -->

<!--
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
-->

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/moment-with-locales.js"></script>

    <script src="js/jquery-ui.min.js"></script>

  <script>
	$(function () {
	    var dateFormat = 'yy-mm-dd';
	    $('#datetime').datepicker({
	        dateFormat: dateFormat
	    });
	});

  
  var spinner = $( "#page_count" ).spinner();
  </script>

</body>


</html>

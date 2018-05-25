<?php
include_once "lib/lib.php";
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

      <form action="admin_user_add_do.php" method="post">
        <div class="form-group row">
          <div class="col-12">
            <h2>Student add</h2>
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">first_name</label>
          <div class="col-10">
            <input type="text" class="form-control" name="first_name" placeholder="first_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">last_name</label>
          <div class="col-10">
            <input type="text" class="form-control" name="last_name" placeholder="last_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">class_name</label>
          <div class="col-10">
            <input type="text" class="form-control" name="class_name" placeholder="class_name">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">student_number</label>
          <div class="col-10">
            <input type="text" class="form-control" name="student_number" placeholder="student_number">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">sex</label>
          <div class="col-10 form-check">
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="sexRadioOptions1" name="sex" value="1">
              <label class="form-check-label" for="sexRadioOptions1">male</label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="sexRadioOptions0" name="sex" value="0">
              <label class="form-check-label" for="sexRadioOptions0">female</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">birthday</label>
          <div class="col-10">
            <input type="date" class="form-control" name="birthday" placeholder="birthday">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">blood_type</label>
          <div class="col-10 form-check">
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="blood_typeRadioOptionsA" name="blood_type" value="A">
              <label class="form-check-label" for="blood_typeRadioOptionsA">A</label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="blood_typeRadioOptionsB" name="blood_type" value="B">
              <label class="form-check-label" for="blood_typeRadioOptionsB">B</label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="blood_typeRadioOptionsO" name="blood_type" value="O">
              <label class="form-check-label" for="blood_typeRadioOptionsO">O</label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" id="blood_typeRadioOptionsAB" name="blood_type" value="AB">
              <label class="form-check-label" for="blood_typeRadioOptionsAB">AB</label>
            </div>
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">height</label>
          <div class="col-10">
            <input type="text" class="form-control" name="height" placeholder="height">
          </div>
        </div>

        <div class="form-group row">
          <label for="basic-url" class="col-2 col-form-label">weight</label>
          <div class="col-10">
            <input type="text" class="form-control" name="weight" placeholder="weight">
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMV<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
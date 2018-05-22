<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>drawer test</title>

    <link rel="stylesheet" href="css/drawer.min.css">

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


    <link rel="stylesheet" href="css/signin.css">

  </head>

<body class="drawer drawer--left">
  <main role="main">
    <!-- Page content -->


      <form class="form-signin" action="admin_login_check.php" method="post">
        <h2 class="form-signin-heading">Please sign in admin account</h2>
        <label for="input_id" class="sr-only">ID</label>
        <input type="text" id="input_id" name="input_id" class="form-control" placeholder="ID" required autofocus>
        <label for="input_password" class="sr-only">Password</label>
        <input type="password" id="input_password" name="input_password" class="form-control" placeholder="Password" required>
<!--
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember_me" value="remember-me"> Remember me
          </label>
        </div>
-->
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>



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
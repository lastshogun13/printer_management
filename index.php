<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signin.css">

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
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- End Header Area -->



  <main role="main" style="padding-top: 90px;">
    <!-- Page content -->

    <div class="container">
        <div class="row fullscreen align-items-center justify-content-center">
          <div class="banner-content col-lg-8 col-md-12">
            <h1 class="text-uppercase">
              Medical Office Management System<br/>
              ระบบจัดการห้องพยาบาล
            </h1>
            <p>
              Please sign in admin account<br>
              โปรดล็อคอินเข้าสู่ระบบ
            </p>
            <form class="form-signin" action="admin_login_check.php" method="post">
              <label for="input_id" class="sr-only">ID</label>
              <input type="text" id="input_id" name="input_id" class="form-control" placeholder="ID" required autofocus>
              <label for="input_password" class="sr-only">Password</label>
              <input type="password" id="input_password" name="input_password" class="form-control" placeholder="Password" required>
              <button class="nw-btn primary-btn" type="submit">Sign in<span class="lnr lnr-arrow-right"></span></button>

            </form>
          </div>
          <div class="col-lg-4 d-flex align-self-end img-right">
            <img src="images/nurse.png" class="" style="width:100%; height: 100%;" alt="">

          </div>
        </div>
    </div>

  </main>

<!-- jquery & iScroll -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>


</html>
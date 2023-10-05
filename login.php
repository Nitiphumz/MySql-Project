<?php session_start(); ?>



<html>
<head>
<title> Login </title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body>

<body background="bg1.jpg">

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Login Account ʕ•ᴥ•ʔ</h2>

              <form name="form1" method="post" action="check_login.php">

              <?php if(isset($_SESSION['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php 
                        echo $_SESSION['error'];
                        unset($_SESSION['error']);
                    ?>
                </div>
              <?php } ?>
              <?php if(isset($_SESSION['success'])) { ?>
                <div class="alert alert-success" role="alert">
                    <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                    ?>
                </div>
              <?php } ?>

                <div class="form-outline mb-4">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input name="username" type="text" class="form-control" id="username">
                </div>

                <div class="form-outline mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="password">
                </div>

                <div class="d-flex justify-content-center">
                <button type="submit" name="Submit" class="btn btn-primary btn-block btn-lg " >Login</button>  &nbsp; 
                <a href="Register.php" class="btn btn-secondary btn-block btn-lg">Cancel</a>  &nbsp; 
                </div>

                <p class="text-center text-muted mt-5 mb-0">You dont have account? <a href="register.php"
                    class="fw-bold text-body"><u>register here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
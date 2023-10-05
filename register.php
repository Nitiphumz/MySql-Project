<html>
<head>
<title>Register</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>
<body background="bg1.jpg">

<section class="vh-100 bg-image">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account ᕦʕ •ᴥ•ʔᕤ </h2>

              <form name="form1" method="post" action="save_register.php">

                <div class="form-outline mb-4">
                <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input name="username" type="text" class="form-control" id="username">
                </div>

                <div class="form-outline mb-4">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>

                <div class="form-outline mb-4">
                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input name="txtConPassword" type="password" class="form-control" id="txtConPassword">
                </div>

                <div class="form-outline mb-4">
                <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email">
                </div>

                <div class="d-flex justify-content-center">
                <button type="submit" name="Submit" class="btn btn-success btn-block btn-lg " >Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

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

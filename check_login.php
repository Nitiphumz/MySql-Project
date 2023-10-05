<html>
<head>
<title>Check Login</title>
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
              <h2 class="">Login Account ʕ ˵• ₒ •˵ ʔ</h2>



<?php
//session_start();
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "reserve";
 
$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
 
$strSQL = "SELECT * FROM user WHERE username = '".mysqli_real_escape_string($objCon,$_POST['username'])."'
and password = '".mysqli_real_escape_string($objCon,$_POST['password'])."'";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);
if(!$objResult)
{
echo "Username and Password Incorrect!";
}
else
{
$_SESSION["userid"] = $objResult["userid"];
$_SESSION["status"] = $objResult["status"];
 session_write_close();

if($objResult["status"] == "admin")
{
header("location:admin_page.php");
}
else
{
header("location:user_page.php");
}
}
mysqli_close($objCon);
?>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
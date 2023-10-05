<html>
<head>
<title>Check Register</title>
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
              <h2 class="">Register Account ʢᵕᴗᵕʡ</h2>


<?php
$serverName = "localhost";
$userName = "root";
$userPassword = "";
$dbName = "reserve";
 
$objCon = mysqli_connect($serverName,$userName,$userPassword,$dbName);
 
if(trim($_POST["username"]) == "")
{
echo "Please input Username!";
exit();
}
 
if(trim($_POST["password"]) == "")
{
echo "Please input Password!";
exit();
}  
 
if($_POST["password"] != $_POST["txtConPassword"])
{
echo "Password not Match!";
exit();
}

if(trim($_POST["email"]) == "")
{
echo "Please input Email!";
exit();
}  

 
$strSQL = "SELECT * FROM user WHERE username = '".trim($_POST['username'])."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery,MYSQLI_ASSOC);

if($objResult)
{
 echo "Username already exists!"; 
}
else
{  
 
$strSQL = "INSERT INTO user (username,password,email) VALUES ('".$_POST["username"]."',
'".$_POST["password"]."','".$_POST["email"]."')";
$objQuery = mysqli_query($objCon,$strSQL);
 echo "Register Completed!<br>";      
 
echo "<br> Go to <a href='login.php'>Login page</a>";
 
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
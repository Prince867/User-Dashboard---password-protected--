<?php

$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'connect.php';
$username= $_POST["username"];
$password= $_POST["password"];
$cpassword = $_POST["cpassword"];
if(($password == $cpassword)){
$sql="INSERT INTO `users`( `username`, `password`, `current`) VALUES ('$username', '$password', current_timestamp())";

$result = mysqli_query($con, $sql);
if ($result){
    $showAlert = true;
            }
                              } 
else{
$showError = "Passwords do not match";
    }
}

?>



<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php include 'main.php' ?>

  <?php
 
 if($showAlert){
 echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Success!</strong> You are logged in
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div> ';
 }
 if($showError){
 echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong>Error!</strong> '. $showError.'
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
     </button>
 </div> ';
 }
 
?>
<form action="signup.php"  method="post">
    <div class="card p-3 d-flex justify-content-center my-3" style="width: 20rem; margin:auto;" >
  <div class="form-group center">
    <label for="exampleInputEmail1">Email address</label>
    <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="cpassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <!-- <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div> -->
  <div class="form-check">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>

</form>
</body>
</html>


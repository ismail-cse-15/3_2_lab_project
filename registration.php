<?php

session_start();


if(isset($_SESSION['email'])){
  header("Location:profile.php");
}
require_once("config.php");

require_once("time.php");


if(isset($_POST['submit']))
{
$name=$_POST['name'];
// $u_name=$_POST['u_name'];
$email=$_POST['email'];
$p_word=$_POST['password'];
$c_word=$_POST['c_password'];
$hall_name=$_POST['hall_name'];
$designation=$_POST['designation'];
$hall_name=base64_encode($hall_name);
//echo "outside $designation <br>";

if($p_word==$c_word){

  $hash =password_hash($p_word,PASSWORD_BCRYPT);
  // echo "<br>";
  // echo "hassing complete";
  $name=base64_encode($name);
  // $u_name=base64_encode($u_name);
  $email=base64_encode($email);
 // if ($designation == "stuff") {
   $designation=base64_encode($designation);
$access=0;
$query="INSERT into registration values(' ','$name','$designation','$hash',
  '$email','$hall_name','$access')";
$send=mysqli_query($connection,$query) or die(mysqli_error($connection));
header("Location:login.php?registration=done");


  }
   else {
     echo "password does not match";
    header("Location:login.php?unregistration=1");
   }




}



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
     rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta charset="utf-8">
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="Styles/login.css">

<style media="screen">
  .h1{
    font-size: 14px;
    color: white;
  }
  .header{
    position: relative;
    margin: 0px;
    padding: 0px;
    background: #008B8B;
    width: 100%;
    top: 0px;
    left: 0px;
  }
  .date{

    text-align: right;
  }
  .h4{
    color: white;
  }

</style>
<title style="image:">
     RUET Hall Management System
</title>
     <link rel="icon" href="images/favicon.ico" type="image/x-icon">
   </head>
   <body>

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <img class="img-responsive" src="images/ruet (1).png" alt="Rajshahi University of Engineering and Technology">

      </div>

      <div class="col-md-3">
        <h4 class="date"><?php echo "$day-$month-$year"; ?></h4>
           <h4 class="date"> <?php echo "$day1"; ?></h4>
      </div>
    </div>
  </div>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">RUET Hall Management</a>

<ul class="navbar-nav">
 <li class="nav-item active">
   <a class="nav-link" href="home.php">Home </a>
 </li>
 <li class="nav-item " style="align:right">
   <a class="nav-link" href="login.php">Login</a>
 </li>
 <li class="nav-item">
   <a class="nav-link active" href="">Registration</a>
 </li>

</ul>
<!-- </div> -->
</nav>


     <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">



            </div>





    <div class="col-md-9 register-right">

<h3 class="text-center">Registration Form</h3>

<form class="" action="registration.php" method="post">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">

        <input type="text" class="form-control" placeholder="Name*" name="name" required>
        </div>

        <div class="form-group">

        <input type="email" name="email" class="form-control" placeholder="Your email*" value="" required>
        </div>
        <div class="form-group">


          <select class="form-control " id="sel1" name="designation"   required>
            <option value="" disabled selected hidden>Designation*</option>
          <option value="Professor">Professor</option>
            <option value="Associate professor">Associate professor</option>
              <option value="Assistent professor">Assistent professor</option>
              <option value="Lecturer">Lecturer</option>
              <option value="Office stuff">Hall Officer</option>


          </select>
        </div>
      </div>


      <div class="col-md-6">
        <div class="form-group">

    <select class="form-control " id="sel1" name="hall_name"  required>
    <option value="" disabled selected hidden>For which hall*</option>
    <option value="Shahid Lt. Selim Hall">Shahid Lt. Selim Hall</option>
    <option value="Shahid Shahidul Islam Hall">Shahid Shahidul Islam Hall</option>
    <option value="Shahid Abdul Hamid Hall">Shahid Abdul Hamid Hall</option>
    <option value="Tin Shed Hall">Tin Shed Hall</option>
    <option value="Deshratna Sheikh Hasina Hall">Deshratna Sheikh Hasina Hall</option>
    <option value="Shahid President Ziaur Rahman Hall">Shahid President Ziaur Rahman Hall</option>
    <option value="Bangabandhu Sheikh Mujibur Rahman Hall">	Bangabandhu Sheikh Mujibur Rahman Hall</option>

    </select>
    </div>
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Password*" value="" required>
        </div>
        <div class="form-group">
          <input type="password" class="form-control" name="c_password" placeholder="Confirm password*" value="" required>
        </div>
      </div>
    </div>


    <div class="row">
    <div class="col-md-6">
      <input type="submit" name="submit" class="btn btn-success btn-lg" value="Submit" >
    </div>

      <div class="col-md-6">
        <input type="submit" name="reset" class="btn btn-danger btn-lg" value="Reset" >
      </div>

    </div>
    <div class="alert alert-success form-group center">
      <strong >Already a member?</strong>
    <a href="login.php">Log in</a>

    </div>

  </div>





</form>




   </div>
    </div>
  </div>





             <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
     <script src="js/bootstrap.min.js"></script>


    </body>
 </html>

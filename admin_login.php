<?php
session_start();


// if(isset($_SESSION['email'])){
//   header("Location:profile.php");
// }
require_once("config.php");
require_once("time.php");
if(isset($_POST['submit'])){
$admin_password=$_POST['admin_password'];
echo "$admin_password";
$query="SELECT  password from admin ";
$send=mysqli_query($connection,$query) or die(mysqli_error($connection));
$result=mysqli_fetch_array($send);

if($result['password']==$admin_password)
{
  echo "in";
  header("Location:admin.php");
}
else {
  echo "$message";
  $message = "Password doesn't match";
echo "<script type='text/javascript'>alert('$message');</script>";

}
}
 ?>

 <!DOCTYPE html>
 <html>
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
  .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.login_box{
  padding-left: 50px;
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php">Home </a>
      </li>
      <li class="nav-item active" style="align:right">
        <a class="nav-link" href="">Login</a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li> -->

    </ul>
  </div>
</nav>
<?php
 if(isset($_GET['missmass']))
 {
 echo '  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times</button>
    <strong>Wrong data!</strong>Please try again.
  </div>';


 }
unset($_GET['missmass']);



// if(isset($_GET['registation']))
// {
// echo ' <div class="alert alert-success alert-dismissible">
//     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
//     <strong>Successfully Sign up</strong>
//   </div>';
//
// }
 ?>

<br>
     <br>
     <br>
<div class="container div col-md-4 " >

    <div class="container col-md-12 center">
      <img src="images/lonin.png" alt="login_logo"
      class="img img-circle center"style="width:20%">
    </div>

    <div class=""style="margin:0 auto;">
      <form class="" action="admin_login.php" method="post">
 <!--
      <div class="form-group">

        <input type="email" name="email" class="form-control" placeholder="Enter email" value=""required>

      </div> -->
      <div class="form-group">

        <input type="password" name="admin_password" class="form-control" placeholder="Enter password" value=""required>
      </div>
      <!-- <div class="form-group">
        <select class="form-control " id="sel1" name="designation"   required>
          <option value="" disabled selected hidden>Designation</option>
        <option value="Professor">Professor</option>
          <option value="Associate professor">Associate professor</option>
            <option value="Assistent professor">Assistent professor</option>
            <option value="Lecturer">Lecturer</option>
            <option value="stuff">Hall Officer</option>


        </select>
      </div> -->
      <button type="submit" name="submit"
      class=" btn btn-success btn-lg btn-block">Login
      </button>



      </form>
    </div>


  </div>



   </body>
 </html>

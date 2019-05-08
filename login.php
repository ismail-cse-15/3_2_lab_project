<?php
session_start();

// echo phpinfo();
if(isset($_SESSION['email'])){
  header("Location:profile.php");
}
require_once("config.php");
require_once("time.php");

if(isset($_POST['b2'])){


  $email=$_POST['email'];
  $password=$_POST['password'];
  $designation=$_POST['designation'];

    // echo "$email <br> $password <br> $designation <br>";
  // $password=base64_encode($password);
  $email=base64_encode($email);
  // echo "$email";

  $query="SELECT * from registration WHERE email='$email' ";
  $send=mysqli_query($connection,$query) ;
  $result=mysqli_fetch_array($send);
  $total=$result[0];
  $name1=base64_decode($result['name']);
  $email1=base64_decode($result['email']);
  $designation1=base64_decode($result['designation']);
  $hall_name1=base64_decode($result['hall_name']);
  $access=$result['access'];
  $password1=$result['password'];


// echo "$name1 <br> $email1 <br> $designation1 <br> $hall_name1 <br>";
// echo "$access <br> $total ";
//$2y$10$P5EWR3eGOUY..QMc0xKSh.oe9v98wgRh/0Rq8YBnb3vHItTG2nl9y
 // echo "1: $password2 <br>";
 // echo "2: $password2 <br>";

  if ($result[0]==0) {

     unset($_POST['b2']);
     header("Location:Login.php?row=1");
     exit();
    echo "not found";
  }
if ($result['access']==0) {
    unset($_POST['b2']);
    header("Location:Login.php?permit=1");
    exit();
  echo "not permitted <br>";
  }
  if(($result['access']==1)){

echo "permitted <br>";

    if(password_verify($password,$result['password'])){



    $_SESSION['name']=$name1;
    $_SESSION['email']=$email1;
    $_SESSION['hall_name']=$hall_name1;
    $_SESSION['designation']=$designation1;
     echo "password : $password <br>";
  header("Location:profile.php?success=1");

 }
 else{
   // unset($_POST['b2']);
   // header("Location:Login.php?missmass=1");
   // exit();
 echo "not match <br>";
 }
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
      <li class="nav-item">
        <a class="nav-link" href="registration.php">Registration</a>
      </li>

    </ul>
  </div>
</nav>
<?php
if(isset($_GET['row']))
{
  echo '<script language="javascript">';
echo 'alert("You are not a member")';
echo '</script>';
}

if(isset($_GET['permit']))
{
  echo '<script language="javascript">';
echo 'alert("You are not permitted")';
echo '</script>';
}






if(isset($_GET['registration']))
{
  echo '<script language="javascript">';
echo 'alert("You are registered Successfully.Wait for admin permission. ")';
echo '</script>';

}
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
      <form class="" action="login.php" method="post">

      <div class="form-group">

        <input type="email" name="email" class="form-control" placeholder="Enter email" value=""required>

      </div>
      <div class="form-group">

        <input type="password" name="password" class="form-control" placeholder="Enter password" value=""required>
      </div>
      <div class="form-group">
        <select class="form-control " id="sel1" name="designation"   required>
          <option value="" disabled selected hidden>Designation</option>
        <option value="Professor">Professor</option>
          <option value="Associate professor">Associate professor</option>
            <option value="Assistent professor">Assistent professor</option>
            <option value="Lecturer">Lecturer</option>
            <option value="Office stuff">Hall Officer</option>


        </select>
      </div>
      <button type="submit" name="b2"
      class=" btn btn-success btn-lg btn-block">Login
      </button>
      <div class="alert alert-success form-group">
        <strong>Not a member?</strong>
      <a href="registration.php">Sign Up</a>

      </div>


      </form>
    </div>


  </div>



   </body>
 </html>

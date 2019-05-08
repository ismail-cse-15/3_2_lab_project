<?php
require_once("config.php");
require_once("time.php");
session_start();
if(!isset($_SESSION['email'])){

  header("Location:login.php");
}
else {
  $name=$_SESSION['name'];
  $email=$_SESSION['email'];
  $hall_name=$_SESSION['hall_name'];
  $designation=$_SESSION['designation'];




  $_SESSION['name']=$name;
  $_SESSION['email']=$email;
  $_SESSION['hall_name']=$hall_name;
  $_SESSION['designation']=$designation;

}


 ?>
 <!DOCTYPE html>
 <html>
   <head>


 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

   .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

/* a {
  text-decoration: none;
  font-size: 22px;
  color: black;
} */

button:hover, a:hover {
  opacity: 0.7;
}

.panel_box{

 margin-top: 10px;

}
.active{
color: red;
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




<div class="container col-md-4">



  <div class="panel panel-info panel_box">

   <div class="panel-body panel_text" >
     <ul >
       <li ><a href="home.php">Home</a></li>
       <li ><a href="profile.php" class="active">Profile</a></li>
       <li>
         <?php if($designation=="Office stuff"){
             echo '<a  href="hall_office.php">Applicant</a>';
             }
             else {
               echo '<a href="eligible.php">Eligible Applicant</a>';
             }  ?>

       </li>
     <li >
       <?php
       if($designation=="Office stuff"){
         if($hall_name=="Shahid Abdul Hamid Hall" ){
          echo '<a  href="hamid.php">Allotment</a>';
         }
         elseif ($hall_name=="Shahid Shahidul Islam Hall") {
           echo '<a  href="shahidul.php">Allotment</a>';
         }
         elseif ($hall_name=="Tin Shad Hall") {
           echo '<a  href="tin.php">Allotment</a>';
         }
         elseif ($hall_name=="Shahid President Ziaur Rahman Hall") {
           echo '<a  href="zia.php">Allotment</a>';
         }
         elseif ($hall_name=="Bangubandhu Shekh Mujibor Rahman Hall") {
           echo '<a  href="bangabandhu.php">Allotment</a>';
         }

         elseif ($hall_name=="Shahid Lt. Selim Hall") {
          echo '<a  href="selim.php">Allotment</a>';
         }
         elseif ($hall_name=="Deshratna Shekh Hasina Hall") {
           echo '<a  href="lh.php">Allotment</a>';
         }
         else {

         }
       }
       else {
        echo '<a  href="office_activity.php">Hall office</a>';
       }

   ?>
     </li>



       <li ><?php
       if ($designation=="Office stuff") {
         echo'<a  href="select.php">Selected Applicant</a>';
       }
       else {
         echo'<a  href="allotment.php">Room allocation</a>';
       }

        ?>
       </li>

       <?php
       if ($designation=="Office stuff") {
         echo'<li ><a  href="cancel.php">Seat cancel</a></li>';
       }


        ?>


       <?php
      if ($designation=="Office stuff") {
     echo ' <li><a  href="notice.php">Notice</a></li>';
   }
        ?>

       <li><a href="logout.php">Logout</a>
       </li>
     </ul>
 </div>
 </div>
</div>

<?php
if(isset($_GET['success']))
{

  echo '<script language="javascript">';
echo 'alert("Welcome ")';
echo '</script>';
unset($_GET['success']);


 }


 ?>


<div class="container panel_box">
  <div class="row">


<div class="card col-sm-4 " style="float:right">
  <img src="images/img_avatar3.png" alt="user profile" >
  <h1><?php echo "$name"; ?></h1>
  <p ><?php echo "$designation"; ?></p>
  <p><?php echo "$email"; ?></p>
  <p><?php echo "$hall_name"; ?></p>
  <p><?php echo "Rajshahi University of Engineering and Technology"; ?></p>


</div>


  </div>



</div>



   </body>
 </html>

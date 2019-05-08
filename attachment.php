<?php
session_start();
require_once("config.php");
require_once("time.php");
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

  if(isset($_POST['picture']) ){
    $applicant_id=$_POST['applicant_id'];
    $allot_id=$_POST['allot_id'];
    //$applicant_id=base64_encode($applicant_id);



     $query3="SELECT * FROM attachment_info WHERE st_id='$applicant_id' and alotment_id='$allot_id'";
     $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));
     $result3=mysqli_fetch_array($send3);

     $picture=$result3['picture'];
     $b_certificate=$result3['b_cirtificate'];
     $sid=$result3['sid'];
     $clearance=$result3['clearance'];

     echo "$picture <br>";
     echo "$b_certificate <br>";
     echo "$sid <br>";
     echo "$clearance <br>";



  }
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



button:hover, a:hover {
  opacity: 0.7;
}

.panel_box{

 margin-top: 10px;

}
.active{
color: red;
}

.linkButton{
     background: none;
     border: none;
     color: #0066ff;
     text-decoration: underline;
     cursor: pointer;
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
<!--
<div class="container col-md-justify-center">



  <div class="panel panel-info panel_box">

   <div class="panel-body panel_text" >
     <ul >
       <li ><a href="home.php">Home</a></li>
       <li ><a href="profile.php" >Profile</a></li>
       <li >
         <?php if($designation=="Office stuff"){
             echo '<a  href="hall_office.php" >Applicant</a>';
             }
             else {
               echo '<a href="eligible.php" >Eligible Applicant</a>';
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
</div> -->

<div class="container">
   <div class="panel panel-info panel_box col-md-4">
     <div class="panel-heading">
     <h5 style="text-alignl:center">Picture</h5>
     </div>
     <div class="panel-body">
 <img src="<?php  echo "$picture"; ?>" alt="picture">
     </div>
   </div>


   <div class="panel panel-info panel_box col-md-4">
     <div class="panel-heading">
     <h5 style="text-alignl:center">Birth certificate or NID</h5>
     </div>
     <div class="panel-body">
 <img src="<?php  echo "$b_certificate"; ?>" alt="Birth certificate or nid">
     </div>
   </div>


   <div class="panel panel-info panel_box col-md-4">
     <div class="panel-heading">
     <h5 style="text-alignl:center">student ID card</h5>
     </div>
     <div class="panel-body">
 <img src="<?php  echo "$sid"; ?>" alt="Student ID card">
     </div>
   </div>


   <div class="panel panel-info panel_box col-md-4">
     <div class="panel-heading">
     <h5 style="text-alignl:center">clearance</h5>
     </div>
     <div class="panel-body">
 <img src="<?php  echo "$clearance"; ?>" alt="clearance">
     </div>
   </div>
</div>

  </body>
 </html>

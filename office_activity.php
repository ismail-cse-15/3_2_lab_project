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

//give permission of otice
if(isset($_POST['s1'])){

  $id1=$_POST['id'];
  echo "$id1";
  $query3="UPDATE notice SET access=1 where id='$id1'";
  $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));
    unset($_POST['s1']);
  header("Location:office_activity.php");

  exit();
}

// take control to not access of notice
if(isset($_POST['s2'])){

  $id1=$_POST['id'];
  echo "$id1";
  $query4="UPDATE notice SET access=0 where id='$id1'";
  $send4=mysqli_query($connection,$query4) or die(mysqli_error($connection));
   unset($_POST['s2']);
  header("Location:office_activity.php");
  exit();
}


//give permission of allot
if(isset($_POST['s3'])){

  $id2=$_POST['id1'];
  // echo "yes : $id2 <br>";
  $query3="UPDATE allot_info SET access=1 where id='$id2'";
  $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));
  unset($_POST['s3']);
   header("Location:office_activity.php");
   exit();
}

// take control to not access of notice
if(isset($_POST['s4'])){

  $id2=$_POST['id1'];
  // echo "not $id2";
   $query4="UPDATE allot_info SET access=0 where id='$id2'";
   $send4=mysqli_query($connection,$query4) or die(mysqli_error($connection));
   unset($_POST['s4']);
  header("Location:office_activity.php");
  exit();
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
 padding-top: 10px;

}
.active{
color: red;
}
.linkButton {
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




<div class="container ">



  <div class="panel panel-info panel_box col-md-4">

   <div class="panel-body panel_text" >
     <ul >
       <li ><a href="home.php">Home</a></li>
       <li ><a href="profile.php" >Profile</a></li>
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
          echo '<a  href="hamid.php" class="active">Allotment</a>';
         }
         elseif ($hall_name=="Shahid Shahidul Islam Hall") {
           echo '<a  href="shahidul.php" class="active">Allotment</a>';
         }
         elseif ($hall_name=="Tin Shad Hall") {
           echo '<a  href="tin.php" class="active">Allotment</a>';
         }
         elseif ($hall_name=="Shahid President Ziaur Rahman Hall") {
           echo '<a  href="zia.php" class="active">Allotment</a>';
         }
         elseif ($hall_name=="Bangubandhu Shekh Mujibor Rahman Hall") {
           echo '<a  href="bangabandhu.php" class="active">Allotment</a>';
         }

         elseif ($hall_name=="Shahid Lt. Selim Hall") {
          echo '<a  href="selim.php" class="active">Allotment</a>';
         }
         elseif ($hall_name=="Deshratna Shekh Hasina Hall") {
           echo '<a  href="lh.php" class="active">Allotment</a>';
         }
         else {

         }
       }
       else {
        echo '<a  href="office_activity.php" class="active">Hall office</a>';
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






<div class="container panel-group">
  <div class="panel panel-info col-md-4 panel_box">

       <div class="panel-heading" style="text-align:center;">
         <h4>Notice history</h4></div>
       <div class="panel-body table-responsive">
         <table class="table table-bordered">
    <tr>


      <th>Notice heading</th>
      <th>Author</th>
      <th>Access</th>

    </tr>
  <?php
 $query1="SELECT * from notice WHERE hall_name='$hall_name'";
 $send1=mysqli_query($connection,$query1) or die(mysqli_error($connection));

while($result1=mysqli_fetch_array($send1)){
  $id=$result1['id'];
  $notice_heading=$result1['notice_heading'];
  $notice_file=$result1['notice_file'];
  $author=$result1['author'];
  $notice_file=$result1['notice_file'];

  $access=$result1['access'];

  echo '<tr>';
  echo '<td><form class="" action="show_notice.php" method="post">';
    $id=$result1['id'];
    echo "<input type='hidden' name='id' value='$id'>";
     echo"<input type='submit' class='linkButton' name='show_notice' value='$notice_heading'>";
     echo "</form></td>";
          echo "<td>$author</td>";



           echo '<td><form class="" action="office_activity.php" method="post">';
             $id=$result1['id'];
             echo "<input type='hidden' name='id' value='$id'>";
           if($access==0){
            echo '<input type="submit" name="s1" class="btn btn-warning" value="Accept">';
           }
           if($access==1){
             echo '<input type="submit" name="s2" class="btn btn-info" value="Decline">';
           }


           echo "</form></td></tr>";


         }
  echo "</table>";


   ?>

       </div>
</div>

<div class="panel panel_box panel-danger  col-md-8 ">

  <div class="panel-heading  " style="text-align:center;">
    <h4>Allotment history</h4>

  </div>
  <div class="panel-body table-responsive">
    <table class="table table-bordered">
   <tr>


   <th>No</th>
   <th>Allotment name</th>

   <th>Apply start(Y/M/D)</th>
   <th>Apply end(Y/M/D)</th>
   <th>Allot date</th>
   <th>Total seat</th>
   <th>Alloted seat</th>
    <th>Access</th>

   </tr>
   <?php
   $query2="SELECT * from allot_info WHERE hall_name='$hall_name'";
   $send2=mysqli_query($connection,$query2) or die(mysqli_error($connection));
  $no=1;
   while($result2=mysqli_fetch_array($send2)){
   $allot_name=$result2['allot_name'];
   $apply_start=$result2['apply_start'];
   $apply_end=$result2['apply_end'];
   $allot_date=$result2['allot_date'];
   $no_of_seat=$result2['no_of_seat'];
   $alloted_seat=$result2['alloted_seat'];
   $access=$result2['access'];
   $id1=$result2['id'];

  echo "<tr>";
    echo"<td>$no</td>";
  echo  '<td><a href="show_notice.php">';
    echo "$allot_name";
    echo "</a></td>";

    echo"<td>$apply_start</td>";
    echo"<td>$apply_end</td>";
    echo"<td>$allot_date</td>";
    echo"<td>$no_of_seat</td>";
    echo"<td>$alloted_seat</td>";
    echo '<td><form class="" action="office_activity.php" method="post">';

      echo "<input type='hidden' name='id1' value='$id1'>";
    if($access==0){
     echo '<input type="submit" name="s3" class="btn btn-warning" value="Accept">';
    }
    if($access==1){
      echo '<input type="submit" name="s4" class="btn btn-info" value="Decline">';
    }


    echo "</form></td>";
  echo "</tr>";

    }
   echo "</table>";


   ?>

  </div>


</div>
</div>







   </body>
 </html>

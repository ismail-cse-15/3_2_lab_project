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
  // $tmp=$_SESSION['hall_name'];


  $_SESSION['name']=$name;
  $_SESSION['email']=$email;
  $_SESSION['hall_name']=$hall_name;
  $_SESSION['designation']=$designation;

  if(isset($_POST['d_applicant'])){
    $applicant_id=$_POST['applicant_id'];
    $allot_id=$_POST['allot_id'];
    $applicant_id=base64_encode($applicant_id);

    $query1="SELECT * from application WHERE roll='$applicant_id' and alotment_id='$allot_id'";
    $send1=mysqli_query($connection,$query1) or die(mysqli_error($connection));
    $result1=mysqli_fetch_array($send1);

    $name=base64_decode($result1['name']);
    //echo "$name <br>";
    $dept=base64_decode($result1['dept']);
    $rg_no=base64_decode($result1['rg_no']);
    $ac_year=base64_decode($result1['ac_year']);
      $present_ac_y=base64_decode($result1['present_ac_y']);
    $cgpa=base64_decode($result1['cgpa']);
    $p_hall=base64_decode($result1['p_hall']);
   $p_room=base64_decode($result1['p_room_no']);



    $query2="SELECT * from p_info WHERE st_id='$applicant_id' and alotment_id='$allot_id'";
    $send2=mysqli_query($connection,$query2) or die(mysqli_error($connection));
     $result2=mysqli_fetch_array($send2);
     $b_date=base64_decode($result2['b_date']);

     $religion=base64_decode($result2['religion']);
     $nationality=base64_decode($result2['nationality']);
     $gender=base64_decode($result2[ 'gender']);
     $phone_no=base64_decode($result2['phone_no' ]);
     $f_name=base64_decode($result2['f_name']);
     $f_occupation=base64_decode($result2['f_occupation']);
     $f_income=base64_decode($result2['f_income']);
     $g_name=base64_decode($result2['g_name']);
     $g_s_relation=base64_decode($result2['g_s_relation' ]);
     $g_occupation=base64_decode($result2[ 'g_occupation']);
     $p_address=base64_decode($result2['p_address']);
     $local_name=base64_decode($result2['local_name']);
     $local_relation=base64_decode($result2['local_relation']);
     $local_address=base64_decode($result2['local_address']);

     $query3="SELECT * FROM attachment_info WHERE st_id='$applicant_id' and alotment_id='$allot_id'";
     $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));
     $result3=mysqli_fetch_array($send3);

     $picture=$result3['picture'];
     $b_certificate=$result3['b_cirtificate'];
     $sid=$result3['sid'];
     $clearance=$result3['clearance'];

    $query4="SELECT * from roommate_list WHERE  st_id='$applicant_id' and alotment_id='$allot_id'";
    $send4=mysqli_query($connection,$query4) or die(mysqli_error($connection));
    $result4=mysqli_fetch_array($send4);
    $rm_name1=base64_decode($result4['rm_name1']);
    $rm_name2=base64_decode($result4['rm_name2']);
    $rm_name3=base64_decode($result4['rm_name3']);

    $rm_roll1=base64_decode($result4['rm_roll1']);
    $rm_roll2=base64_decode($result4['rm_roll2']);
    $rm_roll3=base64_decode($result4['rm_roll3']);

    $rm_dept1=base64_decode($result4['rm_dept1']);
    $rm_dept2=base64_decode($result4['rm_dept2']);
    $rm_dept3=base64_decode($result4['rm_dept3']);

    $rm_year1=base64_decode($result4['rm_year1']);
    $rm_year2=base64_decode($result4['rm_year2']);
    $rm_year3=base64_decode($result4['rm_year3']);

  }
}

if(isset($_POST['accept'])){
  $query5="INSERT INTO accepted_list VALUES('$applicant1',1)";

  $send5=mysqli_query($connection,$query5) or die(mysqli_error($connection));
  header("Location:hall_office.php");
}
if(isset($_POST['n_accept'])){
  $query6="INSERT INTO accepted_list VALUES('$applicant1',0)";
  $send6=mysqli_query($connection,$query6) or die(mysqli_error($connection));
  header("Location:hall_office.php");
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
</div>
 <div class="container col-md-justify-center">

<div class="row">
      <div class="col-md-4">
    <label >Academic information</label>
      <div class="form-group">
        <label for="">students name : <?php echo "$name"; ?></label>
      </div>

      <div class="form-group">
        <label for="">Roll No : <?php $roll_no=base64_decode($applicant_id);echo "$roll_no"; ?></label>
      </div>
      <div class="form-group">
        <label for="">Registration No : <?php echo "$rg_no"; ?></label>
      </div>
      <div class="form-group">
        <label for="">Acadamic year : <?php echo "$ac_year"; ?></label>
      </div>
      <div class="form-group">
        <label for="">Department: <?php echo "$dept"; ?></label>
      </div>
      <div class="form-group">
        <label for="">Reault(CGPA): <?php echo "$cgpa"; ?></label>
      </div>
      <div class="form-group">
        <label for="">Present academic year: <?php echo "$present_ac_y"; ?></label>
      </div>
    </div>

      <div class="col-md-4">
        <label>Personal information</label>
        <div class="form-group">
          <label for="">Date of birth: <?php echo "$b_date(Y/M/D)"; ?></label>
        </div>
        <div class="form-group">
          <label for="">Religion: <?php echo "$religion"; ?></label>
        </div>
        <div class="form-group">
          <label for="">Nationality: <?php echo "$nationality"; ?></label>
        </div>
        <div class="form-group">
          <label for="">Phone No:  <?php echo "$phone_no"; ?></label>
        </div>
        <div class="form-group">
          <label for="">Permanent address <?php echo "$p_address"; ?></label>
        </div>
        <label >Previous academic year information</label>
        <div class="form-group">
          <label for="">Hall name: <?php echo "$p_hall"; ?></label>
        </div>
        <div class="form-group">
          <label for="">Room no : <?php echo "$p_room"; ?></label>
        </div>
      </div>

        <div class="col-md-4">
          <label >Father's information</label>
          <div class="form-group">
            <label for="">Father's name: <?php echo "$f_name"; ?></label>
          </div>
          <div class="form-group">
            <label for="">Father's occupation: <?php echo "$f_occupation"; ?></label>
          </div>
          <div class="form-group">
            <label for="">Father's income: <?php echo "$f_income"; ?></label>
          </div>
        </div>

        <div class="col-md-4">
            <label >Gurdian's information</label>
          <div class="form-group">
            <label for="">Guardian's name: <?php echo "$g_name"; ?></label>
          </div>
          <div class="form-group">
            <label for="">Relation: <?php echo "$g_s_relation"; ?></label>
          </div>

          <div class="form-group">
            <label for="">Occupation <?php echo "$g_occupation"; ?></label>
          </div>
        </div>

        <div class="col-md-4">
<label> Local gurdian information</label>
          <div class="form-group">
            <label for="">Name: <?php echo "$local_name"; ?></label>
          </div>
          <div class="form-group">
            <label for="">Relation: <?php echo "$local_relation"; ?></label>
          </div>

          <div class="form-group">
            <label for="">Address: <?php echo "$local_address"; ?></label>
          </div>
        </div>









      </div>




</div>

<div class="container">


  <h3 ><center>Roommate list</center></h3>


  <table class="table table-bordered">

  <tr>
  <th><center>Roommate name</center></th>
  <th><center>Department</center></th>
  <th><center>Roll No</center></th>
  <th><center>Year</center></th>
  </tr>


  <tr class="success">

  <td><center><?php echo "$rm_name1"; ?></center></td>
  <td><center><?php echo "$rm_dept1"; ?></center></td>
  <td><center><?php echo "$rm_roll1"; ?></center></td>
  <td><center><?php echo "$rm_year1"; ?></center></td>


  </tr>
  <tr class="danger">
  <td><center><?php echo "$rm_name2"; ?></center></td>
  <td><center><?php echo "$rm_dept2"; ?></center></td>
  <td><center><?php echo "$rm_roll2"; ?></center></td>
  <td><center><?php echo "$rm_year2"; ?></center></td>

  </tr>
  <tr class="info">
  <td><center><?php echo "$rm_name3"; ?></center></td>
  <td><center><?php echo "$rm_dept3"; ?></center></td>
  <td><center><?php echo "$rm_roll3"; ?></center></td>
  <td><center><?php echo "$rm_year3"; ?></center></td>

  </tr>
 </table>
</div>



<div class="container">
<h3 ><center>Attachment information</center></h3>
<table class="table table-bordered table-responsive">

  <tr>
  <th><center>Attachment name</center></th>
  <th><center>Show</center></th>

  </tr>


  <tr class="success">

  <td><center><?php echo "Picture"; ?></center></td>
  <td><center><?php echo '<form class="" action="attachment.php" method="post">
    <input type="hidden" name="applicant_id" ';
    echo "value='$applicant_id'>";
    echo '<input type="hidden" name="allot_id"';
    echo "value='$allot_id'>";
    echo "<input type='submit' class='linkButton' name='picture' value='Details'>";
  echo "</form>";  ?></center></td>

</tr>
  <tr class="danger">
  <td><center><?php echo "Student ID card"; ?></center></td>
  <td><center><?php  echo '<form class="" action="attachment.php" method="post">
    <input type="hidden" name="applicant_id" ';
    echo "value='$applicant_id'>";
    echo '<input type="hidden" name="allot_id"';
    echo "value='$allot_id'>";
    echo "<input type='submit' class='linkButton' name='sid' value='Details'>";
  echo "</form>"; ?></center></td>

  </tr>
  <tr class="info">
  <td><center><?php echo "NID/Birth certificate"; ?></center></td>
  <td><center><?php  echo '<form class="" action="attachment.php" method="post">
    <input type="hidden" name="applicant_id" ';
    echo "value='$applicant_id'>";
    echo '<input type="hidden" name="allot_id"';
    echo "value='$allot_id'>";
    echo "<input type='submit' class='linkButton' name='nid' value='Details'>";
  echo "</form>"; ?></center></td>

  </tr>

  <tr class="warning">
  <td><center><?php echo "Clearance"; ?></center></td>
  <td><center><?php  echo '<form class="" action="attachment.php" method="post">
    <input type="hidden" name="applicant_id" ';
    echo "value='$applicant_id'>";
    echo '<input type="hidden" name="allot_id"';
    echo "value='$allot_id'>";
    echo "<input type='submit' class='linkButton' name='clearance' value='Details'>";
  echo "</form>"; ?></center></td>

  </tr>

</table>
</div>
<div class="container">
  <form class="" action="attachment.php" method="post">
    <input type="submit" name="accept" class="btn btn-success btn-lg" style="float:right; margin-bottom:10px;" value="Accept">
    <input type="submit" name="n_accept" class="btn btn-danger btn-lg" style="float:left; margin-bottom:10px;" value="Not accept">
  </form>
</div>

  

  </body>
 </html>

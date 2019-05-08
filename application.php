<?php

require_once("config.php");

require_once("time.php");
session_start();
 $count=0;
 $_SESSION['count']=$count;
if(isset($_POST['applicaton'])){

  $idx=$_POST['h_name'];

}


$ack=0;
if(isset($_POST['submit'])){

  $h_id=$_POST['h_id'];
  $roll_no=$_POST['roll_no'];
  $roll_no=base64_encode($roll_no);
  $query="SELECT COUNT(1) FROM application WHERE roll='$roll_no' and alotment_id='$h_id'";
  $send=mysqli_query($connection,$query) or die(mysqli_error($connection));
  $result=mysqli_fetch_array($send);
  if($result[0]==1){
  unset($_POST['submit']);
  echo '<script language="javascript">';
echo 'alert("You are not a member")';
echo '</script>';
  }
  else{
    $name=$_POST['name'];
    $name=base64_encode($name);

     $dept=$_POST['dept'];
      $dept=base64_encode($dept);





    $rg_no=$_POST['rg_no'];
      $rg_no=base64_encode($rg_no);

    $ac_year=$_POST['ac_year'];
     $ac_year=base64_encode($ac_year);

    $present_ac_y=$_POST['present_ac_y'];
    $present_ac_y=base64_encode($present_ac_y);
    $cgpa=$_POST['cgpa'];
     $cgpa=base64_encode($cgpa);


  $b_date=$_POST['b_date'];
   $b_date=base64_encode($b_date);



  $religon=$_POST['religon'];
    $religon=base64_encode($religon);

    $nationality=$_POST['nationality'];
      $nationality=base64_encode($nationality);

    $gender=$_POST['gender'];
      $gender=base64_encode($gender);


    $f_name=$_POST['f_name'];
      $f_name=base64_encode($f_name);

    $f_occupation=$_POST['f_occupation'];
      $f_occupation= base64_encode($f_occupation);

    $f_income=$_POST['f_income'];
      $f_income=base64_encode($f_income);


  $g_name=$_POST['g_name'];
    $g_name=base64_encode($g_name);

    $g_s_relation=$_POST['g_s_relation'];
      $g_s_relation=base64_encode($g_s_relation);

    $g_occupation=$_POST['g_occupation'];
      $g_occupation=base64_encode($g_occupation);

    $local_name=$_POST['local_name'];
      $local_name=base64_encode($local_name);

      $local_relation=$_POST['local_relation'];
        $local_relation=base64_encode($local_relation);


        $local_address=$_POST['local_address'];
          $local_address=base64_encode($local_address);

    $p_address=$_POST['p_address'];
      $p_address=base64_encode($p_address);

    $phone_no=$_POST['phone_no'];
    $phone_no=base64_encode($phone_no);

    $gender=base64_encode($gender);



    $recit_no="N/A";
    $recit_no=base64_encode($recit_no);

    $pay_date="N/A";
    $pay_date=base64_encode($pay_date);


    $p_hall=$_POST['p_hall'];
    $p_hall=base64_encode($p_hall);

    $p_room=$_POST['p_room'];
    $p_room=base64_encode($p_room);

    $rm_name1=$_POST['rm_name1'];
      $rm_name1=base64_encode($rm_name1);

    $rm_dept1=$_POST['rm_dept1'];
      $rm_dept1=base64_encode($rm_dept1);

    $rm_roll1=$_POST['rm_roll1'];
      $rm_roll1=base64_encode($rm_roll1);

    $rm_year1=$_POST['rm_year1'];
      $rm_year1=base64_encode($rm_year1);


    $rm_name2=$_POST['rm_name2'];
     $rm_name2=base64_encode($rm_name2);

    $rm_dept2=$_POST['rm_dept2'];
    $rm_dept2=base64_encode($rm_dept2);

    $rm_roll2=$_POST['rm_roll2'];
      $rm_roll2=base64_encode($rm_roll2);

    $rm_year2=$_POST['rm_year2'];
      $rm_year2=base64_encode($rm_year2);


    $rm_name3=$_POST['rm_name3'];
      $rm_name3=base64_encode($rm_name3);

    $rm_dept3=$_POST['rm_dept3'];
    $rm_dept3=base64_encode($rm_dept3);

    $rm_roll3=$_POST['rm_roll3'];
  $rm_roll3=base64_encode($rm_roll3);

    $rm_year3=$_POST['rm_year3'];
      $rm_year3=base64_encode($rm_year3);

    $picture=$_FILES['picture']['name'];
    $tmp_name1=$_FILES['picture']['tmp_name'];
     $path1="picture/".$picture;
     move_uploaded_file($tmp_name1,$path1);

    $b_certificate=$_FILES['b_certificate']['name'];
    $tmp_name4=$_FILES['b_certificate']['tmp_name'];
    $path4="birth_certificate/".$b_certificate;
       move_uploaded_file($tmp_name4,$path4);

    $sid=$_FILES['sid']['name'];
    $tmp_name2=$_FILES['sid']['tmp_name'];
    $path2="sid/".$sid;
      move_uploaded_file($tmp_name2,$path2);

  $path3="N/A";
    if($_FILES['clearance']['name'] != "") {
      $clearance=$_FILES['clearance']['name'];
      $tmp_name3=$_FILES['clearance']['tmp_name'];
      $path3="clearance/".$clearance;
        move_uploaded_file($tmp_name3,$path3);
    }







    $acknowledge=0;
  $query1="INSERT INTO application (roll,name,dept,rg_no,ac_year,present_ac_y,cgpa,p_hall,p_room_no,alotment_id)
   values('$roll_no','$name','$dept','$rg_no','$ac_year','$present_ac_y','$cgpa','$p_hall','$p_room','$h_id')";
  $send1=mysqli_query($connection,$query1) or die(mysqli_error($connection));

  $query2="INSERT INTO p_info values('$roll_no','$b_date','$religon','$nationality','$gender','$phone_no',
    '$f_name','$f_occupation','$f_income',
  '$g_name','$g_s_relation','$g_occupation','$p_address',
   '$local_name','$local_relation','$local_address','$h_id')";
  $send2=mysqli_query($connection,$query2) or die(mysqli_error($connection));



  $query4="INSERT INTO roommate_list values
  ('$roll_no','$rm_name1','$rm_name2','$rm_name3',
    '$rm_roll1','$rm_roll2','$rm_roll3',
    '$rm_dept1','$rm_dept2','$rm_dept3',
    '$rm_year1','$rm_year2','$rm_year3','$h_id')";
  $send4=mysqli_query($connection,$query4) or die(mysqli_error($connection));

    $query3="INSERT into attachment_info  VALUES('$roll_no','$path1','$path4','$path2','$path3','$h_id')";
    $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));



  unset($_POST['submit']);
   header("Location: student.php");
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
  input[type="date"]:before {
     content: attr(placeholder) !important;
     color: #aaa;
     margin-right: 0.5em;
   }
   input[type="date"]:focus:before,
   input[type="date"]:valid:before {
     content: "";
   }
   .button{
      float:right;
     margin-bottom:10px;
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
  <br>
  <a href="student.php" class="btn btn-danger"style="float:right;">Cancel</a>
<div class="container"  >

  <form class="" action="application.php" method="post" enctype="multipart/form-data">



<div class="row">
 <div class="col-md-4">

  <div class="form-group">
    <input type="text" class="form-control" name="name" value="" placeholder="Student's name" required>

   </div>


    <div class="form-group ">

    <select class="form-control " name="dept"  required>

       <option value="" disabled selected hidden>Department</option>
      <option value="Architecture">Architecture</option>
      <option value="BCME">BCME</option>
      <option value="CE">CE</option>

      <option value="CSE">CSE</option>
      <option value="CFPE">CFPE</option>
      <option value="ECE">ECE</option>
      <option value="EEE">EEE</option>
      <option value="ETE">ETE</option>
      <option value="GCE">GCE</option>
      <option value="ME">ME</option>
      <option value="MSE">MSE</option>
      <option value="MTE">MTE</option>
      <option value="IPE">IPE</option>
      <option value="URP">URP</option>

    </select>
    </div>
   </div>


      <div class="col-md-4">
        <div class="form-group">
      <input type="text" class="form-control" name="roll_no" value="" placeholder="Roll no" required>

        </div>



      <div class="form-group">
    <input type="text" class="form-control" name="rg_no" value="" placeholder="Registration no" required>
      </div>
       </div>

      <div class="col-md-4">
  <div class="form-group">
    <input type="number" class="form-control" name="ac_year" value="" placeholder="Academic year" min="2010" required>
  </div>


        <div class="form-group">
          <input type="number" class="form-control" name="cgpa" value=""step="any" min="0" max="4" placeholder="CGPA" required>
        </div>
      </div>

</div>


<div class="row">
      <div class="col-md-4">
        <div class="form-group">
    <input type="date" name="b_date"  placeholder="Birth date" class="form-control" value="" required>
       </div>
       <div class="form-group">
         <input type="number" class="form-control" placeholder="Present academic year" name="present_ac_y" min="1" max="4" value="" required>
       </div>
      </div>


  <div class="col-md-4">
  <div class="form-group">
  <input type="text" class="form-control" placeholder="Phone no"  name="phone_no" value="" required>
  </div>

  <div class="form-group">


      <select name="religon" class="form-dropdown form-control" >
                        <option value="" disabled selected hidden>Religion</option>
                        <option value="Islam"> Islam</option>
                        <option value="Hinduism">Hinduism</option>
                        <option value="Buddhists">Buddhists</option>
                        <option value="Christians">Christians</option>


                      </select>

    </span>

  </div>
  </div>

  <div class="col-md-4">
        <div class="form-group">
        <input type="text" class="form-control" name="nationality" placeholder="Nationality" value="" required>
        </div>

        <div class="form-group">
          <select class="form-control" name="gender">
            <option value="" disabled selected hidden>Gender</option>
            <option value="Male">Male</option>
          <option value="Female">Female</option>

          </select>
        </div>
     </div>
</div>

<label for="">Father's Information</label>
    <div class="row">

      <div class="col-md-4">
        <div class="form-group">
          <input type="text" class="form-control" name="f_name" placeholder="Father's name" value="" required>

        </div>

      </div>

      <div class="col-md-4">
        <div class="form-group">
        <input type="text" class="form-control" name="f_occupation" placeholder="Father's occupation" value="" required>
        </div>

      </div>

      <div class="col-md-4">
        <div class="form-group">
      <input type="number" class="form-control" name="f_income" min="0" step="any"placeholder="Father's Income" value="" required>

        </div>
      </div>


</div>

<label for="">Gurdian's Information</label>
    <div class="row">
      <div class="col-md-4">
        <div class="form-group">
  <input type="text" class="form-control" name="g_name" placeholder="Gurdian's name" value="" required>
        </div>

      </div>
      <div class="col-md-4">
        <div class="form-group">
    <input type="text" class="form-control" name="g_s_relation" placeholder="Relation" value="" required>
        </div>

      </div>


      <div class="col-md-4">
        <div class="form-group">
    <input type="text" class="form-control" name="g_occupation" placeholder="Occupation" value="" required>
        </div>

      </div>
</div>


<label for="">Local gurdian's Information</label>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
    <input type="text" class="form-control" name="local_name" placeholder="Name" value="" required>
          </div>

        </div>
        <div class="col-md-4">
          <div class="form-group">
      <input type="text" class="form-control" name="local_relation" placeholder="Relation" value="" required>
          </div>
         </div>
         <div class="col-md-3">
                <div class="form-group">
              <textarea name="local_address" placeholder="Address" rows="4" cols="40" required></textarea>
                </div>

        </div>
      </div>

    <div class="row">
      <div class="col-md-3">
        <label for="">Parmanant Address</label>

      </div>
      <div class="col-md-4">
      <textarea name="p_address" rows="4" cols="80" required></textarea>
      </div>



    </div>

<label >Previous academic year information</label>
 <div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <select class="form-control " id="sel1" name="p_hall"  required>
      <option value="" disabled selected hidden>Hall name</option>
      <option value="Shahid Lt. Selim Hall">Shahid Lt. Selim Hall</option>
      <option value="Shahid Shahidul Islam Hall">Shahid Shahidul Islam Hall</option>
      <option value="Shahid Abdul Hamid Hall">Shahid Abdul Hamid Hall</option>
      <option value="Tin Shed Hall">Tin Shed Hall</option>
      <option value="Deshratna Sheikh Hasina Hall">Deshratna Sheikh Hasina Hall</option>
      <option value="Shahid President Ziaur Rahman Hall">Shahid President Ziaur Rahman Hall</option>
      <option value="Bangabandhu Sheikh Mujibur Rahman Hall">	Bangabandhu Sheikh Mujibur Rahman Hall</option>
     <option value="N/A">N/A</option>
      </select>
      <strong>*Non resident student choose N/A</strong>
    </div>

   </div>
  <div class="col-md-4">
    <div class="form-group">
      <input class="form-control" list="browsers" placeholder="Room no"  name="p_room">
  <datalist id="browsers" >
    <option value="N/A">
    <option value="Defined as">

  </datalist>
      <strong>*Non resident student choose N/A</strong>
    </div>
  </div>
</div>

<div class="row">
 <h3 > <center> Room-mate List </center> </h3>
  <table class="table table-bordered">
 <tr>
    <th>SL no</th>
  <th>Roommate name</th>
  <th>Department</th>
  <th>Roll no</th>
  <th>Academic year</th>

 </tr>
 <tr>
  <td>1</td>

  <td><input type="text" name="rm_name1" class="form-control" value="" required>
  </td>
  <td>
    <select class="form-control " name="rm_dept1"  required>

       <option > </option>
      <option value="Architecture">Architecture</option>
      <option value="BCME">BCME</option>
      <option value="CE">CE</option>

      <option value="CSE">CSE</option>
      <option value="CFPE">CFPE</option>
      <option value="ECE">ECE</option>
      <option value="EEE">EEE</option>
      <option value="ETE">ETE</option>
      <option value="GCE">GCE</option>
      <option value="ME">ME</option>
      <option value="MSE">MSE</option>
      <option value="MTE">MTE</option>
      <option value="IPE">IPE</option>
      <option value="URP">URP</option>

    </select>
  </td>

  <td><input type="number" name="rm_roll1" class="form-control" value="" required>
  </td>
  <td><input type="number" name="rm_year1" class="form-control" value="" min="1" max="4" required>
  </td>
</tr>
<tr>
  <td>2</td>
  <td><input type="text" name="rm_name2" class="form-control" value="" required>
  </td>
  <td>
    <select class="form-control " name="rm_dept2"  required>

       <option > </option>
      <option value="Architecture">Architecture</option>
      <option value="BCME">BCME</option>
      <option value="CE">CE</option>

      <option value="CSE">CSE</option>
      <option value="CFPE">CFPE</option>
      <option value="ECE">ECE</option>
      <option value="EEE">EEE</option>
      <option value="ETE">ETE</option>
      <option value="GCE">GCE</option>
      <option value="ME">ME</option>
      <option value="MSE">MSE</option>
      <option value="MTE">MTE</option>
      <option value="IPE">IPE</option>
      <option value="URP">URP</option>

    </select>
  </td>
  <td><input type="number" name="rm_roll2" class="form-control" value="" required>
  </td>
  <td><input type="number" name="rm_year2" class="form-control" value="" min="1" max="4" required>
  </td>
</tr>
<tr>
    <td>3</td>
  <td><input type="text" name="rm_name3" class="form-control" value="" required>
  </td>
  <td>
    <select class="form-control " name="rm_dept3"  required>

       <option > </option>
      <option value="Architecture">Architecture</option>
      <option value="BCME">BCME</option>
      <option value="CE">CE</option>

      <option value="CSE">CSE</option>
      <option value="CFPE">CFPE</option>
      <option value="ECE">ECE</option>
      <option value="EEE">EEE</option>
      <option value="ETE">ETE</option>
      <option value="GCE">GCE</option>
      <option value="ME">ME</option>
      <option value="MSE">MSE</option>
      <option value="MTE">MTE</option>
      <option value="IPE">IPE</option>
      <option value="URP">URP</option>

    </select>
  </td>
  <td><input type="number" name="rm_roll3" class="form-control" value="" required>
  </td>
  <td><input type="number" name="rm_year3" class="form-control" value="" min="1" max="4" required>
  </td>
</tr>
 </table>
</div>

<label>Attachment information</label>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <input type="file"  class="form-control" name="picture" value="" required>
      <label ><strong>*Passport size picture</strong></label>
    </div>
    <div class="form-group">
      <input type="file"  class="form-control" name="b_certificate" value="" required>
      <label ><strong>*Birth certificate or NID </strong></label>
    </div>

  </div>
  <div class="col-md-4">
    <div class="form-group">
      <input type="file" class="form-control"  name="sid" value="" required>
      <label ><strong>*Student ID card</strong></label>
    </div>

    <div class="form-group">

      <input type="file" class="form-control"  name="clearance" value="" >
      <label ><strong>*Clearance from previous hall </strong></label>
    </div>
  </div>

</div>
<div class="row">
  <p><strong>Terms and Policy:</strong> I announce that the above informations
    are true and I will abide by every rules and disciplines
    of respective hall as a resident and clear my payment
    within due date. I will accept the decision of
     the authority as final regarding rules and discipline.</p>
</div>
<strong>*Before submit check form carefully</strong>
<br>
<div class="row">
  <div class="col-sm-6">
    <input type="reset" name="reset" class= "btn btn-warning  btn-lg" value="Reset" style="float:left;">
  </div>

  <div class="col-sm-6">
    <input type="hidden" class="form-control" name="h_id" value="<?php echo "$idx";?>">
    <?php
    // $query_d="SELECT * from allot_info where access=1";
    // $send_d=mysqli_query($connection,$query_d) or die(mysqli_error($connection));
    //  $time=0;
    // while ($result_d=mysqli_fetch_array($send_d)){
    //   $apply_start=$result_d['apply_start'];
    //   $apply_end=$result_d['apply_end'];
    //   $today=date('Y-m-d');
    //   $date1=strtotime($apply_start);
    //   $date2=strtotime($apply_end);
    //   $date3=strtotime($today);
    //
    //
    //   if (($date3 >= $date1)
    //   && ($date3 <= $date2)){
    //     // echo "is between";
    //     $time=1;
    //     break;
    //
    // }
    // }
    if(empty($idx)){
    echo '<input disabled type="submit" name="submit" class= "btn btn-primary btn-lg button" value="Submit">';
    }

    else{
      echo '<input  type="submit" name="submit" class= "btn btn-primary btn-lg button" value="Submit">';
    }

    ?>
  </div>
</div>





  </form>

</div>





             <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
        </script>
     <script src="js/bootstrap.min.js"></script>


    </body>

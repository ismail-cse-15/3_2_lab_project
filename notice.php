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
    // echo "into main $n_type<br>";


  $_SESSION['name']=$name;
  $_SESSION['email']=$email;
  $_SESSION['hall_name']=$hall_name;
  $_SESSION['designation']=$designation;

}


//$n_type="wejcnwejecwej";
if(isset($_POST['s1'])){

  $n_type=$_POST['n_type'];
// echo "into post $n_type <br>";
// header("Location:notice.php");
//   exit();
}

if(isset($_POST['s2'])){


   $allowed = array('pdf');
   $notice_heading=$_POST['notice_heading'];
   $al_name=$_POST['notice_heading'];
   $no_of_seat=$_POST['no_of_seat'];
   $apply_start=$_POST['apply_start'];
   $apply_end=$_POST['apply_end'];
   $notice_file=$_FILES['n_file']['name'];
   $tmp_name=$_FILES['n_file']['tmp_name'];
   $file_type= pathinfo($notice_file, PATHINFO_EXTENSION);
   // echo "temporary name: $tmp_name";
   $path="notice/" .$notice_file;

   if(in_array($file_type,$allowed) ) {
     move_uploaded_file($tmp_name,$path);
     // echo "$notice_heading <br>$al_name <br> $no_of_seat <br> $apply_start <br> $apply_end";
     $query1="INSERT INTO allot_info (id,allot_name,apply_start,apply_end,no_of_seat,hall_name)
     values ('','$al_name','$apply_start','$apply_end','$no_of_seat','$hall_name')";
     $send1=mysqli_query($connection,$query1) or die(mysqli_error($connection));
     $query2="INSERT into notice (id,notice_heading,notice_file,hall_name,author)
     values(' ','$notice_heading','$path','$hall_name','$name')";
     $send2=mysqli_query($connection,$query2) or  die(mysqli_error($connection));
       unset($_POST['s2']);
       header("Location:notice.php");
       exit();
   }
   else {
     unset($_POST['s2']);
     header("Location:notice.php");
     exit();
   }

}
if(isset($_POST['s3'])){

     $allowed =  array('pdf');
    $notice_heading=$_POST['notice_heading'];
  $notice_file=$_FILES['n_file']['name'];
  $tmp_name=$_FILES['n_file']['tmp_name'];
  $path="notice/" .$notice_file;
  $file_type= pathinfo($notice_file, PATHINFO_EXTENSION);
//echo "temporary name: $tmp_name";
echo "File type ;$file_type";
if(in_array($file_type,$allowed) ) {
  move_uploaded_file($tmp_name,$path);
  $query2="INSERT into notice (id,notice_heading,notice_file,hall_name,author)
   values(' ','$notice_heading','$path','$hall_name','$name')";
    $send2=mysqli_query($connection,$query2) or  die(mysqli_error($connection));
    unset($_POST['s1']);
    unset($_POST['s3']);
    header("Location:notice.php");
    exit();
}
else {
  unset($_POST['s1']);
  unset($_POST['s3']);
  header("Location:notice.php");
  exit();
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
input[type="date"]:before {
   content: attr(placeholder) !important;
   color: #aaa;
   margin-right: 0.5em;
 }
 input[type="date"]:focus:before,
 input[type="date"]:valid:before {
   content: "";
 }
 .open{
   visibility: visible;
 }
 .close{
   visibility: hidden;
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


<!-- header -->
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
       <li  ><a href="profile.php">Profile</a></li>
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

       <li ><?php
       if ($designation=="Office stuff") {
         echo'<a  href="cancel.php">Seat cancel</a>';
       }
       else {
         echo'<a  href="allotment.php"></a>';
       }

        ?>
       </li>
       <li>
       <?php
      if ($designation=="Office stuff") {
     echo '<a  href="notice.php" class="active">Notice</a>';
   }
        ?>
       </li>
       <li><a href="logout.php">Logout</a>
       </li>
     </ul>
   </div>
  </div>
</div>


    <div class="container col-md-6">
     <div class="panel-group ">
       <div class="panel panel_box">
         <div class="panel-heading">
        <a href="#pn" data-toggle="collapse" class="btn btn-info">Publish notice</a>
         </div>
         <div class="panel-body">



             <?php
              if(isset($_POST['s1'])){
              echo '<div class="collapse in" id="pn">';

                if ($n_type=="New allotment") {
                 echo '

                 <form class="" action="notice.php" method="post" id="user" enctype="multipart/form-data">
                 <div class="row">
                 <div class="col-sm-8">
                 <div class="form-group">
                  <input type="text" class="form-control" name="notice_heading" placeholder="Notice Heading" value="" required>
                 </div>
                 </div>

                 </div>
                               <div class="row">
                               <div class="col-sm-6">
                                 <input type="file" name="n_file" class="form-control" id="file_upload" value="" required>
                                 <label for="file_upload">Select a PDF file to upload</label>
                                 </div>


                                 <div class="col-sm-6">
                                   <div class="form-group ">


                                     <input type="number" class="form-control" name="no_of_seat" placeholder="Number of vacant seat" value="" required>
                                   </div>
                                 </div>
                               </div>


                               <div class="row">
                                 <div class="col-sm-6">
                                   <div class="form-group ">
                                     <input type="date" class="form-control" name="apply_start" placeholder="Application start" value="" required>

                                   </div>
                                 </div>


                                 <div class="col-sm-6">
                                   <div class="form-group ">

                                     <input type="date" class="form-control" name="apply_end" placeholder="Deadline" value="" required>
                                   </div>
                                 </div>
                               </div>

                               <div class="row">

                               <div class="col-sm-6">
                               <input type="reset" class="btn btn-danger" name="reset" value="Reset">
                               </div>

                                   <div class="col-sm-6">
                                   <input type="submit" class="btn btn-primary" name="s2" value="Submit">
                                   </div>
                               </div>

                             </form>

                             </div>';
                }
                if($n_type=="Others"){
                  echo '

           <form class="" action="notice.php" method="post" id="user" enctype="multipart/form-data">
           <div class="row">
           <div class="col-sm-8">
           <div class="form-group">
            <input type="text" class="form-control" name="notice_heading" placeholder="Notice Heading" value="" required>
           </div>
           </div>

           </div>
                              <div class="row">
                                  <div class="col-sm-6">
                                    <input type="file" name="n_file" class="form-control"  value="" required>
                                    <label for="file_upload">Select a PDF file to upload</label>
                                    </div>
                                    <div class="col-sm-6">
                                    <input type="submit" class="btn btn-danger" name="s3" value="Submit">
                                    </div>
                                </div>

                              </form>

                              </div>  ';
                }
                if($n_type=="Hall charge"){
                  echo "form for hall charge";
                }
              }
              else{
                echo '<div class="collapse " id="pn">

                  <form  action="notice.php" method="post" enctype="multipart/form-data">
                   <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <select class="form-control" name="n_type">
                          <option value="">Notice for</option>
                          <option value="New allotment">New allotment</option>
                          <option value="Hall charge">Hall charge</option>
                        <option value="Others">Others</option>
                        </select>
                      </div>
                    </div>
                   </div>
                   <input type="submit"  class=" btn btn-primary" name="s1" value="Submit">
                  </form>

              </div>';
              }


               ?>

            </div>

         </div>



<div class="panel panel_box">
         <div class="panel-heading">
           <a href="#sn" data-toggle="collapse" class="btn btn-danger">Show notice</a>

         </div>
         <div class="panel-body">
           <div class="collapse table-responsive" id="sn" >
             <table class="table table-bordered">
        <tr>


          <th>No</th>
          <th>Notice Heading</th>
          <th>Author</th>
          <th>Status</th>

        </tr>
             <?php
             $counter=0;
              $query_s="SELECT * from notice WHERE hall_name='$hall_name'";
              $send_s=mysqli_query($connection,$query_s) or die(mysqli_error($connection));
     while ($result_s=mysqli_fetch_array($send_s)) {
       //$id=$result_s['id'];
       $notice_heading=$result_s['notice_heading'];
       $notice_file=$result_s['notice_file'];
       $author=$result_s['author'];
       $access=$result_s['access'];
       $counter=$counter+1;

      echo "<tr>";
       echo "<td>$counter</td>";

       echo '<td><form class="" action="show_notice.php" method="post">';
         $id=$result_s['id'];
         echo "<input type='hidden' name='id' value='$id'>";
          echo"<input type='submit' class='linkButton' name='show_notice' value='$notice_heading'>";
          echo "</form></td>";
       echo "<td>$author</td>";
       if($access==0){
         echo "<td><h5>Requested</h5></td>";
       }
       else {
         echo "<td><h5>Accepted</h5></td>";
       }
       echo "</tr>";


     }
     echo "   </table>";
              ?>


        </div>
         </div>
</div>
</div>
</div>






   </body>
 </html>

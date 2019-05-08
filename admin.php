<?php

session_start();
require_once("config.php");
require_once("time.php");

if(isset($_POST['publish'])){

  $notice_heading=$_POST['notice_heading'];
  $notice_heading=base64_encode($notice_heading);
  $notice_file=$_FILES['notice_file']['name'];
  $tmp_name=$_FILES['notice_file']['tmp_name'];
  $path="message/" .$notice_file;
   move_uploaded_file($tmp_name,$path);
  $query1="INSERT into  notice values(' ','$notice_heading','$path')";
  $send1=mysqli_query($connection,$query1) or die(mysqli_error($condition));
  // echo "$notice_heading";
  // echo "$notice_file";
  // echo "$path";
  header("Location:admin.php");
  exit();
}

//give permission
if(isset($_POST['s1'])){

  $id1=$_POST['id'];
  echo "$id1";
  $query3="UPDATE registration SET access=1 where id='$id1'";
  $send3=mysqli_query($connection,$query3) or die(mysqli_error($connection));
    unset($_POST['s1']);
  header("Location:admin.php");

  exit();
}

// take control to not access
if(isset($_POST['s2'])){

  $id1=$_POST['id'];
  echo "$id1";
  $query4="UPDATE registration SET access=0 where id='$id1'";
  $send4=mysqli_query($connection,$query4) or die(mysqli_error($connection));
   unset($_POST['s2']);
  header("Location:admin.php");
  exit();
}



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="Styles/login.css">
   <head>
     <meta charset="utf-8">

     <style media="screen">
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
</div>


<br>
<br>
<div class="container">
  <div class="panel panel-info col-md-8">
    <br>
       <div class="panel-heading" style="text-align:center;">List of all user</div>
       <div class="panel-body">
         <table class="table table-bordered">
    <tr>

      <th>Name</th>
      <th>Designation</th>
      <th>Email</th>
      <th>Hall name</th>
      <th>Access</th>

    </tr>
  <?php
 $query2="SELECT * from registration";
 $send2=mysqli_query($connection,$query2) or die(mysqli_error($connection));

while($result2=mysqli_fetch_array($send2)){
  $name=base64_decode($result2['name']);
  $designation=base64_decode($result2['designation']);
  $email=base64_decode($result2['email']);
  $hall_name=base64_decode($result2['hall_name']);

  $access=$result2['access'];
  echo "<tr>
          <td>$name</td>
          <td>$designation</td>
          <td>$email</td>
          <td>$hall_name</td>";
           echo "<td>";
           echo '<form class="" action="admin.php" method="post">';
             $id=$result2['id'];
             echo "<input type='hidden' name='id' value='$id'>";
           if($access==0){
            echo '<input type="submit" name="s1" class="btn btn-warning" value="Accept">';
           }
           if($access==1){
             echo '<input type="submit" name="s2" class="btn btn-info" value="Decline">';
           }


           echo "</form></tr>";


         }
  echo "</table>";


   ?>

       </div>
</div>
</div>



<div class="container">

 <div class="panel-group ">


   <div class="panel panel-success col-md-4">
     <br>
     <div class="panel-heading "><center>Publish Notice</center></div>
     <div class="panel-body">
       <textarea rows="3" cols="42"  placeholder="Enter a notice heading" name="notice_heading" form="usrform" required>
</textarea>

       <form class="" action="admin.php" method="post" id="usrform" enctype="multipart/form-data">
         <div class="form-group">
         <input type="file" class="form-control"  name="notice_file" value="" required>

         <label for="">*Image or pdf file</label>

            </div>
         <input type="submit" class="btn btn-info" name="publish" value="Publish">

    </form>
 </div>
   </div>
</div>



   </div>
</div>




      <script
          src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js">
          </script>
       <script src="js/bootstrap.min.js"></script>
   </body>
 </html>

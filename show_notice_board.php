<?php
require_once("config.php");
require_once("time.php");
session_start();
$id=$_POST['id'];
$query="SELECT * from notice where id='$id'";
$send=mysqli_query($connection,$query) or die(mysqli_error($connection));
$result=mysqli_fetch_array($send);
$path=$result['notice_file'];



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
.embed-responsive {
  position: relative;
  display: block;
  height: 0;
  padding: 0;
  overflow: hidden;
}
</style>
 <title style="image:">
      RUET Hall Management System
 </title>
      <link rel="icon" href="images/favicon.ico" type="image/x-icon">
   </head>
   <body>
     <div class='embed-responsive container' style='padding-bottom:100%'>
         <object data="<?php echo "$path"; ?>"></object>
     </div>



</body>
 </html>

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



 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="Styles/login.css">


  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> -->

   <head>
     <meta charset="utf-8">
     <title></title>
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


     }
     .panel_text{
       text-align: center;

     }
     .panel_box{

       margin-bottom: 50px;
       margin-left: 50px;

     }
     .box{

       height: 50;
       weidth:50;
     }




</style>
     </style>
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
<br>


<div class="container col-md-justify-center ">
  <h2></h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/ruetgate.jpeg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">

       <p>RUET Main Gate Complex, the beautiful contribution, creation and dream of VC sir of this University.</p>
      </div>
      </div>

      <div class="item">
        <img src="images/ruetnight.jpg" alt="Chicago" style="width:100%;">

        <div class="carousel-caption">

       <p>Beauty at Night. Who study here they are really Lucky Guys!</p>
      </div>
      </div>

      <div class="item">

        <img src="images/ziafinal.png" alt="New york" style="width:100%;">
        <div class="carousel-caption">

       <p>This is the Shahid President Ziaur Rahman Hall. It is biggest and more wonderful hall of RUET</p>
      </div>
      </div>



      <div class="item">
        <img src="images/Shahid_Abdul_Hamid_Hallfinal.jpg" alt="New york" style="width:100%;">

        <div class="carousel-caption">

       <p>This is the Shahid Abdul Hamid Hall.It the most wonderful hall of RUET</p>
      </div>
      </div>

      <div class="item">
        <img src="images/tinshedfinal.jpg" alt="New york" style="width:100%;">

        <div class="carousel-caption">

       <p>This is the Tin Shed Hall (Extension).It the most wonderful and oldest hall of RUET</p>
      </div>
      </div>

      <div class="item">
        <img src="images/shahidulhallfinal.jpg" alt="New york" style="width:100%;">
        <div class="carousel-caption">

       <p>This is the Shahid Shahidul Islam Hall.It the most wonderful hall of RUET</p>
      </div>
      </div>


      <div class="item">
        <img src="images/bangabandhufinal.jpg" alt="New york" style="width:100%;">

        <div class="carousel-caption">

       <p>This is the Bangabandhu Sheikh Mujibur Rahman Hall.It the most wonderful and latest hall of RUET</p>
      </div>
      </div>

      <div class="item">
        <img src="images/selimhall.jpg" alt="New york" style="width:100%;">

        <div class="carousel-caption">

       <p>This is the Shahid Lt. Selim Hall.It the most wonderful and the second biggest hall of RUET</p>
      </div>
      </div>

      <div class="item">
        <img src="images/Sheikhhasinafinal.jpg" alt="New york" style="width:100%;">

        <div class="carousel-caption">

       <p>This is the Deshratna Sheikh Hasina Hall.It the most wonderful and only one ladies hall of RUET</p>
      </div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<br>
<br>
<br>

<div class="container col-sm-4">

  <div class="panel-group ">
    <div class="panel ">
     <div class="panel-heading " >

     <a href="#apt" data-toggle="collapse" class="btn btn-primary">Apply to be resident</a>
     </div>

       <div id="apt" class="collapse">
       <form class="" action="application.php" method="post">

        <div class=" form-group ">

          <select class="form-control" name="h_name">
            <option value="">Choose hall name</option>
           <?php
           $today=date('Y-m-d');


        $query_c="SELECT * from allot_info where apply_start<='$today' and apply_end>='$today' and access=1";
        $send_c=mysqli_query($connection,$query_c) or die(mysqli_error($connection));
         while($result_c=mysqli_fetch_array($send_c)){
           $id=$result_c['id'];
           $hall_name=$result_c['hall_name'];
           echo "<option value='$id'>$hall_name</option>";


         }

            ?>


          </select>

        </div>
        <div class="form-group ">
         <input type="submit" class="btn btn-primary" name="applicaton" value="Submit">
        </div>

       </form>
       </div>

   </div>

   <div class="panel">
<div class="panel-heading  ">
  <a href="#"class="btn btn-warning">Room change </a>

</div>

   </div>

   <div class="panel">
<div class="panel-heading  ">
 <a href="#" class="btn btn-danger">Seat cancel</a>

</div>

   </div>

   <div class="panel">
<div class="panel-heading">
 <a href="#" class="btn btn-success">Hall charge</a>

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

<?php


require_once("config.php");

$password1=$_POST['password'];
$email=$_POST['email'];
$designation=$_POST['designation'];




if($designation=="stuff"){
$email=base64_encode($email);//as data is encoded in database

$query="SELECT count(*) as user_no from hallofficer where email='$email'";
$send=mysqli_query($connection,$query);
$result=mysqli_fetch_array($send);

if($result['user_no']==0)
{
  header("Location:login.php?noenrty=1");
}

else {
  $query1="SELECT * FROM hallofficer WHERE email='$email'";
  $send1=mysqli_query($connection,$query1)or die(mysqli_error($connection));
  $result1=mysqli_fetch_array($send1);


  $name1=base64_decode($result1['name']);
  $email1=base64_decode($result1['email']);
  $hall_name1=base64_decode($result1['hall_name']);



  if(password_verify($password,$result1['password'])){
     session_start();
    $_SESSION['name']=$name1;
    $_SESSION['email']=$email1;
    $_SESSION['hall_name']=$hall_name1;
    $_SESSION['designation']="Hall Officer";



    header("Location:profile.php?success=1");
  }
  else {
 header("Location:login.php?missmass=1");
  }

}
}
else {
$email=base64_encode($email);//as data is encoded in database

  $query="SELECT count(*) as user_no from provost where email='$email'";
  $send=mysqli_query($connection,$query) or die(mysqli_error($connection));
  $result=mysqli_fetch_array($send);

  if($result['user_no']==0)
  {
header("Location:login.php?noenrty=1");
  }
  else {
    $query2="SELECT * FROM provost WHERE email='$email'";
    $send2=mysqli_query($connection,$query2)or die(mysqli_error($connection));
      $result2=mysqli_fetch_array($send2);

      $name2=base64_decode($result2['name']);
      $email2=base64_decode($result2['email']);
      $hall_name2=base64_decode($result2['hall_name']);
      $designation2=base64_decode($result2['designation']);



      if(password_verify($password,$result2['password'])
      && ($designation==$designation2)){
         session_start();
        $_SESSION['name']=$name2;
        $_SESSION['email']=$email2;
        $_SESSION['hall_name']=$hall_name2;
        $_SESSION['designation']=$designation2;

      header("Location:profile.php?success=1");
      }
      else {
      header("Location:login.php?missmass=1");
      }
  }
}

 ?>

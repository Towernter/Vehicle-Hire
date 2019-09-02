<?php

include_once "session.php";

$email=$_SESSION["email"];
$log=false;
$query="select * from customer where email='$email'";
$result=mysqli_query($mysqli,$query);

if(mysqli_num_rows($result)>0){
  $_SESSION['logged']=false;
  $quer="update `customer` set `logged`='$log' where email='$email'";
  mysqli_query($mysqli,$quer);
  header("location: ../accounts.php");

}else{

  $_SESSION['logged']=false;
  
    header("location: ../accounts.php");
  mysqli_close($mysqli);
}

?>
<?php

include_once "session.php";

$email=$_POST["email"];
$password=$_POST["password"];
$log=true;
$query="select * from customer where email='$email' and password='$password'";
$result=mysqli_query($mysqli,$query);

if(mysqli_num_rows($result)>0){
	$_SESSION['email']=$email;
	$_SESSION['MESSAGE']="";
	$_SESSION['logged']=true;
	$quer="update `customer` set `logged`='$log' where email='$email'";
	$result=mysqli_query($mysqli,$quer);
	header("location: ../purchase.php");

}else{

	$_SESSION['logged']=false;
 	
   	header("location: ../accounts.php");
   	$_SESSION['MESSAGE']="WRONG EMAIL OR PASSWORD, TRY AGAIN OR REGISTER!!";
	mysqli_close($mysqli);
}

?>
<?php

include_once "session.php";
            $name=$_POST['name'];
            $email=$_POST['email'];
            $msg=$_POST['message'];
            $sql="INSERT INTO `email` (  `name`, `email`, `message`)
            VALUES ('$name','$email','$msg')";
                     mysqli_query($mysqli,$sql);
     if ($msg!='') {
        echo '<script>alert("thankyou for your support");</script>';
     	header("location: ../index.php");
     	
     	//header("location: purchase.php");
     }

?>
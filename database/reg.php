<?php
include_once "session.php";

 //$_SESSION['MESSAGE']="";
$email=$_POST['email'];
    if ($email!='') {
        # code...
         $sql="select * from customer where email='$email'";
         $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   if ($email!='') {
                       # code...
                     $_SESSION['MESSAGE']='THIS EMAIL IS ALREADY TAKEN!!';
                     header("location: ../accounts.php");
                   }
           
            }else

            {

            $name=$_POST['name'];
            $surname=$_POST['surname'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            $org=$_POST['organisation'];
            $password=$_POST['password'];
            $vpassword=$_POST['vpassword'];
            $logged=$_POST['logged'];
    
            $sql="INSERT INTO `customer` (  `name`, `surname`, `email`, `phone`, `organisation`, `password`, `logged`)
            VALUES ('$name','$surname','$email','$phone','$org','$vpassword','$logged')";
                        
                if ($password==$vpassword) {
                    # code...
                     mysqli_query($mysqli,$sql);
                      $_SESSION['MESSAGE']="Registered Successifully You can now Login";
                     header("location: ../accounts.php");
                } else
                {
                    $_SESSION['MESSAGE']='Password doesNotMatch';
                    header("location: ../accounts.php");
                }        
           
      
            
            }
        
  }   


?>
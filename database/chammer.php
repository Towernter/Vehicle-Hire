<?php

include_once "session.php";
            $car=$_POST['hammer'];
            $hired=true;
            $not=false;
            $email= $_SESSION['email'];
            $_SESSION['report']="";
           // $_SESSION['hammer']="Available";

             $car="hammer";
             $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);
          
            if(mysqli_num_rows($result)>0)
            {
                    $row=mysqli_fetch_assoc($result);
                    if ($row["email"]==$email) {
                             $sql="DELETE FROM `hire` WHERE car_name='$car'and email='$email'";
                             mysqli_query($mysqli,$sql);
                             $_SESSION['report']="Thank You For Hiring @Mana Call again ";
                            header("location: ../purchase.php"); 
                        }
                        else{
                           $_SESSION['report']="Sorry you are not the one who hired this Hammer";
                           header("location: ../purchase.php");    
                        }
            
           }
           else{
             $_SESSION['report']="This Hammer is available click hire to Hire";
              header("location: ../purchase.php");      
           }
       
      
      
?>
<?php


        include_once "session.php";
            $car=$_POST['hammer'];
            $hired=true;
            $destination=$_POST['destination'];
            $email=	$_SESSION['email'];
            $_SESSION['report']="";
           // $_SESSION['hammer']="Available";
              if ( $destination=='Chinhoyi') {
              $cost=120*5;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*5;
          }
          else if ($destination=='Gweru') {
            $cost=330*5;
          }
          else if ($destination=='Masvingo') {
            $cost=240*5;
          }
          else if ($destination=='Mutare') {
            $cost=200*5;
          }
          else if ($destination=='Marondera') {
            $cost=80*5;
          }
          else {
            $cost=500*5;
          }
             $car="hammer";
           	 $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                     //$_SESSION['hammer']="Hired";
                     $_SESSION['report']="The Hammer is already hired";
                     header("location: ../purchase.php"); 
            
           }
           else{
           	 $car="hammer";
				     $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
           		mysqli_query($mysqli,$sql);
              //$_SESSION['hammer']="Hired";
              header("location: ../purchase.php");      
           }
       
     	
     	
           




?>
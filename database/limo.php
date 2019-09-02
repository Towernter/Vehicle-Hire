<?php


        include_once "session.php";
            
            $car=$_POST['limousine'];
            $hired=true;
            $destination=$_POST['destination'];
            $email=	$_SESSION['email'];
            $car="limousine";
            $_SESSION['limo']="Available";
           // $_SESSION['report']=""; 
              if ( $destination=='Chinhoyi') {
              $cost=120*4;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*4;
          }
          else if ($destination=='Gweru') {
            $cost=330*4;
          }
          else if ($destination=='Masvingo') {
            $cost=240*4;
          }
          else if ($destination=='Mutare') {
            $cost=200*4;
          }
          else if ($destination=='Marondera') {
            $cost=80*4;
          }
          else {
            $cost=500*4;
          }

           	 $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                    $_SESSION['limo']="Hired";
                    $_SESSION['report']="The limo is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
           	   $car="limousine";
				 $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
           		mysqli_query($mysqli,$sql);
                //echo "inserted"; 
                 $_SESSION['limo']="Hired";
                 header("location: ../purchase.php");  
           }
       
     	
     	
           




?>
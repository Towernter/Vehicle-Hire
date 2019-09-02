<?php


        include_once "session.php";
            $car=$_POST['sprinter'];
            $hired=true;
            $destination=$_POST['destination'];
            $email= $_SESSION['email'];
            $_SESSION['report']="";
            $_SESSION['sprinter']="Available";
            $car="sprinter";
           if ( $destination=='Chinhoyi') {
              $cost=120*8;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*8;
          }
          else if ($destination=='Gweru') {
            $cost=330*8;
          }
          else if ($destination=='Masvingo') {
            $cost=240*8;
          }
          else if ($destination=='Mutare') {
            $cost=200*8;
          }
          else if ($destination=='Marondera') {
            $cost=80*8;
          }
          else {
            $cost=500*8;
          }
             $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                    $_SESSION['sprinter']="Hired";
                    $_SESSION['report']="The sprinter is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
              $car="sprinter";
              $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
              mysqli_query($mysqli,$sql);
              $_SESSION['sprinter']="Hired";
              header("location: ../purchase.php");      
           }
       
      
      
           




?>
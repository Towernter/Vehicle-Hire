<?php


        include_once "session.php";
            $car=$_POST['delta'];
            $hired=true;
            $destination=$_POST['destination'];
            $email= $_SESSION['email'];
            $_SESSION['report']="";
            $_SESSION['delta']="Available";
            $car="delta";
          if ( $destination=='Chinhoyi') {
              $cost=120*10;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*10;
          }
          else if ($destination=='Gweru') {
            $cost=330*10;
          }
          else if ($destination=='Masvingo') {
            $cost=240*10;
          }
          else if ($destination=='Mutare') {
            $cost=200*10;
          }
          else if ($destination=='Marondera') {
            $cost=80*10;
          }
          else {
            $cost=500*10;
          }
          
             $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                    $_SESSION['delta']="Hired";
                    $_SESSION['report']="The delta is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
              $car="delta";
              $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
              mysqli_query($mysqli,$sql);
              $_SESSION['delta']="Hired";
              header("location: ../purchase.php");      
           }
       
      
      
           




?>
<?php


        include_once "session.php";
            $car=$_POST['actros'];
            $hired=true;
            $destination=$_POST['destination'];
            $email= $_SESSION['email'];
            $_SESSION['report']="";
            $_SESSION['actros']="Available";
            $car="actros";
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
                   
                    $_SESSION['actros']="Hired";
                    $_SESSION['report']="The actros is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
              $car="actros";
              $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
              mysqli_query($mysqli,$sql);
              $_SESSION['actros']="Hired";
              header("location: ../purchase.php");      
           }
       
      
      
           




?>
<?php


        include_once "session.php";
            $car=$_POST['tourist'];
            $hired=true;
            $destination=$_POST['destination'];
            $email= $_SESSION['email'];
            $_SESSION['report']="";
            $_SESSION['tourist']="Available";
            $car="tourist";
          if ( $destination=='Chinhoyi') {
              $cost=120*15;
          }
          else if ($destination=='Bulawayo') {
            $cost=320*15;
          }
          else if ($destination=='Gweru') {
            $cost=330*15;
          }
          else if ($destination=='Masvingo') {
            $cost=240*15;
          }
          else if ($destination=='Mutare') {
            $cost=200*15;
          }
          else if ($destination=='Marondera') {
            $cost=80*15;
          }
          else {
            $cost=500*15;
          }
             $sql="select * from hire where car_name='$car' and hired='$hired'";
             $result=mysqli_query($mysqli,$sql);

            if(mysqli_num_rows($result)>0)
            {
                   
                    $_SESSION['tourist']="Hired";
                    $_SESSION['report']="The tourist is already hired";
                    header("location: ../purchase.php"); 
            
           }
           else{
              $car="tourist";
               $sql="INSERT INTO `hire` (  `car_name`, `email`,`destination`, `hired`,`cost`)
              VALUES ('$car','$email','$destination','$hired','$cost')";
              mysqli_query($mysqli,$sql);
              $_SESSION['tourist']="Hired";
              header("location: ../purchase.php");      
           }
       
      
      
           




?>
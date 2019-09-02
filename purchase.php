<?php 
   include_once "database/session.php";
   if(isset($_SESSION['logged'])){
	if((isset($_SESSION['logged']) )){
	$val=$_SESSION['email'];
     $query="select * from customer where email='$val'";
        $result=mysqli_query($mysqli,$query);

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
           if($row["logged"]==false) {
           	$_SESSION['MESSAGE']="Login First Inorder To Hire";
            header("location: accounts.php");
           }
        }else{
header("location: accounts.php");
 $_SESSION['MESSAGE']="Login First Inorder To Hire";
}
    


}elseif (!isset($_SESSION['logged'])) {
    header("location: accounts.php");
    $_SESSION['MESSAGE']="Login First Inorder To Hire";
}
}else{
header("location: accounts.php");
 $_SESSION['MESSAGE']="Login First Inorder To Hire";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hire</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="styles.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span><span class="icon-bar"></span>
                            </button>
                <a href="#" class="navbar-brand"><img src="img/logo.png" alt="" class="img-responsive"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="accounts.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>AccountServices</a></li>
                    <li><a href="products.php">Our Products</a></li>
                    <li class="active"><a href="purchase.php">Hire</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron"><br>
     <h3><center><?php if (isset($_SESSION['report'])) {
     	echo $_SESSION['report'];
        $_SESSION['report']="";  }?> </center>	<br></h3>
    </div>
     <div class="panel " id="containers ">
                    <div class="main-color-bg panel panel-default ">
                        <div class="panel-heading " style="background:rgb(211, 32, 32); color:#fff; ">
                            <h3 class="panel-title ">WELCOME: <?php 
                             $val=$_SESSION['email'];
						     $query="select * from customer where email='$val'";
						     $result=mysqli_query($mysqli,$query);
						     $row=mysqli_fetch_assoc($result);
						     echo ($row["name"]." ".$row["surname"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp[Dont forget to click the vehicle for details]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"database\logout.php\"><span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"></span>LOGOUT</a>");
                            ?><center> </center> </h3>
                        </div>
                    </div>
                    <div class="panel-body ">
                    	<table  class="table">
                               <thead>
                                <tr>
                                	<center><h4>Vehicles You Hired</h4></center>
                               <th>#</th>
                                <th>Vehicle_name</th>
                                <th>Destination</th>
                                <th>Cost($)</th>
                                </tr>
                            </thead>
                            <tbody>
                         <?php  
                                $email=$_SESSION['email'];           
                                $count=0;
                                $query="select * from hire where email='$email'";
                                $result=mysqli_query($mysqli,$query);

                                while($row=mysqli_fetch_array($result)){
                                   $count+=1;
                                       echo "<tr>";  
                                       echo "<td> ".$count." </td>";
                                       echo "<td> ".$row["car_name"]."</td>";
                                       echo "<td> ".$row["destination"]."</td>";
                                       echo "<td> ".$row["cost"]."</td>";
                                       echo "</tr>";                   
                                   }
                                    
                               ?>
                      </tbody>
                    </table>

                    </div>
                </div>
    <div class="container">
    	<div class="row">
    		 <div class="col-md-9 col-xs-9 ">
                <div class="panel well " id="cars ">
                    <div class="main-color-bg panel panel-default ">
                        <div class="panel-heading " style="background:rgb(211, 32, 32); color:#fff; ">
                            <h3 class="panel-title ">Cars </h3>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="col-md-4  ">
                            <form action="database/hammer.php" method="POST">
                            	<a href="# "><img src="img/cars/2.jpg " data-content="<p>Good for Weddings</><br><p>Very Comfortable</><br><p>Costs $5.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right " title="Hammer_Limousine " data-html="true"> </a>
                            	<input class="collapse" type="text" name="hammer" >
                            	<pre class="pre">Status:             <?php  //echo $_SESSION['hammer'];  //$_SESSION['hammer']="";  
                                  $val="hammer";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
                            	?></pre>
                            	
                            	<strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination" >
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					             <div class="bt "><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                            <form action="database/chammer.php" method="POST">
                            <input class="collapse" type="text" name="hammer" >
                            <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4  ">
                           <form action="database/limo.php" method="POST">
                           	 <a href="# "><img src="img/cars/1.png " data-content="<p>Wanna impress a girl</><br><p>For bling bling</><br><p>Costs $4.00/km</><br>" class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right " title="......Limousine...." data-html="true "></a>
                            <input class="collapse" type="text" name="limousine" >
                            <pre class="pre">Status:             <?php    //$_SESSION['limo']="";  
                               $val="limousine";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
                            ?></pre>
                           
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					             <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                           </form>
                            <form action="database/climo.php" method="POST">
                             <input class="collapse" type="text" name="limousine" >
                            <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4 ">
                            <form action="database/po.php" method="POST">
                            	<a href="# "><img src="img/cars/3.jpg "  data-content="<p>For the love of peed</><br><p>Very Comfortable</><br><p>Costs $4.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right " title=".....Porsche..... " data-html="true "></a>
                           		 <input class="collapse" type="text" name="porsche" >
                            	<pre class="pre">Status:            <?php   //$_SESSION['po']="";
                                   $val="porsche";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
                            	?></pre>
                            	
                            	
                            	<strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					             <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                             <form action="database/cpo.php" method="POST">
                             <input class="collapse" type="text" name="porsche" >
                             <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                    </div>
                </div>
                <div class="panel well " id="trucks ">
                    <div class="main-color-bg panel panel-default ">
                        <div class="panel-heading " style="background:rgb(211, 32, 32); color:#fff; ">
                            <h3 class="panel-title ">Trucks</h3>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="col-md-4  ">
                            <form action="database/actros.php" method="POST">
                            	<a href="# "><img src="img/trucks/actros-and-tank.jpg " data-content="<p>Super Fast</><br><p>For Transporting Liquids</><br><p>Costs $10.00/km</><br>" class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title="Actros__Haulage_Truck" data-html="true "></a>
                            	<input class="collapse" type="text" name="actros" >
	                            <pre class="pre">Status:             <?php  //$_SESSION['limo']=""; 
	                              $val="actros";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                             ?></pre>
	                           
	                            
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					              <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                             <form action="database/cactros.php" method="POST">
                             <input class="collapse" type="text" name="actros" >
                             <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4  ">
                            <form action="database/exp.php" method="POST">
                            	<a href="# "><img src="img/trucks/exp-for-containers.jpg " data-content="<p>Quantiy is What Matters</><br><p>For Arbnomal loads and containers</><br><p>Costs $10.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title="Exp_Haulage_Truck" data-html="true "></a>
                            	<input class="collapse" type="text" name="exp" >
	                            <pre class="pre">Status:             <?php   //$_SESSION['exp']="";  
	                            	$val="exp";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                            ?></pre>
	                           
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					              <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                             <form action="database/cexp.php" method="POST">
                             <input class="collapse" type="text" name="exp" >
                             <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4  ">
                            <form action="database/volvo.php" method="POST">
                            	<a href="# "><img src="img/trucks/volvo.jpg " data-content="<p>Wanna Carry Fragile?</><br><p>For Fragile Things</><br><p>Costs $15.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title=" Volvo_Haulage_truck" data-html="true "></a>
                            		<input class="collapse" type="text" name="volvo" >
	                            <pre class="pre">Status:             <?php   //$_SESSION['volvo']="";  
	                            	$val="volvo";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                            ?></pre>
	                            
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					             <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                             <form action="database/cvolvo.php" method="POST">
                             <input class="collapse" type="text" name="volvo" >
                             <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                    </div>
                </div>
                <div class="panel well " id="buses ">
                    <div class="main-color-bg panel panel-default ">
                        <div class="panel-heading " style="background:rgb(211, 32, 32); color:#fff; ">
                            <h3 class="panel-title ">Buses</h3>
                        </div>
                    </div>
                    <div class="panel-body ">
                        <div class="col-md-4  ">
                           <form action="database/delta.php" method="POST">
                           	 <a href="# "><img src="img/buses/delta.jpg " data-content="<p>Its comfortable and Big</><br><p>Carries 75 passengers</><br><p>Costs $10.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title="Delta__Bus_" data-html="true "></a>
                           	 <input class="collapse" type="text" name="delta" >
	                            <pre class="pre">Status:             <?php    //$_SESSION['delta']="";  
	                            	$val="delta";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                            ?></pre>
	                           
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					             <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                           </form>
                            <form action="database/cdelta.php" method="POST">
                            <input class="collapse" type="text" name="delta" >
                            <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4 ">
                           <form action="database/sprinter.php" method="POST">
                           	 <a href="# "><img src="img/buses/sprinter.png " data-content="<p>Faster that the Fastest</><br><p>Carries 25 Passengers</><br><p>Costs $8.00/km</><br>" class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title="Mercedes_sprinter_" data-html="true "></a>
                           	 	<input class="collapse" type="text" name="sprinter" >
	                            <pre class="pre">Status:             <?php    //$_SESSION['sprinter']="";  
	                            	$val="sprinter";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                            ?></pre>
	                           
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					              <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                           </form>
                            <form action="database/csprinter.php" method="POST">
                            <input class="collapse" type="text" name="sprinter" >
                            <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                        <div class="col-md-4 ">
                            <form action="database/tourist.php" method="POST">
                            	<a href="# "><img src="img/buses/tourist.png " data-content="<p>Wanna view the world?</><br><p>Then Tourist bus Is for you</><br><p>Costs $8.00/km</><br>"class="img-responsive thumbnail " alt=" " data-toggle="popover " data-placement="right" title="Tourist_bus__" data-html="true "></a>
                            	<input class="collapse" type="text" name="tourist" >
	                            <pre class="pre">Status:             <?php   //$_SESSION['tourist']=""; 
	                            	$val="tourist";
								     $query="select * from hire where car_name='$val'";
								        $result=mysqli_query($mysqli,$query);

								        if(mysqli_num_rows($result)>0){
								            $row=mysqli_fetch_assoc($result);
								           if($row["hired"]==false) {
								            echo "Available";
								           }
								           else{ echo "Hired";}
								        }else{ echo "Available";}
	                             ?></pre>
	                           
                            <strong> Destination:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</strong><select required="required" name="destination">
					                <option >Chinhoyi</option>
					                <option >Bulawayo</option>
					                <option >Gweru</option>
					                <option >Masvingo</option>
					                <option >Mutare</option>
					                <option >Marondera</option>
					                <option >Victoria Falls</option>
					             </select>
					              <div class="bt"><input type="submit" name="hire" value="...HIRE..."></div>
                            </form>
                             <form action="database/ctourist.php" method="POST">
                             <input class="collapse" type="text" name="tourist" >
                             <div class="bt "><input type="submit" name="hire" value="CANCEL"></div></form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-xs-3 ">
                <nav id="mainNavbar">
                    <ul class="nav nav-pills nav-stacked" data-spy="affix" data-offset="200">
                        <div class="well">
                        	<div class="panel-heading " style="background:rgb(211, 32, 32); color:#fff; ">
                              <h3 class="panel-title ">List of Destinations</h3>
                            </div>
                            <br>
                       <section required="required" name="rel" >
                              <h4 class="h">
                              <pre><option>Chinhoyi      :120km</option></pre>
                              <pre><option>Bulawayo      :320km</option></pre>
                              <pre><option>Gweru         :330km</option></pre>
                              <pre><option>Masvingo      :240km</option></pre>
                              <pre><option>Mutare        :200km</option></pre>
                              <pre><option>Marondera     :80km</option></pre>
                              <pre><option>Victoria Falls:500kn</option></pre>
                              </h4>
                           </section> 
                           </div>
                        </div>
                    </ul>
                </nav>
            </div>
    	</div>
    </div>
     <script>
        $(function() {
            $('[data-toggle="popover "]').popover()
        })
    </script>
</body>

</html>
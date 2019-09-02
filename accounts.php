<?php

include_once "database/session.php";
  

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounts</title>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="styles.css" rel='stylesheet' type='text/css' />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>AccountServices</a></li>
                    <li><a href="products.php">Our Products</a></li>
                    <li><a href="purchase.php">Hire</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron"><br><br>
        <div><center><p class="small"><?php if (isset($_SESSION['MESSAGE'])) {
          echo $_SESSION['MESSAGE']; $_SESSION['MESSAGE']="";
        } ?></p></center></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="row">
                    <div class="list-group ">
                        <div class="list-group-item tawa">
                            <center>
                                <h1>Aready Registered</h1>
                            </center>
                        </div>
                        <div class="list-group-item">
                            <form action="database/login.php" method="post">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control " required="required" placeholder="Your Email" />
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control " required="required" placeholder="password" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-default btn-block btn-lg">Get Started</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="list-group ">
                        <img src="img/logo.png" alt="" height="10%" class="img-responsive">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="list-group ">
                    <div class="list-group-item tawa">
                        <center>
                            <h1>Create Account</h1>
                        </center>
                    </div>
                    <div class="list-group-item">
                        <form action="database/reg.php" method="post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control " required="required" placeholder="Your Name" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="surname" class="form-control " required="required" placeholder="Your SurName" />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control " required="required" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <input type="number" name="phone" class="form-control " required="required" placeholder="Your Phone Number" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="organisation" class="form-control " required="required" placeholder="Organisation(optional)" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control " required="required" placeholder="password" />
                            </div>
                            <div class="form-group">
                                <input type="password" name="vpassword" class="form-control " required="required" placeholder="verify Password" />
                            </div>
                            <br><br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default btn-block btn-lg">REGISTER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container-fluid text-center">
            <div class="row">
                <div class="col-md-4 col-lg-4 col-xs-4">
                    <h3>Contact us</h3>
                    <br>
                    <p>0000 Pasi Pemuti Harare Zimbabwe</p>
                    <br>
                    <p>Call Mr No-One: &nbsp;077777777</p>
                     <p>mana@mana.co.zw</p>
                    <h4>We are Here To Save</h4>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-4">
                    <h3>Connect with us</h3>
                    <a href="#" class="fa fa-facebook"><img src="img/facebook.png" alt=""></a>
                    <a href="#" class="fa fa-twitter"><img src="img/twitter.png" alt=""></a>
                    <a href="#" class="fa fa-linkedin"><img src="img/google.png" alt=""></a>
                </div>
                <div class="col-md-4 col-lg-4 col-xs-4">
                    <a href="#" class="navbar-brand"> </a>
                    <h3>We value our customers</h3>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
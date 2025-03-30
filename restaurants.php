<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 

    <style>
        .dropbtn {
  background-color: #d4d4d4;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
        .navbar {
    padding: 0.95rem 1rem;
    border-radius: 0;
    background-color: black;}

    .img-rounded{
        height: 100px;
        width: 100px;
        margin-top: -35px;
        margin-bottom: -35px;
    }
    *,
        *:before,
        *:after{
            padding: 0px;
            margin: 0px;
            box-sizing: border-box ;
        }
        body{
            background-color: #121317;
        }
        .nav-link{
            height: 40px;
            width: auto;
            min-width: 5px;
            display: flex;
            justify-content: space-around;
            margin: 5px;
            margin-right: 5pt;
            margin-top : -10px;
            padding: -40px;

        }
        .nav-link{
            position: relative;
            text-decoration: double;
            color: #ffffff;
            font-family:cursive;
            font-size: 25px;
            letter-spacing: -1px;
            justify-items: left;
            /* padding: 5px;
            height: 2px; */
        }
        .nav-link:before,
        .nav-link:after{
            content: "";
            position: absolute;
            height: 4px;
            width: 0px;
            background-color: #18f08b;
            transition: 1s;
            margin: auto;
        }
        .nav-link:after
        {
            left:0;
            bottom: -10px;
        }
        .nav-link:before{
            right: 0;
            top: 5px;
        }
        .nav-link:hover{
            color: #ffffff;
        }
        .nav-link:hover:after,
        .nav-link:hover::before
        {
            width: 100%;
        }
        .popular {
    padding: 70px 0 90px;
    background-size: 100%;
    background-color: #ffffff;
        }

        .fafa
        {
            height: 40px;
            width: auto;
            min-width: 5px;
            display: flex;
            justify-content: space-around;
            margin: 5px;
            margin-right: 5pt;
            margin-top : 2px;
            padding: -40px;
            position: relative;
            color: #ffffff;
        }

        body {
    background: rgba(255, 255, 255, 0.68);
    font-size: 16px;
    color: #ffffff;
    font-weight: 400;
    overflow-x: hidden;
}
.food-item-wrap h3 a {
    color: #25282b;
    font-size: 28px;
    font-weight: 600;
    font-family:cursive;
    text-align:center;
}
.food-item-wrap:hover h3>a,
.food-item-wrap:hover .right-text>a {
    color: #0058b4 ;
}

.theme-btn {
    background-color: #0058b4;
    border-color: #0058b4;
    color: #0058b4;
}

.theme-btn-dash {
    border: 2px dashed #0058b4;
    background-color: transparent;
    color: #000000;
}

.theme-btn-dash:hover,
.theme-btn,
.theme-btn.btn-lg:hover,
.btn-secondary:hover {
    background-color: #0058b4;
    color: #ffffff;
    border: 1px solid #0058b4;
}

.theme-btn-dash:hover {
    border: 2px solid #0058b4;
    color: #ffffff}

    .container .info h1 {
    margin: 0 0 15px;
    padding: 0;
    font-size: 36px;
    font-weight: 300;
    font-family:cursive;
    color: #1a1a1a;
  }

    </style>

</head>

<body>

        <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/food-logo.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item" style="margin-top:1px;">
                            <div class="dropdown">
                            <!-- <li class="nav-item" color=> -->
                            <button class="nav-link active " style=" background:#000000; border:none; margin: top 15px;">Pages</button>
                                <div class="dropdown-content">
                                <a href="fooddonation.php">Food Donation</a>
                                <a href="aboutus.php">About Us</a>
                                <a href="contactus.php">Contact Us</a>
                                </div>
                            </div>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>&nbsp;&nbsp;';
                          echo '<li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                          echo '<li class = "nav-item"><a href="cart.php" class="fafa"><i class="fa fa-shopping-cart" style=" font-size:24px; color:#ffffff"></i></a> </li>
                                <li class = "nav-item"><a href="profile.php" class="fafa"><i class="fas fa-user-circle" style=" font-size:24px; color:#ffffff"></i></a> </li>';
                        }
                    else
                        {
                                
                                
                            echo  ' 
                                <li class="nav-item" style="margin-top:-1px;">
                                        <div class="dropdown">
                                        <button class="nav-link " style=" background:#000000; color:#ffffff; border:none; ">Order History</button>
                                            <div class="dropdown-content">
                                            <a href="your_orders.php">Orders</a>
                                            <a href="">Advance Orders</a>
                                            </div>
                                        </div>
                                    </li>
 ';
                            echo '<li class = "nav-item"><a href="cart.php" class="fafa"><i  class="fa fa-shopping-cart" style=" font-size:24px; color:#ffffff"></i></a> </li>
                            <li class = "nav-item"><a href="profile.php" class="fafa"><i  class="fas fa-user-circle" style=" font-size:24px; color:#ffffff"></i></a> </li>';
                            echo '<li class = "nav-item"><a href="logout.php" class="fafa"><i class="fa fa-sign-out" style=" color:#ffffff;font-size:24px; "></i></a> </li>';
                            
                        }

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
            <div class="top-links">
                <div class="container">
                    <ul class="row links">
                       
                        <li class="col-xs-12 col-sm-4 link-item active" ><span style="background: rgb(210,232,241); color:#000000;">1</span><a href="#">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span  style="background: #ffffff; color:#000000;">2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span style="background: #ffffff; color:#000000;">3</span><a href="#">Order and Pay</a></li>
                    </ul>
                </div>
            </div>
            <div class="inner-page-hero bg-image" data-image-src="images/img/res7.jpeg">
                
            </div>
           
            <section class="restaurants-page">

          

                <div class="container">
                    <div class="row">
                       <br><br>
                        <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9" style="margin-left: -50px; width : 1380px; height : 650px;">
                            <div class="bg-gray restaurant-entry">
                            <div class="row">
                <?php $ress= mysqli_query($db,"select * from restaurant");
                                $resst= mysqli_query($db,"select * from res_category");
									      while($rows=mysqli_fetch_array($ress) And $rowsss=mysqli_fetch_array($resst) )
                                {
                                    echo '<div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                            <div class="food-item-wrap">
                                                <div class="figure-wrap bg-image">
                                                <a  href="dishes.php?res_id='.$rows['rs_id'].'" ><img src="admin/Res_img/'.$rows['image'].'" height="210" width="455" alt="Food logo"></a></div>
                                                <div style="text-align:center;" class="content">
                                                <h3><a  href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a><h6><br>
                                                                ' .$rowsss['c_name'].'  Restaurant<br><br>
                                                                <i class="fas fa-clock"  style="color: #b8b8b8; font-size:15px;"></i>'.$rows['o_hr'].'</span> <span>-'.$rows['c_hr'].'
                                                            <br><br><a href="dishes.php?res_id='.$rows['rs_id'].'" class="btn theme-btn-dash">View Menu</a>
                                                           		
                                            </div>
                                                </div></div>  ';   
                                }	
						?>
                                    
                                </div>

                               
                
                            </div>
                         
                            
                                
                            </div>
                          
                </div>
                          
                           
                        </div>
                    </div>
                </div><br><br>
               
            </section>
       
        <!-- <footer class="footer">
            <div class="container">
                
              
                <div class="bottom-footer">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 payment-options color-gray">
                            <h5>Payment Options</h5>
                            <ul>
                                <li>
                                    <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                </li>
                                <li>
                                    <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>213, Raheja Chambers, Free Press Journal Road, Nariman Point, Mumbai, Maharashtra 400021, India</p>
                                    <h5>Phone: +91 8093424562</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                   <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                                </div>
                    </div>
                </div>
       
            </div>
        </footer> -->
        
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>

</html>
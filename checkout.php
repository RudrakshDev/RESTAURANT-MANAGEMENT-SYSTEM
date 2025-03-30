<!DOCTYPE html>
<html lang="en">
    <head>
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
        .btn-outline-successs {
    color: #ff0000;
    background-image: none;
    background-color: transparent;
    border-color: solid 2px #ff0000;
}
.btn-outline-successs:hover {
    color: #ffffff;
    background-color: #ff0000;
    border-color: red;
}
label {
  display: flex;
  align-items: center;
  margin-bottom: 10px;
}

input[type="radio"] {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  border: 2px solid #ccc;
  margin-right: 10px;
  outline: none;
}

input[type="radio"]:checked {
  background-color: #2196F3;
  border-color: #2196F3;
}

span {
  font-size: 16px;
}


    </style>


    </head>
    <?php
include("connection/connect.php");
include_once 'product-action.php';

error_reporting(0);
session_start();

function function_alert() { 
    echo "<script>alert('Thank you! Your Order Placed successfully!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

        
        
    

if(empty($_SESSION["user_id"])) {
    header('location:login.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve the selected address and the content
        $selectedAddress = $_POST['address'];
        $addressContent = '';
      
        if ($selectedAddress === 'address1') {
          $addressContent = $_POST['address1'];
        } elseif ($selectedAddress === 'address2') {
          $addressContent = $_POST['address2'];
        } elseif ($selectedAddress === 'address3') {
          $addressContent = $_POST['address3'];
        }
      
        
      }
    $item_total = 0;
    foreach ($_SESSION["cart_item"] as $item) {
        $item_total += ($item["price"]*$item["quantity"]);
        if($_POST['submit']) {
            
            $SQL="INSERT INTO users_orders (u_id, title, quantity, price, rs_id, address) VALUES ('" . $_SESSION["user_id"] . "', '" . $item["title"] . "', '" . $item["quantity"] . "', '" . $item["price"] . "', '" . $item["rs_id"] . "', '$addressContent')";
            mysqli_query($db,$SQL);
            unset($_SESSION["cart_item"]);
            
            $success = "Thank you! Your Order Placed successfully!";
            function_alert();
        }
    }
    //$sql = "SELECT address1, address2, address3 FROM users WHERE user_id = '".$_SESSION["user_id"]."'";
    $query=mysqli_query($db,"SELECT * from users where u_id='".$_SESSION["user_id"]."'");
    // $result = mysqli_query($connection, $sql);
    // $row = mysqli_fetch_assoc($result);
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $address3=$_POST['address3'];
    

}

?>
<!-- 
unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]); -->


<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">   
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="icon" href="#">
    <title>Checkout</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     </head>
<body>
    
    <div class="site-wrapper">
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
                            <button class="nav-link " style=" background:#000000; color:#fff; border:none; margin: top -25px;">Pages</button>
                                <div class="dropdown-content">
                                <a href="fooddonation.php">Food Donation</a>
                                <a href="aboutus.php">About Us</a>
                                <a href="contactus.php">Contact Us</a>
                                </div>
                            </div>
                        </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
                        {
                            echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>&nbsp;&nbsp;';
                          echo '<li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
                          echo '<li class = "nav-item"><a href="cart.php" class="fafa"><i class="fa fa-shopping-cart" style=" font-size:24px; color:#ffffff"></i></a> </li>
                                <li class = "nav-item"><a class="fafa"><i class="fas fa-user-circle" style=" font-size:24px; color:#ffffff"></i></a> </li>';
                        }
						else
                        {		
                            echo  '  
                            <li class="nav-item" style="margin-top:-1px;">
                                        <div class="dropdown">
                                        <button class="nav-link " style=" background:#000000; color:#ffffff; border:none; ">Order History</button>
                                            <div class="dropdown-content">
                                            <a href="your_orders.php">Orders</a>
                                            <a href="your_adv_orders.php">Advance Orders</a>
                                            </div>
                                        </div>
                                    </li> ';
                            echo '<li class = "nav-item"><a href="cart.php" class="fafa"><i  class="fa fa-shopping-cart" style=" font-size:24px; color:#ffffff"></i></a> </li>
                            <li class = "nav-item"><a href="profile.php" class="fafa"><i  class="fas fa-user-circle" style=" font-size:24px; color:#ffffff"></i></a> </li>';
                            echo '<li class = "nav-item"><a href="logout.php" class="fafa"><i class="fa fa-sign-out" style=" font-size:24px; color:#ffffff"></i></a> </li>';
                            
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
                      
                    <li class="col-xs-12 col-sm-4 link-item active" ><span style="background: #ffffff; color:#000000;">1</span><a href="#">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span  style="background: #ffffff; color:#000000;">2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span style="background: rgb(210,232,241); color:#000000;">3</span><a href="#">Order and Pay</a></li>
                    </ul>
                </div>
            </div>
			
                <div class="container">
                 
					   <span style="color:green;">
								<?php echo $success; ?>
										</span>
					
                </div>
                
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body" style="color:#000000">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h4><b>Cart Summary</b></h4> <br><br></div>
                                        <div class="cart-totals-fields">
										
                                            <table class="table">
											<tbody>
                                          
												 
											   
                                                    <tr>
                                                        <td>Cart Subtotal</td>
                                                        <td> <?php echo "₹".$item_total; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Delivery Charges</td>
                                                        <td>Free</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Total</strong></td>
                                                        <td class="text-color"><strong> <?php echo "₹".$item_total; ?></strong></td>
                                                    </tr>
                                                </tbody>
												
                                            </table>
                                            <br><br><br>
                                           <h4><b>Select Your Address </b></h4><br><br>
                                            <?php
                                            while($row=mysqli_fetch_array($query))
                                            {
                                                ?>
                                            <div class="address-area">
                                            <label>
                                            <input type="radio" name="address" id="address1" value="address1"><input  style="width : 1100px; margin-top: -20px; border:none; background-color:#eceeef; border: 1px solid #eaebeb; border-radius: 2px px;"type="text" id="address1" name="address1" value="<?php echo $row['address1']; ?>" readonly></label>
                                            </div><br>
                                            <div class="address-area">
                                            <label>
                                            <input type="radio" name="address" id="address2" value="address2"><input style="width : 1100px; margin-top: -20px; border:none; background-color:#eceeef;border: 1px solid #eaebeb; border-radius: 2px px;" type="text" id="address2" name="address2" value="<?php echo $row['address2']; ?>" readonly></label>
                                                </div><br>
                                            <div class="address-area">
                                            <label>
                                            <input type="radio" name="address" id="address3" value="address3"><input style="width : 1100px; margin-top: -20px; border:none; background-color:#eceeef; " type="text" id="address3" name="address3" value="<?php echo $row['address3']; ?>" readonly></label>
                                                </div><br>
                                            <h6><i><b>Note : If you want to Update any Address Update it From Profile</b></i></h6><br><br><br>
                                        
                                            

                                            

                                                    
                                            
                                        </div>
                                    </div>

                                    <h4><b>Select Payment Method </b></h4><br><br>
                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" required checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on Delivery</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radioStacked1" required value="paypal" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                        <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit" id="orderSubmit"  class="btn btn-outline-success btn-block" value="Order now"> </p>
                                        <ul class="">
                                            <li class="btn btn-outline-successs btn-block"><a class="" href="advorder.php" style="color:red;">Advance order <span class="sr-only"></span></a></li>
                                         </ul>
                                        </div>
                                    </div>
                                    <?php
                                            }

                                           

                                            ?>
                                   
									</form>
                                   
                                   
                                </div>
                            </div>
                       
                    </div>
                </div>
               
				 </form>
                
                
            </div>
            
           
        </div>
         </div>

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

<?php

?>

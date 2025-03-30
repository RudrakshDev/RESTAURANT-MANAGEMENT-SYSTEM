<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
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
            font-family:"Poppins";
            color: #ffffff;
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
    border-color: solid 1px #ff0000;
}
.btn-outline-successs:hover {
    color: #fff;
    background-color: #ff0000;
    border-color: red;
}

table {
  text-align: left;
  position: relative;
  border-collapse: collapse; 
  background-color: #f6f6f6;
}/* Spacing */
td, th {
  border: 1px solid #999;
  padding: 20px;
}
th {
  background: rgb(210,232,241);
  color: black;
  border-radius: 0;
  position: sticky;
  top: 0;
  padding: 10px;
}
.primary{
  background-color: rgb(210,232,241);
  color : black;
}

tfoot > tr  {
  background: rgb(210,232,241);
  color: white;
}
tbody > tr:hover {
  background-color: rgb(210,232,241);
}
body {
    background: #ffca93;
}

    </style>
    </head>
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thankyou! Your Order Placed successfully!');</script>"; 
    echo "<script>window.location.replace('your_adv_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{

										  
	foreach ($_SESSION["cart_item"] as $item)
												{
											
												    $item_total += ($item["price"]*$item["quantity"]);
												
													if($_POST['submit'])
													{
						
													$SQL="insert into adv_orders(u_id,title,quantity,price,adate,atime,rs_id) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."','".$_POST['date']."','".$_POST['time']."','".$item["rs_id"]."')";
						
														mysqli_query($db,$SQL);
														
                                                        
                                                        unset($_SESSION["cart_item"]);
                                                        unset($item["title"]);
                                                        unset($item["quantity"]);
                                                        unset($item["price"]);
                                                        
														$success = "Thankyou! Your Order Placed successfully!";

                                                        function_alert();

														
														
													}
												}
?>


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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
     </head>
<body>
    
    <div class="site-wrapper">
        
    
            
			
			
				  
            <div class="container m-t-30">
			<form action="" method="post">
                <div class="widget clearfix">
                    
                    <div class="widget-body" style="color:#000000">
                        <form method="post" action="#">
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="cart-totals margin-b-20">
                                        <div class="cart-totals-title">
                                            <h3>Advance Order Confirmation</h3> </div><br><br>
<h4 style="text-align: center;">Your Orders</h4>
<table style="text-align: center;" width="1197.87px">
  <thead>
    <tr>
      <th style="text-align: center;" class="primary" scope="col">Dish Name</th>
      <th style="text-align: center;" scope="col">Quantity</th>
      <th  style="text-align: center;"scope="col">Price</th>
    </tr>
  </thead>
  <?php
                                $item_total = 0;
                                foreach ($_SESSION["cart_item"] as $item) {
                                ?>
  <tbody>
    <tr>
      <td><?php echo $item["title"]; ?></td>
        <td><?php echo $item["quantity"]; ?></td>
        <td><?php echo "₹".$item["price"]; ?></td>
    </tr>
   
    <?php
                                    $item_total += ($item["price"]*$item["quantity"]); 
                                }
                                ?>
  </tbody>
 
</table><br><br>
<h4 style="text-align: center;">Cart Total</h4>
                                           
                                        <div class="cart-totals-fields">
										
                                            <table  width="1197.87px">
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
                                        </div>
                                    </div><br><br><h4>Payment Mode</h4><br>


                                    <div class="payment-option">
                                        <ul class=" list-unstyled">
                                            <li>
                                                <label class="custom-control custom-radio  m-b-20">
                                                    <input name="mod" id="radioStacked1" checked value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Cash on Delivery</span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="custom-control custom-radio  m-b-10">
                                                    <input name="mod"  type="radio" value="paypal" disabled class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Paypal <img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                            </li>
                                        </ul>
                                    <br><h4>User Details</h4><br>
<?php 
 include("connection/connect.php");
 $query=mysqli_query($db,"SELECT * from users where u_id='".$_SESSION["user_id"]."'"); 
 while($row=mysqli_fetch_array($query))
{?>
                Full Name <input type="text" class="form-control" name="firstname" readonly value="<?php echo $row['f_name']." ".$row['l_name'];?>"><br>
                Email <input type="text" class="form-control" name="e-mail" readonly value="<?php echo $row['email'];?>"><br>
                Mobile Number <input type="text" class="form-control" name="mobile"  readonly value="<?php echo $row['phone'];?>"><br>
                Address <input type="text" class="form-control" name="address" readonly value="<?php echo $row['address1'];}?>"><br>
                <i><b>Note : If you want to Update any Information Update it From Profile</b></i><br><br>

                When You Want (Date)? <input type="date" class="form-control" name="date"><br>
                When You Want (Time)? <input type="time" class="form-control" name="time"><br>         
                <p class="text-xs-center"> <input type="submit" onclick="return confirm('Do you want to confirm the order?');" name="submit"  class="btn btn-outline-success btn-block" value="Book Your Order Now"> </p>
                                        
                                    
                                   
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
}
?>

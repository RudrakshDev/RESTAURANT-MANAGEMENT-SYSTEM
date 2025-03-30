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

  table {
    width: 100%;
    color: #000000;
    text-align: center;
    margin-left: 40px;
    font-family:cursive;
  }
  
  th, td {
    padding: 8px;
    font-family:cursive;
  }
  
  th {
    background-color: #f2f2f2;
    font-family:cursive;
  }
  
  tr:hover {
    background-color: #f9f9f9;
    font-family:cursive;
  }

    </style>
    </head>
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php'; 

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
    <title>Dishes</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                                            <a href="your_adv_orders.php">Advance Orders</a>
                                            </div>
                                        </div>
                                    </li> ';
                            echo '<li class = "nav-item"><a href="cart.php" class="fafa"><i  class="fa fa-shopping-cart" style=" font-size:24px; color:#ffffff"></i></a> </li>
                            <li class = "nav-item"><a class="fafa"><i  class="fas fa-user-circle" style=" font-size:24px; color:#ffffff"></i></a> </li>';
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
                      
                    <li class="col-xs-12 col-sm-4 link-item active" ><span style="background: #ffffff; color:#000000;">1</span><a href="#">Choose Restaurant</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span  style="background: rgb(210,232,241); color:#000000;">2</span><a href="#">Pick Your favorite food</a></li>
                        <li class="col-xs-12 col-sm-4 link-item"><span style="background: #ffffff; color:#000000;">3</span><a href="#">Order and Pay</a></li>
                        
                    </ul>
                </div>
            </div>
			<?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
									     $rows=mysqli_fetch_array($ress);
										  
										  ?>
            <section class="inner-page-hero bg-image" data-image-src="images/img/dishes3.jpeg">
                <div class="profile">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                                <div class="image-wrap">
                                    <figure><?php echo '<img src="admin/Res_img/'.$rows['image'].'" alt="Restaurant logo">'; ?></figure>
                                </div>
                            </div>
							
                            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                                <div class="pull-left right-text white-txt">
                                    <h6><a href="#"><?php echo $rows['title']; ?></a></h6>
                                    <p><?php echo $rows['address']; ?></p>   
                                </div>
                            </div>
							
							
                        </div>
                    </div>
                </div>
            </section>
            <script>
  // JavaScript function to increment or decrement quantity
  function updateQuantity(element, operation) {
    let inputElement = element.parentNode.querySelector('input[name="quantity"]');
    let quantity = parseInt(inputElement.value);
    
    if (operation === 'plus') {
      quantity += 1;
    } 
    else if (operation === 'minus' && quantity > 1) {
      quantity -= 1;
    }
    
    inputElement.value = quantity;
  }
</script>
            <br><br>

<center><table border="0" style="color:#000000; text-align:center; width:1400px;">
				<thead>
					<tr>
						<th style="text-align:center;">Dish Image  </th>
                        <th style="text-align:center;">Dish Name  </th>
						<th style="text-align:center;" style="width:350px;">Description  </th>  
                        <th style="text-align:center;">Price  </th>  
						<th style="text-align:center;">Quantity  </th>     
                        <th style="text-align:center;">Add to Cart  </th>
                    </tr>
				</thead>
                <?php  
                        $stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
                        $stmt->execute();
                        $products = $stmt->get_result();
                        if (!empty($products)) 
                        {
                        foreach($products as $product)
                            {
         
                                        
                                         
                                         ?>
                <tbody>
                        <form method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                        <tr style="color:#000000;">
                            <td style="text-align:center; width:100px;"> <a class="restaurant-logo pull-left" href="#"><?php echo '<img src="restaurant/Res_img/dishes/'.$product['img'].'" height="95px" width="160px" style="border-radius:5px;">'; ?></a></td>
                        
                            <td style=" font-family:cursive;"><?php echo $product['title']; ?></td>
                                
                            <td style="width:350px;"><p> <?php echo $product['slogan']; ?></p></td>

                            <td style="text-align:center;">₹<?php echo $product['price']; ?></td>

                            <td style="text-align:center;">
                            <button type="button" style="background-color:#ffffff; width: 30px; color:#000000; height:30px; font-size:20px; border-style:none;" onclick="updateQuantity(this, 'plus')">+</button>
                            <input class="b-r-0" type="text" name="quantity"  style="background-color:#ffffff; height:30px; text-align:center; width: 30px; color:#000000; border-style:none;" value="1" size="2" />
                            <button type="button" style="background-color:#ffffff; width: 30px; font-size:20px; height:30px; color:#000000;border-style:none;" onclick="updateQuantity(this, 'minus')">-</button>
                            </td>
                            
                            <td style="text-align:center;"><input type="submit" class="btn theme-btn" style="margin-left:40px; border-radius:5px;" value="Add to cart" /></td>
                        </tr>
                               
                        </form>

                </tbody>
                <?php
                          }
                        }
                        
                    ?>
                </table></center>
        
           
 
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

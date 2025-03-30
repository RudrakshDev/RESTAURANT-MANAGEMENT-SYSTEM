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
    </style>
	</head>
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
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
    <title>Your Orders</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">


.indent-small {
  margin-left: 5px;
}
.form-group.internal {
  margin-bottom: 0;
}
.dialog-panel {
  margin: 10px;
}
.datepicker-dropdown {
  z-index: 200 !important;
}
.panel-body {
  background: #e5e5e5;
  /* Old browsers */
  background: -moz-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* FF3.6+ */
  background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, #e5e5e5), color-stop(100%, #ffffff));
  /* Chrome,Safari4+ */
  background: -webkit-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* Opera 12+ */
  background: -ms-radial-gradient(center, ellipse cover, #e5e5e5 0%, #ffffff 100%);
  /* IE10+ */
  background: radial-gradient(ellipse at center, #e5e5e5 0%, #ffffff 100%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e5e5e5', endColorstr='#ffffff', GradientType=1);
  font: 600 15px "Open Sans", Arial, sans-serif;
}
label.control-label {
  font-weight: 600;
  color: #777;
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

<body>
    
      
        <header id="header" class="header-scroll top-header headrom">
			<style>
				 .img-rounded{
        height: 100px;
        width: 100px;
        margin-top: -35px;
        margin-bottom: -35px;
    }
			</style>
  <body>
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
                            <button class="nav-link " style=" background:#000000; border:none; color:#fff; margin: top -25px;">Pages</button>
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
                            echo '<li class = "nav-item"><a href="logout.php" class="fafa"><i class="fa fa-sign-out" style=" color:#ffffff;font-size:24px; "></i></a> </li>';
                            
                        }
						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
  
            </header>
        <br><br><br><br><br><br><br>
			  <table border = "0.5"style="color:#000000;margin-left: 140px; text-align:center; width:1300px">
  <thead>
    <tr>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Advance Order No.</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Res Name</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Item Name</th>
      <th style="text-align:center;background :rgb(210,232,241); Color:#000000;">Quantity</th>
      <th style="text-align:center;background :rgb(210,232,241); Color:#000000;">Price(per quantity)</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Price</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Address</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Date</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Time</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Status</th>
      <th style="text-align:center; background :rgb(210,232,241); Color:#000000;">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query_res = mysqli_query($db, "SELECT o.*, r.title AS restaurant_name FROM adv_orders o INNER JOIN restaurant r ON o.rs_id = r.rs_id WHERE o.u_id='" . $_SESSION['user_id'] . "'");
    if (!mysqli_num_rows($query_res) > 0) {
      echo '<tr><td colspan="8" style="color:#000000"><center>You have no orders placed yet.</center></td></tr>';
    } else {
      while ($row = mysqli_fetch_array($query_res)) {
    ?>
      <tr style="color:#000000;">
        <td><?php echo $row['a_id']; ?></td>
        <td><?php echo $row['restaurant_name']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['quantity']; ?></td>
        <td>₹<?php echo $row['price']; ?></td>
        <td data-column="price">₹<?php echo $row['price'] * $row['quantity'];?></td>
        <td><?php echo $row['address']; ?></td>
        <td><?php echo $row['adate']; ?></td>
        <td><?php echo $row['atime']; ?></td>
        <td>
          <?php 
            $status = $row['status'];
            if ($status == "" or $status == "NULL") {
          ?>
              <button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true" > Dispatch</button>
          <?php 
            }
            if ($status == "in process") {
          ?>
              <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On The Way!</button>
          <?php
            }
            if ($status == "closed") {
          ?>
              <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"> Delivered</button> 
          <?php 
            } 
            if ($status == "rejected") {
          ?>
              <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button>
          <?php 
            } 
          ?>                           
        </td>
        
        <td>
          <a href="delete_adv_orders.php?order_del=<?php echo $row['a_id'];?>" onclick="return confirm('Are you sure you want to cancel your order?');" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
        </td>
      </tr>
    <?php 
      }
    }
    ?>
  </tbody>
</table>

							
						
					
                                    
                                </div>
                           
                            </div>
                         
                            
                                
                            </div>
                          
                          
                           
                        </div>
                    </div>
                </div>
            </section>


        
        
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
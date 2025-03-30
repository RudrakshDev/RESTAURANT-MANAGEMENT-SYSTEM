<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Panel</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <style>
    .card-outline-primary .card-header {
    background: #a4b4d3 none repeat scroll 0 0;
    border-color: #a4b4d3;
    }
    .text-white {
    color: #000000 !important;
}
.navbar-brand{
  
  color: white;
  text-shadow: 1px 1px 3px white, 0 0 20px blue, 0 0 5px blue;

}
    </style>
</head>

<body class="fix-header">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    
    <div id="main-wrapper">
     
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">

            <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php">
                    <?php
               session_start();
               include("../connection/connect.php");
$query=mysqli_query($db,"SELECT * from admin where adm_id='".$_SESSION["adm_id"]."'");
while($row=mysqli_fetch_array($query))
{
    echo "Welcome " .$row['username'];
}?>   
                        
                    </a>
                </div>

                <div class="navbar-collapse">
                    <ul class="navbar-nav mr-auto mt-md-0">
                    </ul>
                    
                       
                      
                      
                    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="images/bookingSystem/3.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
      
        <div class="left-sidebar">
   
            <div class="scroll-sidebar">
       
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a href="dashboard.php"><i class="fa fa-tachometer"></i><span>Dashboard</span></a>
                        </li>
                        <li class="nav-label">Log</li>
                        <li> <a href="all_users.php">  <span><i class="fa fa-users f-s-20 "></i></span><span>Users</span></a></li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-archive f-s-20 color-warning"></i><span class="hide-menu">Restaurant</span></a>
                            <ul aria-expanded="false" class="collapse">
								<li><a href="all_restaurant.php">All Restaurant</a></li>
								<li><a href="add_category.php">Add Category</a></li>
                                <li><a href="add_restaurant.php">Add Restaurant</a></li>
                                
                            </ul>
                        </li>
                        <li> <a href="all_menu.php"><i class="fa fa-cutlery" aria-hidden="true"></i><span>Menu</span></a></li>
						 <li> <a href="all_orders.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span>Orders</span></a></li>
                         <li> <a href="all_advorders.php"><i class="fa fa-shopping-basket" aria-hidden="true"></i><span>Advance Orders</span></a></li>
                         <li> <a href="fooddont.php"><i class="fa fa-gift" aria-hidden="true"></i><span>Food Donation</span></a></li>
                         <li> <a href="customerQueries.php"><i class="fa fa-question-circle" aria-hidden="true"></i><span>Customer Queries</span></a></li>
                    </ul>
                </nav>
            
            </div>
           
        </div>
    
        <div class="page-wrapper">
         
        
        
            <div class="container-fluid">
            <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Dashboard</h4>
                            </div>
                     <div class="row">
                   <!--All Restaurants -->
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from restaurant";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Restaurants</p>
                                </div>
                            </div>
                        </div>
                    </div>
					

                      <!--All Dishes -->
					 <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-cutlery f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from dishes";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Dishes</p>
                                </div>
                            </div>
                        </div>
                    </div>

                      <!--All Orders -->
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle"> 
                                    <span><i class="fa fa-shopping-cart f-s-40" aria-hidden="true"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users_orders";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
                      <!--All Advance Orders -->
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-basket f-s-40  "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from adv_orders";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Advance Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>


                      <!--All Users -->
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-users f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from users";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
					
						  
                    
                     <!--All Food Donation -->

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-gift f-s-40  "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from fooddnt";
												$result=mysqli_query($db,$sql); 
													$rws=mysqli_num_rows($result);
													
													echo $rws;?></h2>
                                    <p class="m-b-0">Food Donation</p>
                                </div>
                            </div>
                        </div>
                    </div>

                 <!--All Restaurant's Yearly Sales -->
                 <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-money f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                    <?php
    $sql = "SELECT SUM(quantity * price) AS total_sales FROM (
                SELECT quantity, price FROM adv_orders 
                UNION ALL 
                SELECT quantity, price FROM users_orders
            ) AS orders";

    $result = mysqli_query($db, $sql);

    // Check for SQL query execution errors
    if (!$result) {
        die("Query execution failed: " . mysqli_error($db));
    }

    // Fetch the total sales from the result
    $row = mysqli_fetch_assoc($result);
    $total_sales = $row["total_sales"];

    // Output the total sales with proper HTML encoding
    echo "&#8377;" . number_format($total_sales, 2, '.', ',');
?>

                                        </h2>
                                    <p class="m-b-0">All Restaurant's Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-rupee f-s-40 "></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2>
                                    <?php
    // Query database to get all rows from users_orders table
    $sql1 = "SELECT quantity, price FROM users_orders";
    $result1 = mysqli_query($db, $sql1);

    // Query database to get all rows from adv_orders table
    $sql2 = "SELECT quantity, price FROM adv_orders";
    $result2 = mysqli_query($db, $sql2);

    // Initialize total sales to zero
    $total_sales = 0;

    // Loop through each row in users_orders table and add up the sales
    if (mysqli_num_rows($result1) > 0) {
        while($row1 = mysqli_fetch_assoc($result1)) {
            $total_sales += ($row1["quantity"] * $row1["price"]) * 0.2; // Calculate sales with 2% profit margin
        }
    }

    // Loop through each row in adv_orders table and add up the sales
    if (mysqli_num_rows($result2) > 0) {
        while($row2 = mysqli_fetch_assoc($result2)) {
            $total_sales += ($row2["quantity"] * $row2["price"]) * 0.2; // Calculate sales with 2% profit margin
        }
    }

    // Output the result with proper HTML encoding
    echo "&#8377;" . number_format($total_sales, 2, '.', ',');
?>


                                        </h2>
                                    <p class="m-b-0">Admin's Income</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    

                </div>               
            </div>
        </div>     
    </div>
   
    <script src="js/lib/jquery/jquery.min.js"></script>
    <script src="js/lib/bootstrap/js/popper.min.js"></script>
    <script src="js/lib/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/jquery.slimscroll.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="js/custom.min.js"></script>
    
</body>

</html>
<?php
}
?>
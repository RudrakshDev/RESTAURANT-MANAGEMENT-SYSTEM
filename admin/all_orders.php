<!DOCTYPE html>
<html lang="en">
<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>All Orders</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
    // Add event listener to the export button
    document.getElementById("exportBtn").addEventListener("click", function() {
        // Create a new jsPDF instance
        var doc = new jsPDF();

        // Get the HTML content of the element to be exported
        var element = document.getElementById("tableToExport");

        // Convert the HTML content to canvas
        html2canvas(element).then(function(canvas) {
            // Convert the canvas to an image data URL
            var imgData = canvas.toDataURL("image/png");

            // Add the image data URL to the jsPDF document
            doc.addImage(imgData, 'PNG', 10, 10, 190, 277);

            // Save the jsPDF document as a PDF file
            doc.save("exported_data.pdf");
        });
    });
</script>

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
.glow-on-hover {
    width: 220px;
    height: 50px;
    border: none;
    outline: none;
    color: #fff;
    background: #111;
    cursor: pointer;
    position: relative;
    z-index: 0;
    border-radius: 10px;
}

.glow-on-hover:before {
    content: '';
    background: linear-gradient(45deg, #ff0000, #ff7300, #fffb00, #48ff00, #00ffd5, #002bff, #7a00ff, #ff00c8, #ff0000);
    position: absolute;
    top: -2px;
    left:-2px;
    background-size: 400%;
    z-index: -1;
    filter: blur(5px);
    width: calc(100% + 4px);
    height: calc(100% + 4px);
    animation: glowing 20s linear infinite;
    opacity: 0;
    transition: opacity .3s ease-in-out;
    border-radius: 10px;
}

.glow-on-hover:active {
    color: #ffffff;
}

.glow-on-hover:active:after {
    background: transparent;
}

.glow-on-hover:hover:before {
    opacity: 1;
}

.glow-on-hover:after {
    z-index: -1;
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    background: #ffffff;
    left: 0;
    top: 0;
    border-radius: 10px;
}
    </style>

</head>

<body class="fix-header fix-sidebar">
   
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
       
                    <ul class="navbar-nav my-lg-0">

                        
                    
                        <li class="nav-item dropdown">
                           
                            <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    
                                    <li>
                                        <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                  
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
           
                <div class="row">
                    <div class="col-12">
                        
                       
                    <div class="col-lg-12">
                        <div class="card card-outline-primary">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Orders of All Restaurant</h4>
                            </div>
                             
                                <div class="table-responsive m-t-40">
                                    <table name="tableToExport" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>Order no.</th>
                                                <th>User</th>	
                                                <th>Res Name</th>	
                                                <th>Title</th>
                                                <th>Quantity</th>
                                                <th>Price(Per Quantity)</th>
                                                <th>Total Price</th>
												<th>Address</th>
												<th>Status</th>												
												 <th  style="text-align:center;">Date-Time</th>
												 
												 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
											
											<?php
												$sql="SELECT users.*, users_orders.*, restaurant.title AS restaurant_name 
                                                FROM users 
                                                INNER JOIN users_orders ON users.u_id = users_orders.u_id
                                                INNER JOIN restaurant ON users_orders.rs_id = restaurant.rs_id order by o_id desc";
												$query=mysqli_query($db,$sql);
												
													if(!mysqli_num_rows($query) > 0 )
														{
															echo '<td colspan="8"><center>No Orders</center></td>';
														}
													else
														{				
																	while($rows=mysqli_fetch_array($query))
																		{
																			$total = $rows['price'] * $rows['quantity'];																				
																				?>
																				<?php
																					echo ' <tr>
                                                                                    <td>'.$rows['o_id'].'</td>
																					           <td>'.$rows['username'].'</td>
                                                                                               <td>'.$rows['restaurant_name'].'</td>
																								<td>'.$rows['title'].'</td>
																								<td>'.$rows['quantity'].'</td>
																								<td>₹'.$rows['price'].'</td>
                                                                                                <td>₹'.$total.'</td>
																								<td>'.$rows['address'].'</td>';
																								?>
																								<?php 
																			$status=$rows['status'];
																			if($status=="" or $status=="NULL")
																			{
																			?>
																			<td> <button type="button" class="btn btn-info" style="font-weight:bold;"><span class="fa fa-bars"  aria-hidden="true" > Dispatch</button></td>
																		   <?php 
																			  }
																			   if($status=="in process")
																			 { ?>
																			<td> <button type="button" class="btn btn-warning"><span class="fa fa-cog fa-spin"  aria-hidden="true" ></span> On The Way!</button></td> 
																			<?php
																				}
																			if($status=="closed")
																				{
																			?>
																			<td> <button type="button" class="btn btn-success" ><span  class="fa fa-check-circle" aria-hidden="true"> Delivered</button></td> 
																			<?php 
																			} 
																			?>
																			<?php
																			if($status=="rejected")
																				{
																			?>
																			<td> <button type="button" class="btn btn-danger"> <i class="fa fa-close"></i> Cancelled</button></td> 
																			<?php 
																			} 
																			?>
																						<?php																									
																							echo '	<td>'.$rows['date'].'</td>';
																							?>
																									<?php
																								echo '
																									</tr>';
																					 
																						
																						
																		}	
														}
												
											
											?>
                                             
                                            
                                           
                                        </tbody>
                                    </table>

                                   
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-warning" style="background-color:#a4b4d3;color:#000000;border:none;margin-left:15px;margin-top:15px;font-size:15px;" type="button" onclick="location.href='export_all_orders.php'">Export Data</button>
						
						

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
    <script src="js/lib/datatables/datatables.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    
</body>

</html>
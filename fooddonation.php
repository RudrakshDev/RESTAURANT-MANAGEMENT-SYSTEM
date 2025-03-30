<!DOCTYPE html>
<html lang="en">
   <head>
   <style>
                /* .navbar {
    padding: 0.95rem 1rem;
    border-radius: 0;
    background-color: black;}

    .img-rounded{
        height: 100px;
        width: 100px;
        margin-top: -35px;
        margin-bottom: -35px;
    } */
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
        .widget {
    border: 1px solid #eaebeb;
    background: rgba(255,255,255,0.132);
    backdrop-filter: blur(10px);
    border-radius: 2px;
    position: relative;
}


    </style>
   </head>
<?php

session_start(); 
error_reporting(0); 



include("connection/connect.php"); 

if(isset($_POST['submit'] )) {





   if(empty($_POST['name']) || 
            empty($_POST['adress'])|| 
            empty($_POST['email']) ||  
            empty($_POST['phone'])||
            empty($_POST['quantity'])||
            empty($_POST['pdate']) ||
            empty($_POST['ptime']))
    {
       $message = "All fields must be Required!";
    }
 // else
 // {
 
 // $check_username= mysqli_query($db, "SELECT username FROM  where username = '".$_POST['username']."' ");
 // $check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
 
 // if($image_size == false)
 // {
 //    echo "File is not an image.";
 //    exit();
 // }
 // ;




 
 if(strlen($_POST['phone']) < 10)  
 {
    echo "<script>alert('Invalid phone number!');</script>"; 
 }

  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
  {
        echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
  }
 
 else{
    

   $target_dir = "fd_images/"; // set the target directory to "fd_images"
   $target_file = $target_dir . basename($_FILES["image"]["name"]); // set the target file path
 
   $imgname = basename($_FILES["image"]["name"]); // store the image name in the variable $imgname
   move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
 
   // Insert the form data into the database
   $mql = "INSERT INTO fooddnt(name,address,email,phone,quantity,pdate,ptime,imgname) VALUES('".$_POST['name']."','".$_POST['address']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['quantity']."','".$_POST['pdate']."','".$_POST['ptime']."','".$imgname."')";
   mysqli_query($db, $mql);
 
   // Redirect the user to a success page
   header("");



     
  }
 }
 





?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Food Donation</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
    <!-- href="index.php" -->
<!-- <body> <img class="img-rounded" src="images/food-logo.png" alt=""> -->
<div style=" background-image: url('images/img/fooddnt.jpeg'); height:792px">
<body>
         <header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
               <div class="container">
                  <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <a class="navbar-brand" > </a>
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
            
               <div class="container">
                  <ul>
                    
                    
                  </ul>
               </div>
            
            <section class="contact-page inner-page">
               <div class="container">
                  <div class="row">
                     <div class="col-md-8">
                        <div class="widget" style="background : rgba(255,255,255,0.132);" >
                           <div class="widget-body">
                            
							  <form action="" method="post" enctype="multipart/form-data">


                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">Name</label>
                                       <input class="form-control" style="background-color: rgb(210,232,241);" type="text" name="name" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-12">
                                       <label for="exampleTextarea"style="color:#ffffff;">Pickup Address</label>
                                       <textarea class="form-control" style="background-color: rgb(210,232,241);" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">Email Address</label>
                                       <input type="email" class="form-control" style="background-color: rgb(210,232,241);" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1"style="color:#ffffff;">Phone number</label>
                                       <input class="form-control"  style="background-color: rgb(210,232,241);"type="text" name="phone" id="example-tel-input-3"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">Quantity in KGs</label>
                                       <input type="number"  style="background-color: rgb(210,232,241);"class="form-control" name="quantity" id="exampleInputPassword1"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">When Prepared (Date) ?</label>
                                       <input type="date" style="background-color: rgb(210,232,241);" class="form-control" name="pdate" id="exampleInputPassword2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">When Prepared (Time ) ?</label>
                                       <input type="time"required="" style="background-color: rgb(210,232,241);" class="form-control" name="ptime" id="exampleInputPassword2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">Upload an Image</label>
                                       <input type="file"  style="background-color: rgb(210,232,241);" class="form-control" name="image" id="image"> 
                                    </div>
                                   
                                 </div+>
                                
                                 <div class="row">
                                    <div class="col-sm-4" style="align : center;">
                                       <p> <input type="submit" value="Submit" name="submit" class="btn theme-btn"> </p>
                                    </div>
                                 </div>
                              </form>
                  
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





<!-------------------------------------------------------------------------------------------------->
<?php








?>
<!---------------------------------------------------------------------------------------------------->



</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form>
  <label for="name">Name:</label>
  <input type="text" id="name" name="name"><br><br>

  <label for="address">Address:</label>
  <input type="text" id="address" name="address"><br><br>

  <label for="phone">Phone Number:</label>
  <input type="tel" id="phone" name="phone"><br><br>

  <label for="quantity">Quantity:</label>
  <input type="number" id="quantity" name="quantity"><br><br>

  <label for="quality">Quality:</label>
  <input type="text" id="quality" name="quality"><br><br>

  <label for="food-type">Food Type:</label>
  <select id="food-type" name="food-type">
    <option value="indian">Indian</option>
    <option value="chinese">Chinese</option>
    <option value="italian">Italian</option>
    <option value="mexican">Mexican</option>
  </select><br><br>

  <label for="pin-code">Pin Code:</label>
  <input type="text" id="pin-code" name="pin-code"><br><br>

  <label for="prepared-by">Prepared By:</label>
  <input type="text" id="prepared-by" name="prepared-by"><br><br>

  <input type="submit" value="Submit">
</form>

</body>
</html> -->
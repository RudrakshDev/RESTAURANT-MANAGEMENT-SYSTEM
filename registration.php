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
if(isset($_POST['submit'] )) 
{
     if(empty($_POST['firstname']) || 
   	    empty($_POST['lastname'])|| 
		empty($_POST['email']) ||  
		empty($_POST['phone'])||
		empty($_POST['password'])||
		empty($_POST['cpassword']) ||
		empty($_POST['cpassword']))
		{
			$message = "All fields must be Required!";
		}
	else
	{
	
	$check_username= mysqli_query($db, "SELECT username FROM users where username = '".$_POST['username']."' ");
	$check_email = mysqli_query($db, "SELECT email FROM users where email = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['cpassword']){  
       	
          echo "<script>alert('Password not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 6)  
	{
      echo "<script>alert('Password Must be >=6');</script>"; 
	}
	elseif(strlen($_POST['phone']) < 10)  
	{
      echo "<script>alert('Invalid phone number!');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email address please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
       
	 
	$mql = "INSERT INTO users(username,f_name,l_name,email,phone,password,address) VALUES('".$_POST['username']."','".$_POST['firstname']."','".$_POST['lastname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['password']."','".$_POST['address']."')";
	mysqli_query($db, $mql);
	
		 header("refresh:0.1;url=login.php");
    }
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
    <title>Registration</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> </head>
    <!-- href="index.php" -->
<!-- <body> <img class="img-rounded" src="images/food-logo.png" alt=""> -->
<div style=" background-image: url('images/img/bg2.jpg'); height:792px">
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
                        
                        
                             echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
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
                            
							  <form action="" method="post">
                                 <div class="row">
								  <div class="form-group col-sm-12">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">User-Name</label>
                                       <input class="form-control" style="background-color: rgb(210,232,241);" type="text" name="username" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">First Name</label>
                                       <input class="form-control" style="background-color: rgb(210,232,241);" type="text" name="firstname" id="example-text-input"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">Last Name</label>
                                       <input class="form-control" style="background-color: rgb(210,232,241);" type="text" name="lastname" id="example-text-input-2"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1" style="color:#ffffff;">Email Address</label>
                                       <input type="text" class="form-control" style="background-color: rgb(210,232,241);" name="email" id="exampleInputEmail1" aria-describedby="emailHelp"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputEmail1"style="color:#ffffff;">Phone number</label>
                                       <input class="form-control"  style="background-color: rgb(210,232,241);"type="text" name="phone" id="example-tel-input-3"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">Password</label>
                                       <input type="password"  style="background-color: rgb(210,232,241);"class="form-control" name="password" id="exampleInputPassword1"> 
                                    </div>
                                    <div class="form-group col-sm-6">
                                       <label for="exampleInputPassword1"style="color:#ffffff;">Confirm password</label>
                                       <input type="password" style="background-color: rgb(210,232,241);" class="form-control" name="cpassword" id="exampleInputPassword2"> 
                                    </div>
									 <div class="form-group col-sm-12">
                                       <label for="exampleTextarea"style="color:#ffffff;">Delivery Address</label>
                                       <textarea class="form-control" style="background-color: rgb(210,232,241);" id="exampleTextarea"  name="address" rows="3"></textarea>
                                    </div>
                                   
                                 </div>
                                
                                 <div class="row">
                                    <div class="col-sm-4" style="align : center;">
                                       <p> <input type="submit" value="Register" name="submit" class="btn theme-btn"> </p>
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

</html>
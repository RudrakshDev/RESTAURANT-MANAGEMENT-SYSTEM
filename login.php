<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">

	  <style type="text/css">
	  #buttn{
		  color:#fff;
		  background-color: rgb(0, 190,0);
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
        .form-module
        {
            top: 15%;
            left: -3%;
            border-top: 5px solid #ffffff;
        }
        
	  </style>


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
  
</head>

<body>
<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                  <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                       <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
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
<div style=" background-image: url('images/img/bg.jpg'); width: 1700px;height: 900px;">

<?php
include("connection/connect.php"); 
error_reporting(0); 
session_start(); 
if(isset($_POST['submit']))  
{
	$username = $_POST['username'];  
	$password = $_POST['password'];
	
	if(!empty($_POST["submit"]))   
     {
	$loginquery ="SELECT * FROM users WHERE username='$username' && password='$password'"; //selecting matching records
	$result=mysqli_query($db, $loginquery); //executing
	$row=mysqli_fetch_array($result);
	
	                        if(is_array($row)) 
								{
                                    	$_SESSION["user_id"] = $row['u_id']; 
                                        header("location:index.php");
										 
	                            } 
							else
							    {
                                      	$message = "Invalid Username or Password!"; 
                                }
	 }
	
	
}
?>
          

<div class="pen-title">
  
</div>

<div class="module form-module">
  <div class="toggle">
   
  </div>
  <div class="form" style="height : 320px;">
    <h2 style="color:#121317; text-align:center">Login to your account</h2>
	    <span style="color:red;"><?php echo $message; ?></span> 
        <span style="color:green;"><?php echo $success; ?></span>
    <form action="" method="post">
      <input type="text" placeholder="Username"  name="username"/>
      <input type="password" placeholder="Password" name="password"/>
      <input type="submit" id="buttn" name="submit" value="Login" />
    </form>

   <a href ="forgot_password.php" style="color:#000000; margin-left: 50px;">Forgot Password?</a>
  </div>
  
  <div class="cta">Not registered?<a href="registration.php" style="color:rgb(0,190,0);"> Create an account</a></div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  

   
  <div class="container-fluid pt-3">
	<p></p>
  </div>


   


</body>

</html>

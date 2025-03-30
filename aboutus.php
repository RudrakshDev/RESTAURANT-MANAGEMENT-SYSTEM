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
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="icon" href="#">
    <title>Home</title>
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
            margin-top : -30px;
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
            margin-top : -15px;
            padding: -40px;
            position: relative;
        }

        body {
    background: rgba(255, 255, 255, 0.68);
    font-size: 16px;
    color: #ffffff;
    font-weight: 400;
    overflow-x: hidden;
}
.pull-right {
    float: center;
}
.text-container p
{
    font-size: 16px;
    padding: 10px 0px;
}
.food-item-wrap h5 a {
    color: #25282b;
    font-size: 23px;
    text-align: center;
    font-weight: 600;
    font-family:cursive;
    text-align:center;
}
.food-item-wrap:hover h5>a,
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
    

<body class="home">

<!-- -- Nav Bar Starts here -->
<body>
	<div class="wrapper">
		<div class="background-color" style="width: 100%; min-height:100vh; display:flex">
			<div class="bg-1" style="flex: 1; background-color: rgb(180,243,175);"></div>
			<div class="bg-2" style="flex: 1; background-color: rgb(163,236,240);"></div>
		</div>
		<div class="about-container">
			<div class="image-container" style=" flex:1; display:flex; justify-content:center; align-items:center;">
				<img src="images/New Images/logo 3.png" alt="" >
			</div>
			<div class="text-container" style="color:black;  font-size: 16px;
    padding: 10px 0px;">
				<h1>About us</h1>
				<p>Welcome to our online food ordering website! We are thrilled to provide you with a hassle-free and convenient way to order delicious meals from your favorite restaurants.At our website, you can easily browse through a wide selection of restaurants and cuisines, all in one place. Whether you're craving Italian, Chinese, or Indian food, we've got you covered.We understand the importance of prompt and reliable delivery, and we strive to make your experience with us as seamless as possible. Our platform also allows you to pre-book your meal in order to avoid looming and also allows you donate meals as per your conveniency offering you a change to serve the society. Thank you for choosing Exotic Foods. </p>
				<a href="restaurants.php">Order Now</a>
                <a href="index.php">Back Home</a>
			</div>
		</div>
	</div>
	
</body>
</html>
<link rel="stylesheet" href="about.css">
	<title>About us</title>



























































<!-- <!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
</head>
<body>
	<h1>About Us</h1>
	<p>Welcome to our online food ordering website! We are a team of food enthusiasts who are passionate about providing delicious food to our customers. Our mission is to make it easy and convenient for you to order food online and have it delivered right to your doorstep.</p>
	
	<h2>Our History</h2>
	<p>Our website was founded in 2020 by a group of friends who love food and technology. We noticed that there was a need for a platform that would allow people to order food online from a variety of restaurants, so we decided to create our own.</p>
	<p>Since then, we have been working hard to improve our website and expand our selection of restaurants. We now offer food from some of the best local restaurants in the area.</p>

	<h2>Our Team</h2>
	<p>We are a diverse team of foodies, designers, and developers who are passionate about what we do. Our team is dedicated to providing the best possible experience for our customers, from the moment they visit our website to the time they receive their food.</p>
	<p>If you have any questions or feedback, please don't hesitate to contact us. We are always here to help!</p>

	<h2>Our Partners</h2>
	<p>We are proud to partner with some of the best local restaurants in the area to bring you delicious food. Our partners include:</p>
	<ul>
		<li>Restaurant A</li>
		<li>Restaurant B</li>
		<li>Restaurant C</li>
		<li>Restaurant D</li>
	</ul>
	
	<h2>Our Contact Information</h2>
	<p>If you have any questions or comments, please feel free to contact us:</p>
	<ul>
		<li>Email: info@foodordering.com</li>
		<li>Phone: 555-555-5555</li>
		<li>Address: 123 Main Street, Anytown, USA</li>
	</ul>
</body>
</html> -->

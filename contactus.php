


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact US</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous">
    <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" type="text/css" href="contactus.css">
</head>
<?php

session_start(); 
error_reporting(0); 

include("connection/connect.php");  
if(isset($_POST['submit'] )) 
{
    $mql= "INSERT INTO contact_us(cname,email,message) VALUES('".$_POST['name']."','".$_POST['email']."','".$_POST['message']."')";
    mysqli_query($db, $mql);
}

    ?>
<body>
    <section class="contact">
        <div class="content">
            <h2>Contact US</h2>
            <p>We value your feedback and are always striving to improve. Please share your thoughts with us !</p>
        </div>
        <div class="container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class='fas fa-map-marker'></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Mota Bazzar - Vallabh Vidya Nagar,<br> Anand , <br> Pin-Code-388120 , <br> Gujaat-India</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-envelope" aria-hidden="true" ></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>exoticfoods-1@gmail.com</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>+91 9998887776</p>
                        <p>+91 9998887774</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form method="post">
                    <h2>Having Any Query ?</h2>
                    <div class="inputBox">
                    <span>Full Name</span>
                        <input type="text" name="name" >
                    </div>
                    <div class="inputBox">
                    <span>Email</span>
                        <input type="text" name="email" >
                    </div>
                    <div class="inputBox">
                    <span>Type your message...</span>
                        <textarea name="message" ></textarea>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Send">
                    </div>
                    <div class="inputBox2">
                     <a href="index.php"><input type="button" value="Back to home"></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <style>
       body {
    background: rgb(210,232,241)
}

.form-control:focus {
    box-shadow: none;
    border-color: #000000
}

.profile-button {
    background: #000000;
    box-shadow: none;
    border: none
}

.profile-button:hover {
    background: #121212;
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

.labels {
    font-size: 11px
}

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 2px #000000
}
    </style>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class=" mt-5" width="150px" src="images/profile.png"><span class="font-weight-bold"></span><span class="text-black-50">
                <br><br><h4 style="color:#000000">
               <?php
               session_start();
               include("connection/connect.php");
$query=mysqli_query($db,"SELECT * from users where u_id='".$_SESSION["user_id"]."'");
while($row=mysqli_fetch_array($query))
{
    echo $row['f_name']." ".$row['l_name'];
}?>
                
</h4>
            </span><span> </span></div>
        </div>

      
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">My Profile</h4>
                </div>
                <?php
                //session_start();
                include("connection/connect.php");
$query=mysqli_query($db,"SELECT * from users where u_id='".$_SESSION["user_id"]."'");
if(isset($_POST['update_profile']))
	{
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
        $email=$_POST['e-mail'];
        $mobile=$_POST['mobile'];
        $address1=$_POST['address1'];
        $address2=$_POST['address2'];
        $address3=$_POST['address3'];
		$query=mysqli_query($db,"UPDATE users set  f_name='$fname', l_name='$lname', email='$email', phone='$mobile', address1='$address1', address2='$address2', address3='$address3' where u_id='".$_SESSION['user_id']."'");
		if($query)
		{
echo "<script>alert('Your info has been updated');window.location='index.php'</script>";
		}
	}
while($row=mysqli_fetch_array($query))
{
?>
                <form method="post">
                First Name <input type="text" class="form-control" name="firstname" required value="<?php echo $row['f_name'];?>"><br>
                Last Name <input type="text" class="form-control" name="lastname"  value="<?php echo $row['l_name'];?>"><br>
                Email <input type="text" class="form-control" name="e-mail"  value="<?php echo $row['email'];?>"><br>
                Mobile Number <input type="text" class="form-control" name="mobile"  value="<?php echo $row['phone'];?>"><br>
                Address1 <input type="text" class="form-control" name="address1"  value="<?php echo $row['address1'];?>"><br>
                Address2 <input type="text" class="form-control" name="address2"  value="<?php echo $row['address2'];?>"><br>
                Address3 <input type="text" class="form-control" name="address3"  value="<?php echo $row['address3'];}?>"><br>
                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Update Profile" name="update_profile" /></div>
                </form>
               
                
            </div>
        </div>

         
       
        
        <div class="col-md-4">
            <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3" >
                    <h4 class="text-right" style="padding-left: 90px;">Update Password</h4>
                </div>
                <?php include 'reset.php';?>
                <form method="post">
                Email ID <input type="text" class="form-control" name="email" required placeholder="enter email id" value=""><br>
                Old Password <input type="text" class="form-control" name="old_pass" required placeholder="enter old password" value=""><br>
                New Password <input type="text" class="form-control" name="new_pass" required placeholder="enter new password" value=""><br>
                Retype New Password <input type="text" name="re_pass"class="form-control" required placeholder="enter new password" value=""><br>

                <div class="mt-5 text-center"><input type="submit" class="btn btn-primary profile-button" value="Reset Password" name="re_password" /></div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>

<!--Forgot Password Php Code Starts from Here-->
<?php 
		//main connection file for both admin & front end
            $servername = "localhost"; //server
            $username = "root"; //username
            $password = ""; //password
            $dbname = "online_rest";  //database

        // Create connection
            $db = mysqli_connect($servername, $username, $password, $dbname); // connecting 
        // Check connection
            if (!$db) 
            {       //checking connection to DB	
                die("Connection failed: " . mysqli_connect_error());
            }

        
        if(isset($_POST['re_password']))
		{
            $email = $_POST['email'];
		    $old_pass=$_POST['old_pass'];
		    $new_pass=$_POST['new_pass'];
		    $re_pass=$_POST['re_pass'];

            $chg_pwd = mysqli_query($db,"SELECT * FROM users WHERE email = '$email'");
            if(!$chg_pwd)
            {
                echo "Error";
            }
            $chg_pwd1=mysqli_fetch_array($chg_pwd);
           
            
           $data_pwd=$chg_pwd1['password'];

           if($data_pwd==$old_pass)
            {
                if($new_pass==$re_pass)
                {
                    $update_pwd=mysqli_query($db,"UPDATE users SET `password` = '$new_pass' WHERE email= '$email'");
                    echo "<script>alert('Update Sucessfully'); window.location='login.php'</script>";
                }
                else
                {
                    echo "<script>alert('Your new and Retype Password is not match'); window.location='forgot_password.php'</script>";
                }
            }
            else
            {
                echo "<script>alert('Your old password is wrong'); window.location='forgot_password.php'</script>";
            }
        }
?>
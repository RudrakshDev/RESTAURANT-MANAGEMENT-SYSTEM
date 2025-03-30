<!DOCTYPE html>
<html>
	<head>
		<title>Forgot Password</title><br><br>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<style>
            fieldset {
	width:500px;
	border:2px solid red;
	margin:0 auto;
	border-radius:5px;
}

legend {
	color: black;
	font-size: 25px;
}

dl {
	float: right;
	width: 400px;
}

dt {
	width: 180px;
	padding-bottom:8px;
	margin-bottom:8px;
	color: black;
	font-size: 18px;
}

dd {
	width:200px;
	float:left;
}

dd input {
	width: 200px;
	border: 1px solid #DDD;
	font-size: 20px;
	text-indent: 5px;
	height: 28px;
}
dd input:hover {
	width: 200px;
	border: 1px solid green;
	font-size: 15px;
	text-indent: 5px;
	height: 28px;
}

.btn {
	color: #fff;
	background-color: red;
	height: 38px;
	border: 2px solid #CCC;
	border-radius: 10px;
	float: right;
}
        </style>
	</head>

<body>
	<!-- Form Open -->
	<fieldset>
		<legend>Reset Password</legend>
		<!-- Include PHP Script -->
		<?php include 'reset.php';?>
		
		<form method="post">
             <dl>
				<dt>
					Email
				</dt>
					<dd>
						<input type="emmail" name="email" placeholder="Enter Your Email..." value="" required />
					</dd>
			</dl>

			<dl>
				<dt>
					Old Password
				</dt>
					<dd>
						<input type="password" name="old_pass" placeholder="Enter Old Password..." value="" required />
					</dd>
			</dl>
			
			<dl>
				<dt>
					New Password
				</dt>
					<dd>
						<input type="password" name="new_pass" placeholder="Enter New Password..." value=""  required />
					</dd>
			</dl>
			
			<dl>
				<dt>
					Retype New Password
				</dt>
					<dd>
						<input type="password" name="re_pass" placeholder="Retype New Password..." value="" required />
					</dd>
			</dl>
			
			<p align ="center">
				<input type="submit" class="btn" value="Reset Password" name="re_password" />
                
			</p>
		</form>
        
	</fieldset>
	<!-- Form Close -->
	
</body>
</html>

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
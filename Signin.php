<!DOCTYPE html>
<html lang="en">

<head>
	<title>Signup Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
	<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
	<!-- WebIcon -->
	<link rel="icon" href="/assets/img/Logo_T&M.png">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login.css">
	<link rel="stylesheet" type="text/css" href="util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!--===============================================================================================-->
</head>
<?php
include_once("connection.php");
if (isset($_POST["btn_signin"])) {
	$us = $_POST["username"];
	$us = htmlspecialchars(pg_escape_string($conn, $us));
	$pass1 = $_POST["pass1"];
	$pass2 = $_POST["pass2"];
	$fname = $_POST["fullname"];
	$phone = $_POST["phone"];
	$email = $_POST["email"];
	$address = $_POST["address"];
	if (strcmp($pass1, $pass2) != 0) {
		echo "<script type='text/javascript'>alert('Passoword do not match');</script>";
		echo "<script> location.href='signin.php'; </script>";
		exit;
	}
	if (strlen($pass1) < 6 || strlen($pass1) > 20) {
		echo "<script type='text/javascript'>alert('Password length must be from 6 to 20 characters');</>";
		echo "<script> location.href='signin.php'; </script>";
		exit;
	}
	$pass = md5($pass1);
	$sq = "select * from public.customer where username='$us' or email='$email'";
	$res = pg_query($conn, $sq);
	if (pg_num_rows($res) == 0) {
		pg_query($conn, "Insert into public.customer (username, password, customername,tel,email,address,state) 
        values('$us','$pass','$fname',$phone,'$email','$address',0)")
			or die(pg_result_error($conn));
		echo "<script type='text/javascript'>alert('You have registered successfully');</script>";
		echo "<script> location.href='index.php'; </script>";
		exit;
	} else {
		echo "<script type='text/javascript'>alert('Dublicate Username or Email');</script>";
		echo "<script> location.href='signin.php'; </script>";
		exit;
	}
} ?>

<body>
	<div class="limiter" id="background">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(assets/img/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign Up
					</span>
					<span class="remind">Do you already have an account?<a href="login.php">Login</a></span>
				</div>
				<form name="signin" class="login100-form validate-form" method="POST">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Username</span>
						<input class="input100" type="text" name="username" placeholder="Enter username" id="username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass1" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Password is required">
						<span class="label-input100">Confirm Password</span>
						<input class="input100" type="password" name="pass2" placeholder="Enter password">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Name is required">
						<span class="label-input100">Full Name</span>
						<input class="input100" type="text" name="fullname" placeholder="Fullname">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Phone Number is required">
						<span class="label-input100">Phone Number</span>
						<input class="input100" type="tel" name="phone" placeholder="Phone Number">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Email is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 validate-input m-b-18" data-validate="Address is required">
						<span class="label-input100">Address</span>
						<input class="input100" type="text" name="address" placeholder="Address">
						<span class="focus-input100"></span>
					</div>
					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
						</div>
						<div align="right">
							<a href="index.php" class="txt1">
								<i class="fas fa-home"></i>
								Home
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_signin" type="submit">
							Sign Up
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	<!--===============================================================================================-->
	<link rel="stylesheet" href=" https://code.jquery.com/jquery-3.6.0.min.js">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/login.js"></script>
</body>

</html>
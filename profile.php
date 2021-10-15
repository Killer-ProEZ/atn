<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Profile</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Timer -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<?php
session_start();
?>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.php"><span>T&M</span></a></h1>
                    <!-- Uncomment below if you prefer to use an image logo -->
                    <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
                </div>
                <nav id="navbar" class="navbar">
                    <ul>
                      <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                      <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
                      <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
                      <li><a class="nav-link scrollto active" href="feedback.php">Feedback</a></li>
                      <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
                      <?php if(isset($_SESSION["us"])&&$_SESSION["us"]!=""){ ?>
                      <li><a class="nav-link scrollto" href="profile.php"><?php echo "Hi ".$_SESSION["us"];?></a></li>
                      <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                      <li>
                      <a class="nav-link scrollto active" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }
                      else{
                      ?>
                      <li><a class="nav-link scrollto" href="login.php">Login</a></li>
                      <li>
                      <a class="nav-link scrollto active" href="cart.php"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }?>
                    </ul>
                    <i class="fas fa-bars mobile-nav-toggle"></i>
                  </nav><!-- .navbar -->

            </div><!-- End Header Container -->
        </div>
    </header><!-- End Header -->
    <?php
	include_once('connection.php');
        if(isset($_GET["id"])){
            
			$id=$_GET["id"];
			$result=mysqli_query($conn,"select*from customer where UserName='$id'") or die(mysqli_error($conn)) ;
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$cusid=$row['CustomerID'];
			$cusname=$row['CustomerName'];
			$username=$row['UserName'];
            $password=$row['Password'];
            $tel=$row['Tel'];
            $email=$row['Email'];
            $address=$row['Address'];
            $state=$row['State'];	
?>
   <?php
if(isset($_POST["btn_update"]))
{
    $us=$_POST["username"];
    $pass1=$_POST["pass1"];
    $pass2=$_POST["pass2"];
    $cusid=$_POST["cusid"];
    $fname=$_POST["fname"];
    $phone=$_POST["phone"];
    $email=$_POST["email"];
    $address=$_POST["address"];
    if (trim($pass1) == ""||trim($pass2) == ""){
        if (trim($us) == "") {
            echo "<script type='text/javascript'>alert('Username can not be empty');</script>";
        }
        else if (trim($fname) == "") {
            echo "<script type='text/javascript'>alert('fullname can not be empty');</script>";
        }
        else if (trim($phone) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else if (!is_numeric($phone)) {
            echo "<script type='text/javascript'>alert('Phone must be a number');</script>";
        }
        else if (trim($email) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else if (trim($address) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else{
        include_once("connection.php");
        $sq="select * from customer where CustomerID!='$cusid' and Email='$email'";
        $res=mysqli_query($conn,$sq);
        $pass1=md5($pass1);
        if(mysqli_num_rows($res)==0){
            mysqli_query($conn,"UPDATE `customer` SET 
            `UserName`='$us',
            `CustomerName`='$fname',`Tel`='$tel',`Email`='$email',`Address`='$address'WHERE CustomerID='$cusid'")
            or die(mysqli_error($conn));
            echo "<script type='text/javascript'>alert('Update Profile Successful');</script>";
            echo "<script> location.href='index.php'; </script>";
            exit;
        }
        else{
            echo "<script type='text/javascript'>alert('Update Profile Failing');</script>";
            echo "<script> location.href='index.php'; </script>";
            exit;
        }
    }
    }else{
        if (trim($us) == "") {
            echo "<script type='text/javascript'>alert('Username can not be empty');</script>";
        }
      else if (trim($pass1) == ""||trim($pass2) == "") {
          echo "<script type='text/javascript'>alert('Passoword can not be empty');</script>";
      }
      else if (strcmp($pass2,$pass1)!=0) {
          echo "<script type='text/javascript'>alert('Passoword do not match');</script>";
      }
      else if (strlen($pass1)<6 ||strlen($pass1)>20) {
          echo "<script type='text/javascript'>alert('Password length must be from 6 to 20 characters');</script>";
      }
        else if (trim($fname) == "") {
            echo "<script type='text/javascript'>alert('fullname can not be empty');</script>";
        }
        else if (trim($phone) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else if (!is_numeric($phone)) {
            echo "<script type='text/javascript'>alert('Phone must be a number');</script>";
        }
        else if (trim($email) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else if (trim($address) == "") {
            echo "<script type='text/javascript'>alert('phone can not be empty');</script>";
        }
        else{
        include_once("connection.php");
        $sq="select * from customer where CustomerID!='$cusid' and Email='$email'";
        $res=mysqli_query($conn,$sq);
        $pass1=md5($pass1);
        if(mysqli_num_rows($res)==0){
            mysqli_query($conn,"UPDATE `customer` SET 
            `UserName`='$us',`Password`='$pass1',
            `CustomerName`='$fname',`Tel`='$tel',`Email`='$email',`Address`='$address'WHERE CustomerID='$cusid'")
            or die(mysqli_error($conn));
            echo "<script type='text/javascript'>alert('Update Profile Successful');</script>";
            echo "<script> location.href='index.php'; </script>";
            exit;
        }
        else{
            echo "<script type='text/javascript'>alert('Update Profile Failing');</script>";
            echo "<script> location.href='index.php'; </script>";
            exit;
        }
    }
    }
}
 ?>
    <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>profile</h2>
                            <p></p>
                        </div>
                    </div>
                    <form action="" method="post" role="form" class="php-email-form mt-4">
                        <div class="row">
                        <div class="form-group mt-3">

                            <input type="text" class="form-control" name="username" id="email" placeholder="Username"
                             value="<?php echo $id?>">
                        </div>
                            <div class="col-md-6 form-group">
                      
                                <input type="password" name="pass1" class="form-control" id="name" placeholder="Password"
                                     value="">
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                      
                                <input type="password" class="form-control" name="pass2" id="phone"
                                    placeholder="Confirm Password"  value="">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="number" class="form-control" name="cusid" id="email" placeholder="CustomerID"
                                required value="<?php echo $cusid?>" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="fname" id="address" placeholder="Fullname"
                                required value="<?php echo $cusname?>">
                        </div>
                        <div class="form-group mt-3">
                            <input type="email" class="form-control" name="email" id="address" placeholder="Email"
                                required value="<?php echo $email?>">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="phone" id="address" placeholder="Phone"
                                required value="<?php echo $tel?>">
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="address" id="address" placeholder="Address"
                                required value="<?php echo $address?>">
                        </div>
                        <div class="my-3">
                        </div>
                        <div class="text-center"><button  name="btn_update" type="submit">Update</button></div>
                    </form>
                </div>
            </div>
        </section><!-- End Contact Section -->
    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>T&M</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> 0346370333<br>
                            <strong>Email:</strong> T&Mcompany@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Content</h4>
                        <ul>
                        <li><a href="logout.php#services">Service</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="logout.php#contact">Contact</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="cart.php">Cart</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Opening Hours</h4>
                        <ul>
                            <li> Mon - Fri: 8am - 8pm</li>
                            <li> Saturday: 9am - 7pm</li>
                            <li>Sunday: 9am - 8pm</li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-newsletter">
                        <h4> Store Location</h4>
                        <p>500 Terry Francois <br>
                            Street San Francisco,<br>
                            CA 94158</p>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <img src="/assets/img/Logo_T&M.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                class="fas fa-arrow-up"></i></a>

        <!-- Vendor JS Files -->

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>


</body>

</html>
<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=profile.php"/>';
	}
	?>
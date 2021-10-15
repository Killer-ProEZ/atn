<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>T&M Shop</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Timer -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- WebIcon -->
  <link rel="icon" href="assets/img/Logo_T&M.png">
  <!-- Favicons -->
  <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
    crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <?php
session_start();
?>
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
      <div class="header-container d-flex align-items-center justify-content-between">
        <div class="logo">
          <h1 class="text-light"><a href=""><span>T&M</span></a></h1>
        </div>
        <script>
          function check(){
            alert("You must log in to send Feedback")
            location.href="login.php"
          }
        </script>
        <nav id="navbar" class="navbar">
          <ul>
            <li><a class="nav-link scrollto active" href="?page=home">Home</a></li>
            <li><a class="nav-link scrollto" href="?page=home">Services</a></li>
            <li><a class="nav-link scrollto" href="?page=home">Contact</a></li>
            <?php if(isset($_SESSION["us"])&&$_SESSION["us"]!=""){ ?>
              <?php $us=$_SESSION["us"];?>
            <li><a class="nav-link scrollto" href="?page=feedback">Feedback</a></li>
            <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
  
                      <li><a class="nav-link scrollto" href="profile.php?id=<?php echo $us;?>"><?php echo "Hi ".$_SESSION["us"];?></a></li>
                      <li><a class="nav-link scrollto" href="?page=logout">Logout</a></li>
                      <li>
                      <a class="nav-link scrollto" href="?page=cart"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }
                      else{
                      ?>
                      <li><a class="nav-link scrollto" href="admin_login.html" target="_blank">Admin</a></li>
                      <li><a class="nav-link scrollto" href="login.php">Login</a></li>
                      <li>
                      <a class="nav-link scrollto" href="?page=cart"><i id="uilogo" class="nav-link scrollto fas fa-shopping-cart"></i></a>
                      </li>
                      <?php }?>
          </ul>
          <i class="fas fa-bars mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

      </div><!-- End Header Container -->
    </div>
  </header><!-- End Header -->

 <?php
 if(isset($_GET['page'])){
   $page=$_GET['page'];
   if($page=='feedback'){
     include_once("feedback.php");
   }
   if($page=='logout'){
    include_once("logout.php");
  }
  if($page=='cart'){
    include_once("cart.php");
  }
  if($page=='home'){
    include_once("home.php");
  }
  if($page=='payment'){
    include_once("payment.php");
  }
  if($page=='prodetail'){
    include_once("Product_Details.php");
  }
  if($page=='search'){
    include_once("search.php");
  }
 }
 else{
  include("home.php");
 }
 ?>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>T&M</h3>
            <p>
              An Khanh ward, <br>
              Ninh Kieu district,<br>
              Can Tho city <br><br>
              <strong>Phone:</strong> 0346370333<br>
              <strong>Email:</strong> T&Mcompany@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Content</h4>
            <ul>
              <li><a href="#services">Service</a></li>
              <li onclick="check()"><a href="#">Feedback</a></li>
              <li><a href="#contact">Contact</a></li>
              <li><a href="login.php">Login</a></li>
              <li><a href="cart.html">Cart</a></li>
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
            <p> An Khanh ward, <br>
              Ninh Kieu district,<br>
              Can Tho city <br></p>
          </div>
          <div class="col-lg-2 col-md-6">
            <img src="assets/img/Logo_T&M.png" alt="">
          </div>
        </div>
      </div>
    </div>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="fas fa-arrow-up"></i></a>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </footer>
</body>

</html>
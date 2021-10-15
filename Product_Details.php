<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <title>Product Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- Timer -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- WebIcon -->
   <link rel="icon" href="assets/img/Logo_T&M.png">
  <!-- Favicons -->
  <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<script>
          function check(){
            alert("You must log in to send Feedback")
            location.href="login.php"
          }
        </script>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Product Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=mysqli_query($conn,"select*from product where ProductID='$id'") or die(mysqli_error($conn)) ;
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$proid=$row['ProductID'];
			$proname=$row['ProductName'];
            $price=$row['Price'];
            $brandid=$row['BrandID'];
            $desc=$row['Description'];
            $result1=mysqli_query($conn,"select*from brand where BrandID='$brandid'") or die(mysqli_error($conn)) ;
            $row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
            $brandname=$row1['BrandName'];
            
      }
?>

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row gy-4">
          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper-container">
              <div class="swiper-wrapper align-items-center">
                <div class="swiper-slide">
                  <img src='product-imgs/<?php echo $row["Img"]; ?>' alt="laptop">
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3><?php echo $proname;?></h3>
              <ul>
                <li><strong>ProducID</strong>: <?php echo $proid;?></li>
                <li><strong>Price</strong>:<?php echo $price;?> $</li>
                <li><strong>Brand</strong>: <?php echo $brandname;?></li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>Description</h2>
              <p>
              <?php echo $desc;?>
              </p>
            </div>
            <div class="portfolio-description">

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

</body>

</html>
<!DOCTYPE html>
<html lang="en">
<?php
// Start the session
session_start();
?>

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Cart</title>
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
$cart=(isset($_SESSION['cart']))?$_SESSION['cart']:[];
?>
<script>
          function check(){
            alert("You must log in to send Feedback")
            location.href="login.php"
          }
        </script>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->
    
    <?php 
      if(isset($_GET['id'])){
        $id=$_GET['id'];
      }
    ?>
   <?php
    $action=(isset($_GET['action']))?$_GET['action']:'';
    ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Cart</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <?php 
        if($action=='delete'){
          unset($_SESSION['cart'][$id]);
        }
        ?>
        <script>
      function deleteConfirm(){
          if(confirm("Are you sure to delete!")){
              return true;
          }
          else{
              return false;
          }
      }
      </script>
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>Cart</h2>
                            <p></p>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Img</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th width="100px" scope="col">Price</th>
                            <th style="text-align: center;" scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $total=0;
                         foreach($cart as $key=> $value):
                        ?>
                          <tr>
                            <th scope="row"><?php echo $key++; ?></th>
                            <td><img class="cart-img" src="product-imgs/<?php echo $value['image'];?>" alt=""></td>
                            <td><?php echo $value['name'];?></td>
                            <td><input readonly class="quality" type="number" value="<?php echo $value['quanlity'];?>"></td>
                            <td><input readonly width="70px" type="text" value="<?php echo $value['price']." $";?>"></td>
                            <td align="center"><a onclick="deleteConfirm()" href="cart.php?id=<?php echo $value['id'];?>&action=delete"><i class="far fa-trash-alt"></i></a></td>
                            <?php $total+=($value['quanlity']*$value['price']); ?>
                          </tr>
                          <?php endforeach ?>
                        </tbody>
                      </table>
                      <?php 
                      if(isset($_POST['btn_buy'])){
                        if(isset($_SESSION["us"])&&$_SESSION["us"]!=""){
                            echo "<script> location.href='index.php?page=payment'; </script>";
                            exit;
                        }
                        else{
                          echo "<script type='text/javascript'>alert('You must be logged in to pay for the product');</script>";
                          echo "<script> location.href='login.php'; </script>";
                          exit;
                        }
                      }
                      ?>
                      <form action="" method="POST">
                        <div class="form-group row total">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Total </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control form-control-sm" id="colFormLabelSm" readonly value="<?php echo $total." $"?>">
                            </div>
                          </div>
                        <div class="btn-func" align="center">
                            <button name='btn_buy' style="width: 100px; font-weight: bold;" type="submit" class="btn btn-primary">Buy</button>
                        </div>
                      </form>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
  

</body>

</html>

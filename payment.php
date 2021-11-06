<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Feedback</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Timer -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicons -->
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<?php
session_start();
?>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->

    <?php
    if (isset($_POST["btn_payment"])) {
        include_once("connection.php");
        $total = $_SESSION['total'];
        $username = $_SESSION['us'];
        $sq = "select customerid from public.customer where username='$username'";
        $res = pg_query($conn, $sq) or die(pg_result_error($conn));
        $row = pg_fetch_array($res, NULL, PGSQL_ASSOC);
        $cusid = $row["customerid"];
        $query = "INSERT INTO public.order(customerid, totalprice) VALUES ('$cusid','$total')";
        $res = pg_query($conn, $query) or die(pg_result_error($conn));
        $res1 = pg_query($conn, "select orderid from public.orderdetail order by orderid desc fetch first 1 rows only ") or die(pg_result_error($conn));
        $row1 = pg_fetch_array($res1, NULL, PGSQL_ASSOC);
        $orderid = $row1["orderid"];
        foreach ($_SESSION["cart"] as $key => $row) {
            $query1 = "INSERT INTO public.orderdetail(orderid,productid,quality) VALUES (" . $orderid . ",'" . $key . "'," . $row['quanlity'] . ")";
            $res1 = pg_query($conn, $query1) or die(pg_result_error($conn));
            $query1 = "UPDATE public.product SET stock=stock-" . $row['quanlity'] . " WHERE productid='" . $key . "'";
            $res1 = pg_query($conn, $query1) or die(pg_result_error($conn));
        }
        unset($_SESSION["cart"]);
        unset($_SESSION["total"]);
        echo "<script type='text/javascript'>alert('Payment success');</script>";
        echo "<script> location.href='index.php'; </script>";
        exit;
    }
    ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="cart.php">Cart</a></li>
                        <li>Payment</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->
        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4" data-aos="fade-right">
                        <div class="section-title">
                            <h2>Payment</h2>
                            <p></p>
                        </div>
                    </div>
                    <form action="" method="post" role="form" class="php-email-form mt-4">
                        <div class="form-group mt-3">
                            <label class="form-check-label" for="flexCheckChecked">
                                Order Date
                            </label>
                            <input type="text" class="form-control" name="email" id="email" readonly value="<?php echo date("Y/m/d"); ?>" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Payment on delivery
                            </label>
                        </div>
                        <div class="form-group mt-3">
                            <label class="form-check-label" for="flexCheckChecked">
                                TotalPrice
                            </label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $total . '$' ?>" required>
                        </div>
                        <div class="my-3">
                        </div>
                        <div class="text-center"><button name="btn_payment" type="submit">Payment</button></div>
                    </form>
                </div>
            </div>
        </section><!-- End Contact Section -->
    </main><!-- End #main -->
</body>

</html>
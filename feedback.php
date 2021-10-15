<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Feedback</title>
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
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
    <!-- ======= Header ======= -->
    <?php
    $username=$_SESSION['us'];

if(isset($_POST["btn_send"]))
{   include_once("connection.php");
    $sub=$_POST["subject"];
    $mes=$_POST["message"];
    if (trim($sub) == "") {
        echo "<script type='text/javascript'>alert('Subject can not be empty');</script>";
    }
    else{
        $sq="select CustomerID from customer where UserName='$username'";
        $res=mysqli_query($conn,$sq) or die(mysqli_error($conn));
        $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $id=$row['CustomerID'];
        mysqli_query($conn,"INSERT INTO `feedback`( `CustomerID`, `Subject`, `Content`) VALUES ('$id','$sub','$mes')")
        or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Add Feedback Successful');</script>";
}
}
 ?>
    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <ol>
                        <li><a href="index.php">Home</a></li>
                        <li>Feedback</li>
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
                            <h2>Feedback</h2>
                            <p></p>
                        </div>
                    </div>
                    <form action="" method="post" role="form" class="php-email-form mt-4">
                        <div class="form-group mt-3">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                required>
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="Message"
                                required></textarea>
                        </div>
                        <div class="my-3">
                        </div>
                        <div class="text-center"><button name="btn_send" type="submit">Send Message</button></div>
                    </form>
                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>


</body>

</html>
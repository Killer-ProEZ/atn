<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Update Order</title>
     <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
     <?php
	include_once('connection.php');
        if(isset($_GET["id"])){
			$id=$_GET["id"];
			$result=mysqli_query($conn,"select*from `order` where OrderID='$id'") or die(mysqli_error($conn)) ;
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
			$orderid=$row['OrderID'];
			$cusid=$row['CustomerID'];
      $orderdate=$row['OrderDate'];

?>
<?php
if(isset($_POST["btn_update"]))
{
    include_once('connection.php');
    $orderid=$_POST["orderid"];
    $cusid=$_POST["cusid"];
    if (trim($orderid) == "") {
        echo "<script type='text/javascript'>alert('OrderID can not be empty');</script>";
    }
    else if (trim($cusid) == "") {
        echo "<script type='text/javascript'>alert('CustomerID can not be empty');</script>";
    }
    else{
    $sq="select * from `order` where OrderID=$orderid";
    $res=mysqli_query($conn,$sq) or die(mysqli_error($conn));
    if(mysqli_num_rows($res)==1){
        mysqli_query($conn,"UPDATE `order` SET `CustomerID`='$cusid' WHERE OrderID=$orderid")
        or die(mysqli_error($conn));
        echo "<script type='text/javascript'>alert('Update Order Successful');</script>";
        echo "<script> location.href='?page=order'; </script>";
    }
    else{
        echo "<script type='text/javascript'>alert('Duplicate OrderID');</script>";
        echo "<script> location.href='?page=update_order'; </script>";
    }
}
}
 ?>
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
    <link rel="stylesheet" href="btn.css">
  </head>
  <body>
    

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <h2>Update Order</h2>
      <div class="btn-cancel">
      <a class="btn btn-danger" href="?page=order" role="button"><i class="fas fa-times"></i><Span> Cancel</Span></a>
    </div>
        <form name="update_order" method="post">
              <!-- Text input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="orderid">OrderID</label>
                <input name="orderid" type="number" id="orderid" class="form-control" placeholder="OrderID" value="<?php echo $orderid;?>" readonly />
              </div>
              <div class="row mb-4">
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="cusid">CustomerID</label>
                                <input name="cusid" type="number" id="cusid" class="form-control" placeholder="CustomerID" value="<?php echo $cusid;?>" />
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-outline">
                                <label class="form-label" for="orderdate">OrderDate</label>
                                <input name="orderdate" type="text" id="orderdate" class="form-control" value="<?php echo $orderdate;?>" readonly/>
                            </div>
                        </div>
                </div>
            <!-- Submit button -->
            <div class="btn-func">
                <button name="btn_update"  type="submit" class="btn btn-primary">Update</button>
                <button  type="reset" class="btn btn-primary">RESET</button>
            </div>
          </form>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

<?php
	}
	else{
		echo '<meta http-equiv="refresh" content="0; URL=?page=order"/>';
	}
	?>
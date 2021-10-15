<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>OrderDetail Management</title>
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
       
       <?php
        include_once("connection.php");
        if(isset($_GET["function"])=='del'){
            if(isset($_GET["orderid"])){
                $orderid=$_GET["orderid"];
                $productid=$_GET["productid"];
                mysqli_query($conn,"delete from orderdetail where OrderID='$orderid'and ProductID='$productid'")or die(mysqli_error($conn));
                echo '<meta http-equiv="refresh" content="0;URL=admin.php?page=orderdetail"/>';
            }
        }
        ?>
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
  </head>
  <body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>

      <h2>Orders Details</h2>
      <div class="add"><a href="admin.php?page=add_orderdetail"><i class="fas fa-plus"></i>&nbsp;Add OrderDetail</a></div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>OrderID</th>
              <th>ProductID</th>
              <th>Quality</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php
            $No=1;
            $result=mysqli_query($conn,"SELECT * FROM `orderdetail`") or die(mysqli_error($conn));
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            ?>
            <tr>
              <td><?php echo $row["OrderID"];?></td>
              <td><?php echo $row["ProductID"];?></td>
              <td><?php echo $row["Quality"];?></td>
              <td><a href="?page=update_orderdetail&&orderid=<?php echo $row["OrderID"];?>&&productid=<?php echo $row["ProductID"];?>"><i class="fas fa-pencil-alt"></i></a></td>
              <td><a href="admin_orderdetail.php?function=del&&orderid=<?php echo $row["OrderID"];?>&&productid=<?php echo $row["ProductID"];?>"onclick="return deleteConfirm()"><i class="fas fa-trash-alt"></i></a></i></td>
            </tr>
            <?php $No++;}?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

      <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
  </body>
</html>

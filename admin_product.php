<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Product Management</title>
     <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet">

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
            if(isset($_GET["function"])=="del"){
                if(isset($_GET["id"])){
                    $id=$_GET["id"];
                    $sq="select Img from product where ProductID='$id'";
                    $res=mysqli_query($conn,$sq);
                    $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
                    $filePic=$row['Img'];
                    unlink("product-imgs/".$filePic);
                    mysqli_query($conn,"delete from orderdetail where ProductID='$id'");
                    mysqli_query($conn,"delete from product where ProductID='$id'");
                    echo '<meta http-equiv="refresh" content="0;URL=admin.php?page=product"/>';
                }
            }
            ?>
  </head>
  <body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Admin</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
      </div>
      <h2>Products</h2>
      <div class="add"><a href="admin.php?page=add_product"><i class="fas fa-plus"></i>&nbsp;Add Products</a></div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Price</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
          <?php
			$No=1;
            $result=mysqli_query($conn,"Select ProductID, Img, ProductName, Price from product");
            while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){	
			?>
            <tr>
              <td><?php echo $row["ProductID"];  ?></td>
              <td ><img src='product-imgs/<?php echo $row["Img"]; ?>' width="60px"></td>
              <td><?php echo $row["ProductName"];  ?></td>
              <td><?php echo $row["Price"];  ?></td>
              <td><a href="?page=update_product&&id=<?php echo $row["ProductID"];?>"><i class="fas fa-pencil-alt"></i></a></td>
              <td><a href="admin_product.php?function=del&&id=<?php echo $row["ProductID"];?>"onclick="return deleteConfirm()"><i class="fas fa-trash-alt"></i></a></i></td>
            </tr> 
            <?php
               $No++;
            }
			?>      
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>

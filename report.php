<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Report</title>
    <!-- WebIcon -->
    <link rel="icon" href="assets/img/Logo_T&M.png">
    <script src="https://kit.fontawesome.com/a2c5b72efa.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
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
    <!-- Custom styles for this template -->
    <link href="admin.css" rel="stylesheet">
</head>
<?php
session_start();
include_once('connection.php');
?>
<?php
if (isset($_POST["btn-summit"])) {
    $startday = date('Y-m-d', strtotime($_POST["startday"]));
    $endday = date('Y-m-d', strtotime($_POST["endday"]));
    if (trim($startday) == "") {
        echo "<script type='text/javascript'>alert('StartDay can not be empty');</script>";
    } else if (trim($endday) == "") {
        echo "<script type='text/javascript'>alert('EndDay can not be empty');</script>";
    }
    echo '<meta http-equiv="refresh" content="0;URL=?page=report&&startday=' . $startday . '&&endday=' . $endday . '">';
}
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Admin</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <h2>Report</h2>
        <form action="" method="POST">
            <div class="row">
                <div class="col-sm-4">
                    <samp>From</samp>
                    <input type="date" class="form-control" name='startday' id="startday">
                </div>
                <div class="col-sm-4">
                    <samp>To</samp>
                    <input type="date" class="form-control" name='endday' id="endday">
                </div>
                <div class="col-sm-4">
                    <button name="btn-summit" class="btn btn-info mt-4" type="submit">Submit</button>
                </div>
            </div>
        </form>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>StoreID</th>
                        <th>StoreName</th>
                        <th>Address</th>
                        <th>Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET['startday'])) {
                        $startday = $_GET['startday'];
                        $endday = $_GET['endday'];
                    } else {
                        $startday = date("Y-m-d");
                        $endday = date("Y-m-d");
                    }
                    $No = 1;
                    $result = pg_query($conn, "Select * from public.store");
                    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                        $storeid = $row["storeid"];
                        $sq = "Select Sum(price) FROM public.orderdetail WHERE orderid in (Select orderid from public.order WHERE orderdate BETWEEN '$startday' AND '$endday' ) and productid in (select productid from public.product WHERE storeid='$storeid')";
                        $res = pg_query($conn, $sq);
                        $row1 = pg_fetch_array($res, NULL, PGSQL_ASSOC)
                    ?>
                        <tr>
                            <td><?php echo $No; ?></td>
                            <td><?php echo $row["storeid"]; ?></td>
                            <td><?php echo $row["storename"]; ?></td>
                            <td><?php echo $row["address"]; ?></td>
                            <td><?php echo $row1["sum"]; ?></td>
                        </tr>
                    <?php $No++;
                    } ?>
                </tbody>
            </table>
        </div>
    </main>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="dashboard.js"></script>
</body>

</html>
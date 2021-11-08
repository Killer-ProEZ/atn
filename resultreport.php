<?php
session_start();
?>
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
            $No = 1;
            $startday = $_SESSION['startday'];
            $endday = $_SESSION['endday'];
            $result = pg_query($conn, "Select * from public.store");
            while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
                $proid = $row["storeid"];
                $sq = "Select Sum(price) FROM public.orderdetail WHERE orderid in (Select orderid from public.order WHERE orderdate BETWEEN '2021-11-06' AND '2021-11-06' ) and productid in (select productid from public.product WHERE storeid='$proid')";
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
            <?php
            unset($_SESSION['startday']);
            unset($_SESSION['endday']);
            ?>
        </tbody>
    </table>
</div>
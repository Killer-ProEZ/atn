<?php
session_start();
?>
<tbody>
    <?php
    $No = 1;
    $startday = $_SESSION['startday'];
    $endday = $_SESSION['startday'];
    $result = pg_query($conn, "Select * from public.store");
    while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) {
        $proid = $row["storeid"];
        $sq = "Select Sum(price) FROM public.orderdetail WHERE orderid in (Select orderid from public.order WHERE orderdate BETWEEN '$startday' AND '$endday' ) and productid in (select productid from public.product WHERE storeid='$proid')";
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
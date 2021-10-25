<?php session_start();
$id = isset($_GET['id']) ? $_GET['id'] : '';
include_once("connection.php");
$query = "select * from public.product where productid='$id'";
$res = pg_query($conn, $query);
if ($res) {
    $product = pg_fetch_assoc($res);
}
$item = [
    'id' => $product['productid'],
    'name' => $product['productname'],
    'image' => $product['img'],
    'price' => $product['price'],
    'quanlity' => 1,
    'stock' => $product['stock']
];
if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['quanlity'] += 1;
    if ($_SESSION['cart'][$id]['quanlity'] > $_SESSION['cart'][$id]['stock']) {
        $_SESSION['cart'][$id]['quanlity'] -= 1;
        echo "<script type='text/javascript'>alert('Insufficient quantity of products');</script>";
        echo "<script> location.href='index.php'; </script>";
        exit;
    }
    echo "<script type='text/javascript'>alert('Product has been added, you can go to cart to view');</script>";
    echo "<script> location.href='index.php'; </script>";
    exit;
} else {
    $_SESSION['cart'][$id] = $item;
    echo "<script type='text/javascript'>alert('Product has been added, you can go to cart to view');</script>";
    echo "<script> location.href='index.php'; </script>";
    exit;
}

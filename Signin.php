<?php
include_once("connection.php");
if (isset($_POST["btn_signin"])) {
    $us = $_POST["username"];
    $us = htmlspecialchars(pg_escape_string($conn, $us));
    $pass1 = $_POST["pass1"];
    $pass2 = $_POST["pass2"];
    $fname = $_POST["fullname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    if (strcmp($pass1, $pass2) != 0) {
        echo "<script type='text/javascript'>alert('Passoword do not match');</script>";
        echo "<script> location.href='signin.html'; </script>";
        exit;
    }
    if (strlen($pass1) < 6 || strlen($pass1) > 20) {
        echo "<script type='text/javascript'>alert('Password length must be from 6 to 20 characters');</>";
        echo "<script> location.href='signin.html'; </script>";
        exit;
    }
    $pass = md5($pass1);
    $sq = "select * from public.customer where username='$us' or email='$email'";
    $res = pg_query($conn, $sq);
    if (pg_num_rows($res) == 0) {
        pg_query($conn, "Insert into customer (UserName, Password, CustomerName,Tel,Email,Address,State) 
        values('$us','$pass','$fname',$phone,'$email','$address',0)")
            or die(pg_result_error($conn));
        echo "<script type='text/javascript'>alert('You have registered successfully');</script>";
        echo "<script> location.href='index.php'; </script>";
        exit;
    } else {
        echo "<script type='text/javascript'>alert('Dublicate Username or Email');</script>";
        echo "<script> location.href='signin.html'; </script>";
        exit;
    }
}

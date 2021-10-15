<?php
$conn = pg_connect("postgres://lvwhzzxywakucf:4f7a868361388ac187f4cbb59b9b63e680694aafcf93a4275d3215d82249fb07@ec2-34-203-91-150.compute-1.amazonaws.com:5432/d81lboqi7rhl24");
// $conn=mysqli_connect('localhost','root','','laptop')
// or die("Can not connect database".mysqli_connect_error());
// $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=19091995");
if (!$conn) {
    die("Connection failed");
}

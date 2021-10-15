<?php
$conn=pg_connect("postgres://kdnderyiaekdim:48dc0ac3a04fb186a060a46cb004026b3b5e6b70d7d3d2e1e22502455ff40ec0@ec2-54-147-76-191.compute-1.amazonaws.com:5432/dfhbpnfbi8n7kg");
// $conn=mysqli_connect('localhost','root','','laptop')
// or die("Can not connect database".mysqli_connect_error());
// $conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=19091995");
if(!$conn){
    die("Connection failed");
}

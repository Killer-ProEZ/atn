<?php
// $conn=pg_connect("");
// $conn=mysqli_connect('localhost','root','','laptop')
// or die("Can not connect database".mysqli_connect_error());
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=19091995");
if(!$conn){
    die("Connection failed");
}

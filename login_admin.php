<?php
session_start();
$_SESSION["us"] = "";
?>
<?php
include_once("connection.php");
if (isset($_GET['btn_login'])) {
	$us = $_GET['username'];
	$us = htmlspecialchars(pg_escape_string($conn, $us));
	$pa = $_GET['pass'];
	$pass = md5($pa);
	$res = pg_query($conn, "select * from public.customer where UserName='$us' and Password='$pass' and State=1")
		or die(pg_result_error($conn));
	if (pg_num_rows($res) == 1) {
		echo "<script type='text/javascript'>alert('Login Successful');</script>";
		$_SESSION["us"] = "$us";
		echo "<script> location.href='admin.php?page=product'; </script>";
		exit;
	} else {
		echo "<script type='text/javascript'>alert('You loged in fail');</script>";
		echo "<script> location.href='admin_login.html'; </script>";
		exit;
	}
}
?>
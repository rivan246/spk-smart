<?php
session_start();
include '../onek.php';

if (isset($_GET['name'])) {

	$id = $_GET['name'];
	mysqli_query($dbcon, "UPDATE admin SET role='admin' WHERE id_admin = '$id'");
	echo "<script>alert ('berhasil mengubah')</script>";
	header("location:../admin.php");
} else {
	echo "<h1>FORBIDEN ACCESS</h1>";
}
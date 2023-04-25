<?php
session_start();
include '../onek.php';

if (isset($_POST['submit'])) {

	$id = $_POST['id'];
	$nama   = $_POST['nama'];
	$k1   = $_POST['k1'];
	$k2 = $_POST['k2'];
	$k3 = $_POST['k3'];
	$k4 = $_POST['k4'];
	$k5 = $_POST['k5'];
	$k6 = $_POST['k6'];

	$sql = "UPDATE penilaian SET nama='$nama', k1='$k1', k2='$k2', k3='$k3', k4='$k4', k5='$k5', k6='$k6' WHERE id_penilaian='$id'";
	$query = mysqli_query($dbcon, $sql);
	header("location:../nilai.php?alert=berhasil");
} else {
	echo "<h1>FORBIDEN ACCESS</h1>";
}
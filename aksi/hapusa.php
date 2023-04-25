<?php
session_start();
include '../onek.php';

if (isset($_GET['name'])) {

	$nik = $_GET['name'];
	mysqli_query($dbcon, "DELETE FROM masyarakat WHERE nik = '$nik'");
	mysqli_query($dbcon, "DELETE FROM penilaian WHERE nik='$nik'");
	echo "<script>confirm('berhasil menghapus beserta nilai')</script>";
	header("location:../alternatif.php");
} else {
	echo "<h1>NGAPAIN WOI</h1>";
}
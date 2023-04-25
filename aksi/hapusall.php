<?php
session_start();
include '../onek.php';

mysqli_query($dbcon, "TRUNCATE TABLE penilaian");
echo "<script>confirm('Data berhasil dihapus semua')</script>";
header("location:../nilai.php");
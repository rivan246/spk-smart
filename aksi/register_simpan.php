<?php
include '../onek.php';

if (($_POST['username'] != '') and ($_POST['password'] != '') and ($_POST['nama'] != '')) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];

	$cari = mysqli_query($dbcon, "SELECT * FROM admin WHERE username='$username'");
	$cek = mysqli_num_rows($cari);

	if ($cek > 0) {
		header("location:../register.php?alert=username_dobel");
	} else {
		mysqli_query($dbcon, "INSERT INTO admin (username, password, nama, role) VALUES ('$username', '$password', '$nama','user')");
		header("location:../login.php?alert=berhasil");
		// if (!in_array($ext, $ekstensi)) {
		// 	header("location:register.php?alert=gagal_ekstensi");
		// } else {
		// 	if ($ukuran < 1044070) {
		// 		$xx = $rand . '_' . $filename;
		// 		move_uploaded_file($_FILES['foto']['tmp_name'], 'fotoprofil/' . $rand . '_' . $filename);
		// 		mysqli_query($koneksi, "INSERT INTO user (peran, username, password, email, nama, tempatlahir, tanggallahir, foto) VALUES ('', '$username', '$password', '$email', '$nama', '$tempatlahir', '$tanggallahir', '$xx')");
		// 		header("location:login.php?alert=berhasil");
		// 	} else {
		// 		header("location:user_tambah.php?alert=gagal_ukuran");
		// 	}
		// }
	}
} else {
	header("location:../register.php?alert=belum_lengkap");
}
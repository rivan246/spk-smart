<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistem Seleksi Penerima Bantuan</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href="register.css">

</head>

<body class="hold-transition login-page">
    <div class="container" style="margin-top: 3rem;">
        <div class="login-logo" style="font-size: 1.7rem; font-weight:bold;">
            <a><b>SELEKSI PENERIMA BANTUAN</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card-group">
            <div class="card">
                <img class="card-img-top" src="assets/dist/img/img1.jpeg" alt="Card image cap">
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Daftarkan Akun Anda</p>
                    <div class="alert">
                        <?php
						include 'onek.php';
						if (isset($_GET['alert'])) {
							if ($_GET['alert'] == 'gagal_ekstensi') {
								echo "<p>Ekstensi Tidak Diperbolehkan!</p>";
							} elseif ($_GET['alert'] == 'foto_kosong') {
								echo "<p>Anda Belum Upload Foto!</p>";
							} elseif ($_GET['alert'] == 'gagal_ukuran') {
								echo "<p>Ukuran File Terlalu Besar!</p>";
							} elseif ($_GET['alert'] == 'belum_lengkap') {
								echo "<p>Data Anda Belum Lengkap!</p>";
							} elseif ($_GET['alert'] == 'username_dobel') {
								echo "<p>Username Sudah Digunakan, Pilih Username Lain!</p>";
							}
						}
						?>
                    </div>
                    <form method="post" action="aksi/register_simpan.php">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Nama" name="nama" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                    value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block"
                                value="Register">
                            <a href="login.php">Sudah punya akun? Login disini.</a>
                        </fieldset>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
</body>

</html>
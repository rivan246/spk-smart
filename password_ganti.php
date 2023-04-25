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
        <div class="card">
            <div class="card-body login-card-body">
                <div class="form">
                    <p class="login-box-msg">Ganti Password</p>
                    <div class="alert">
                        <?php
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == 'tidak_sama') {
                                echo "<p>Password Tidak Sama</p>";
                            }
                        }
                        ?>
                    </div>


                    <?php
                    include 'onek.php';
                    if ((isset($_POST['username'])) and (isset($_POST['nama']))) {
                        $username = $_POST['username'];
                        $nama = $_POST['nama'];
                        $cari = mysqli_query($dbcon, "SELECT * FROM admin WHERE username='$username' and nama='$nama' ");
                        $hasil = mysqli_num_rows($cari);
                        if ($hasil > 0) {
                            $data = mysqli_fetch_array($cari);
                            // $id = $data['id_user'];
                    ?>
                    <form method="post" action="password_update.php">
                        <input style="display: none;" type="text" name="id" value="<?= $data['id_admin'] ?>">
                        <div class="form-group">
                            <input class="form-control" placeholder="Password Baru" name="passwordbaru" type="text"
                                autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Ulangi Password" name="ulangpassword" type="text">
                        </div>
                        <div class="form-row">
                            <button class="submit" type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                    <?php
                        } else {
                            header("location:password_lupa.php?alert=gagal");
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>


    </div>
</body>

</html>
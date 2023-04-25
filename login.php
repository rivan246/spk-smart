<?php
session_start();
include 'onek.php';

if (isset($_GET['id'])) {
    if ($_GET['id'] == 'false') {
        echo "<script>alert('username / password salah. Gagal masuk.')</script>";
        header("location:login.php");
    } else if ($_GET['id'] == 'out') {
        echo "<script>alert('Anda belum masuk, silahkan maasuk.')</script>";
        header("location:login.php");
    } else {
        echo "<script>alert('Logout berhasil.')</script>";
        header("location:login.php");
    }
}


?>
<!DOCTYPE html>
<html lang="en">

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
                <div class="card-body login-card-body" style="margin-top: 2rem;">
                    <p class="login-box-msg">Sign in to start your session</p>
                    <div class="alert-berhasil">
                        <?php
                        include 'onek.php';
                        if (isset($_GET['alert'])) {
                            if ($_GET['alert'] == 'berhasil') {
                                echo "<p>Pendaftaran Berhasil!</p>";
                            } elseif ($_GET['alert'] == 'berhasil_ganti') {
                                echo "<p>Password Berhasil Diubah!</p>";
                            }
                        }
                        ?>
                    </div>
                    <form role="form" action="" method="POST">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="username" type="text"
                                    autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password"
                                    value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <input type="submit" name="submit" class="btn btn-lg btn-primary btn-block" value="Masuk">
                            <div class="container">
                                <div class="row" style="margin-left: -21.5px; margin-right: -21.5px;">
                                    <div class="col-6">
                                        <a href="register.php" class="col-md-6">Belum punya akun? Daftar disini.</a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <a href="password_lupa.php" class="col-md-6">Lupa Password?</a>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $sqllogin = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                        $querylogin = mysqli_query($dbcon, $sqllogin);

                        if (mysqli_num_rows($querylogin) > 0) {
                            $_SESSION['username'] = $username;
                            $_SESSION['stat'] = 'masuk';
                            $role = mysqli_fetch_array($querylogin);
                            $_SESSION['role'] = $role['role'];
                            echo "<script>alert('berhasil masuk selamat datang $username')</script>";
                            echo ($_SESSION['stat']);
                            echo ($_SESSION['role']);
                            header("location:index.php");
                        } else {
                            echo "<script>alert('username/password salah')</script>";
                        }
                    }

                    ?>


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
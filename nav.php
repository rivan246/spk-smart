<?php
include 'cek.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SPK Metode SMART</title>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css" /> -->
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60" />
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item">
                    <a class="dropdown-toggle nav-link" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?= $_SESSION['username'] ?> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li> -->
                        <li><a href="logout.php" class="dropdown-item"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-5">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="assets/dist/img/logo.jpeg" alt="Logo Kecamatan Bangkalan"
                    class="brand-image img-circle elevation-3" style="opacity: 0.8" />
                <span class="brand-text" style="font-size: 0.7rem; font-weight:500;">Sistem Program Bantuan Langsung
                    Tunai</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?= $_SESSION['role'] ?></a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <?php
                        if ($_SESSION['role'] == 'admin') {

                        ?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="kriteria.php" class="nav-link">
                                <i class="nav-icon far fa-file"></i>
                                <p>Data Kriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="nilai.php" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>Isi Nilai Alternatif</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="spk.php" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Proses SPK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>Pengaturan Admin</p>
                            </a>
                        </li>
                        <?php
                        } else {

                        ?>
                        <li class="nav-item">
                            <a href="index.php" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="kriteria.php" class="nav-link">
                                <i class="nav-icon far fa-file"></i>
                                <p>Data Kriteria</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="spk.php" class="nav-link">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Proses SPK</p>
                            </a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
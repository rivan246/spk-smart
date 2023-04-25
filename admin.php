<?php
include 'onek.php';
require_once 'nav.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pengaturan Admin</h1>
            </div>

            <!-- Menampilkan Tabel Data -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="datatablesnilai" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Role</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- mengeluarkan data masyarakat dari database -->
                                    <?php
                                    $query = mysqli_query($dbcon, "SELECT * FROM admin");
                                    $n = 1;

                                    while ($admin = mysqli_fetch_array($query)) {

                                    ?>
                                    <tr>
                                        <td class="text-center"><?= $n ?></td>
                                        <td class="text-center"><?= $admin['nama'] ?></td>
                                        <td class="text-center"><?= $admin['username'] ?></td>
                                        <td class="text-center"><?= $admin['role'] ?> </td>
                                        <?php
                                            if ($admin['role'] == 'user') {
                                            ?>
                                        <td class="text-center">
                                            <a onclick="return confirm('Apakah yakin mengganti role ?')"
                                                class="btn btn-danger btn-sm btn-round"
                                                href="aksi/jadi_admin.php?name=<?= $admin['id_admin']; ?>"><i
                                                    class="fa fa-refresh"></i>&nbspJadi Admin</a>
                                        </td>
                                        <?php
                                            } else {
                                            ?>
                                        <td class="text-center">
                                            <a onclick="return confirm('Apakah yakin mengganti role ?')"
                                                class="btn btn-danger btn-sm btn-round"
                                                href="aksi/jadi_user.php?name=<?= $admin['id_admin']; ?>"><i
                                                    class="fa fa-refresh"></i>&nbspJadi User</a>
                                        </td>
                                        <?php
                                            }
                                            ?>
                                    </tr>
                                    <?php
                                        $n++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Tabel Data -->


            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
require_once 'foot.php';
?>
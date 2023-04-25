<?php
include 'onek.php';
require_once 'nav.php';
// if (isset($_GET['id']=='hapus' && $_GET['name'])) {
//  echo "dihapus.";
// }
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Alternatif</h1>
                <!-- Selanjutnya, <a href="nilai.php">masukkan isi nilai alternatif</a> -->
            </div>

            <div class="col-lg-8">
                <form role="form" action="" method="POST">
                    <div class="form-group">
                        <input type="text" required name="nik" class="form-control " placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <input type="text" required name="nama" class="form-control " placeholder="NAMA">
                    </div>
                    <div class="form-group">
                        <select name="kelamin" required class="form-control">
                            <option disabled selected>Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-primary form-control "
                            value="submit" placeholder="submit">
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {
                    $nik   = $_POST['nik'];
                    $nama   = $_POST['nama'];
                    $kelamin = $_POST['kelamin'];
                    // var_dump($nama,$nisn,$kelamin,$kelas,$sekolah);
                    // die;

                    //sql insert to masyarakat
                    $sql = "INSERT INTO masyarakat (nik,nama,kelamin)VALUES ('$nik','$nama','$kelamin')";
                    $query = mysqli_query($dbcon, $sql);
                    if ($query) {
                        echo "<script>alert('berhasil memasukkan data Alternatif')</script>";
                    } else {
                        echo "<script>alert('Gagal Memasukkan data')</script>";
                    }
                } else {
                }
                ?>
            </div>


            <!-- Menampilkan Tabel Data -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Alternatif
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama masyarakat</th>
                                        <th>Kelamin</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- mengeluarkan data masyarakat dari database -->
                                    <?php
                                    $sql = "SELECT * FROM masyarakat";
                                    $query = mysqli_query($dbcon, $sql);
                                    $n = 1;
                                    while ($masyarakat = mysqli_fetch_array($query)) {

                                    ?>
                                    <tr>
                                        <td><?= $n ?></td>
                                        <td><?= $masyarakat['nik'] ?></td>
                                        <td><?= $masyarakat['nama'] ?></td>
                                        <td><?= $masyarakat['kelamin'] ?></td>
                                        <td><a onclick="return confirm('Apakah yakin menghapus ?')"
                                                href='aksi/hapusa.php?name=<?= $masyarakat['nik']; ?>'>hapus</a></td>
                                        <!-- | <a href="">edit</a></td> -->
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
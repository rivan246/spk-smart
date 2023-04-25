<?php
include 'onek.php';
require_once 'nav.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data Nilai Masyarakat</h1>
                Kemudian, mari kita <a href="spk.php">melihat hasil spk</a>
            </div>

            <div class="col-lg-8">
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == 'berhasil') {
                        echo "<script>confirm('berhasil mengedit data nilai')</script>";
                    }
                }
                ?>
                <form role="form" method="POST" action="">
                    <div class="form-group">
                        <input required type="text" name="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k1" class="form-control"
                            placeholder="Keluarga miskin atau miskin ekstrim"> -->
                        <select name="k1" required class="form-control">
                            <option disabled selected>Keluarga Miskin atau Miskin Ekstrim</option>
                            <option value=2>Penghasilan < 1.000.000</option>
                            <option value=1>Penghasilan 1.000.000</option>
                            <option value=0>Penghasilan > 1.000.000</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k2" class="form-control"
                            placeholder="Memiliki penyakit kronis atau menahun"> -->
                        <select name="k2" required class="form-control">
                            <option disabled selected>Memiliki Penyakit Kronis Atau Menahun
                            </option>
                            <option value=2>Tidak mampu berobat</option>
                            <option value=1>Rentan waktu sakit yang lama</option>
                            <option value=0>Ada yang merawat atau tidak</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k3" class="form-control"
                            placeholder="Rumah tangga tunggal lanjut usia"> -->
                        <select name="k3" required class="form-control">
                            <option disabled selected>Rumah Tangga Tunggal Lanjut Usia</option>
                            <option value=2>Usia > 60 tahun</option>
                            <option value=1>Usia 60 tahun</option>
                            <option value=0>Usia < 60 tahun</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k4" class="form-control"
                            placeholder="Orang terdampak covid19 yang belum mendapatkan bantuan"> -->
                        <select name="k4" required class="form-control">
                            <option disabled selected>Orang Terdampak Covid19 Yang Belum Mendapatkan Bantuan
                            </option>
                            <option value=2>Tidak memiliki penghasilan</option>
                            <option value=1>Memiliki tanggungan keluarga</option>
                            <option value=0>Kebutuhan pengobatan dan kondisi kesehatan akibat covid19</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k5" class="form-control"
                            placeholder="Penerima bansos APBN atau APBD yang sudah dihentikan"> -->
                        <select name="k5" required class="form-control">
                            <option disabled selected>Penerima Bansos APBN Atau APBD Yang Sudah Dihentikan
                            </option>
                            <option value=2>Tidak ada yang membantu menopang hidup</option>
                            <option value=1>Kondisi kesehatan memburuk</option>
                            <option value=0>Tidak mampu menafkahi diri sendiri </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <!-- <input required type="text" name="k6" class="form-control"
                            placeholder="Kehilangan mata pencaharian atau PHK"> -->
                        <select name="k6" required class="form-control">
                            <option disabled selected>Kehilangan Mata Pencaharian Atau PHK
                            </option>
                            <option value=2>Memiliki tanggungan (anak/cucu/orangtua)</option>
                            <option value=1>Tidak tersedia lapangan kerja</option>
                            <option value=0>Masuk kategori lansia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class=" btn btn-primary form-control" value="submit"
                            placeholder="submit">
                    </div>
                </form>

                <?php
                if (isset($_POST['submit'])) {
                    date_default_timezone_set("Asia/Jakarta");
                    $nama   = $_POST['nama'];
                    $k1   = $_POST['k1'];
                    $k2 = $_POST['k2'];
                    $k3 = $_POST['k3'];
                    $k4 = $_POST['k4'];
                    $k5 = $_POST['k5'];
                    $k6 = $_POST['k6'];


                    $sql = "INSERT INTO penilaian (nama,k1,k2,k3,k4,k5,k6)VALUES ('$nama','$k1','$k2','$k3','$k4','$k5','$k6')";
                    $query = mysqli_query($dbcon, $sql);
                    if ($query) {
                        echo "<script>alert('berhasil memasukkan data penilaian')</script>";
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
                    <div class="d-flex justify-content-end">
                        <a onclick="return confirm('Apakah yakin menghapus semua data ?')"
                            class="btn btn-danger btn-sm btn-round" href="aksi/hapusall.php"><i class="fa fa-trash"
                                style="margin-right: 1rem;"></i>Hapus
                            Semua Data</a>
                    </div>
                    <div class="panel-heading">
                        Data Alternatif
                    </div>
                    <div class="col-md-8">
                        <form method="post" action="" class="form-inline">
                            <label for="tgl_mulai">Tahun : </label>
                            <select class="form-control mr-2" name="tgl_mulai" id="tgl_mulai" tabindex="-1">
                                <option>All</option>
                                <?php
                                $query = mysqli_query($dbcon, "SELECT DISTINCT(YEAR(created_at)) FROM penilaian");
                                while ($masyarakat = mysqli_fetch_array($query)) {
                                    if (isset($_POST['submit1'])) {
                                ?>
                                <option value="<?= $masyarakat['(YEAR(created_at))'] ?>"
                                    <?= $_POST['tgl_mulai'] == $masyarakat['(YEAR(created_at))'] ? "selected" : "" ?>>
                                    <?= $masyarakat['(YEAR(created_at))'] ?></option>
                                <?php
                                    } else {
                                    ?>
                                <option value="<?= $masyarakat['(YEAR(created_at))'] ?>">
                                    <?= $masyarakat['(YEAR(created_at))'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>

                            <button type="submit" name="submit1" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="datatablesnilai" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Tahun</th>
                                        <th class="text-center">K1</th>
                                        <th class="text-center">K2</th>
                                        <th class="text-center">K3</th>
                                        <th class="text-center">K4</th>
                                        <th class="text-center">K5</th>
                                        <th class="text-center">K6</th>
                                        <th class="text-center" colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- mengeluarkan data masyarakat dari database -->
                                    <?php
                                    if (isset($_POST['submit1'])) {
                                        // untuk disimpan didatabase
                                        $tgl_mulai = $_POST['tgl_mulai'];

                                        if (!empty($tgl_mulai)) {
                                            // perintah tampil data berdasarkan periode bulan
                                            $query = mysqli_query($dbcon, "SELECT * FROM penilaian WHERE YEAR(created_at) = '$tgl_mulai'");
                                        } else {
                                            // perintah tampil semua data
                                            $query = mysqli_query($dbcon, "SELECT * FROM penilaian ");
                                        }
                                    } else {
                                        // perintah tampil semua data
                                        $query = mysqli_query($dbcon, "SELECT * FROM penilaian");
                                    }
                                    $n = 1;



                                    while ($masyarakat = mysqli_fetch_array($query)) {

                                    ?>
                                    <tr>
                                        <td class="text-center">A<?= $n ?></td>
                                        <td class="text-center"><?= $masyarakat['nama'] ?></td>
                                        <td class="text-center"><?= date("Y", strtotime($masyarakat['created_at'])) ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k1'] == 2) {
                                                    echo "Penghasilan < 1.000.000";
                                                } elseif ($masyarakat['k1'] == 1) {
                                                    echo "Penghasilan 1.000.000";
                                                } else {
                                                    echo "Penghasilan > 1.000.000";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k2'] == 2) {
                                                    echo "Tidak mampu berobat";
                                                } elseif ($masyarakat['k2'] == 1) {
                                                    echo "Rentan waktu sakit yang lama";
                                                } else {
                                                    echo "Ada yang merawat atau tidak";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k3'] == 2) {
                                                    echo "Usia > 60 tahun";
                                                } elseif ($masyarakat['k3'] == 1) {
                                                    echo "Usia 60 tahun";
                                                } else {
                                                    echo "Usia < 60 tahun";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k4'] == 2) {
                                                    echo "Tidak memiliki penghasilan";
                                                } elseif ($masyarakat['k4'] == 1) {
                                                    echo "Memiliki tanggungan keluarga";
                                                } else {
                                                    echo "Kebutuhan pengobatan dan kondisi kesehatan akibat covid19";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k5'] == 2) {
                                                    echo "Tidak ada yang membantu menopang hidup";
                                                } elseif ($masyarakat['k5'] == 1) {
                                                    echo "Kondisi kesehatan memburuk";
                                                } else {
                                                    echo "Tidak mampu menafkahi diri sendiri ";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($masyarakat['k6'] == 2) {
                                                    echo "Memiliki tanggungan (anak/cucu/orangtua)";
                                                } elseif ($masyarakat['k6'] == 1) {
                                                    echo "Tidak tersedia lapangan kerja";
                                                } else {
                                                    echo "Masuk kategori lansia";
                                                }
                                                ?>
                                        </td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Anda ingin mengedit ?')"
                                                class="btn btn-primary btn-sm btn-round"
                                                href="nilai_update.php?name=<?= $masyarakat['id_penilaian']; ?>"><i
                                                    class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Apakah yakin menghapus ?')"
                                                class="btn btn-danger btn-sm btn-round"
                                                href="aksi/hapusna.php?name=<?= $masyarakat['id_penilaian']; ?>"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
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
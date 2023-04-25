<?php
include 'onek.php';
require_once 'nav.php';
?>

<div class="container ">
    <div class="row text-center">
        <div class="col-lg-12">
            <h1 class="page-header">Edit Data Nilai Masyarakat</h1>
        </div>

        <div class="col-lg-12 ">
            <form role="form " method="POST" action="aksi/editna.php">
                <?php
                if (isset($_GET['name'])) {
                    $id = $_GET['name'];
                }
                include 'onek.php';
                $cari_edit = mysqli_query($dbcon, "SELECT * FROM penilaian WHERE id_penilaian='$id'");
                $data = mysqli_fetch_array($cari_edit);
                ?>
                <input style="display: none;" type="text" name="id" value="<?= $data['id_penilaian'] ?>">
                <div class="form-group">
                    <input required type="text" name="nama" class="form-control" placeholder="Nama"
                        value="<?= $data['nama'] ?>">
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k1" class="form-control"
                            placeholder="Keluarga miskin atau miskin ekstrim"> -->
                    <select name="k1" required class="form-control">
                        <option disabled selected>Keluarga Miskin atau Miskin Ekstrim</option>
                        <option value=2 <?= $data['k1'] == 2 ? "selected" : "" ?>>Penghasilan < 1.000.000</option>
                        <option value=1 <?= $data['k1'] == 1 ? "selected" : "" ?>>Penghasilan 1.000.000</option>
                        <option value=0 <?= $data['k1'] == 0 ? "selected" : "" ?>>Penghasilan > 1.000.000</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k2" class="form-control"
                            placeholder="Memiliki penyakit kronis atau menahun"> -->
                    <select name="k2" required class="form-control">
                        <option disabled selected>Memiliki Penyakit Kronis Atau Menahun
                        </option>
                        <option value=2 <?= $data['k2'] == 2 ? "selected" : "" ?>>Tidak mampu berobat</option>
                        <option value=1 <?= $data['k2'] == 1 ? "selected" : "" ?>>Rentan waktu sakit yang lama</option>
                        <option value=0 <?= $data['k2'] == 0 ? "selected" : "" ?>>Ada yang merawat atau tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k3" class="form-control"
                            placeholder="Rumah tangga tunggal lanjut usia"> -->
                    <select name="k3" required class="form-control">
                        <option disabled selected>Rumah Tangga Tunggal Lanjut Usia</option>
                        <option value=2 <?= $data['k3'] == 2 ? "selected" : "" ?>>Usia > 60 tahun</option>
                        <option value=1 <?= $data['k3'] == 1 ? "selected" : "" ?>>Usia 60 tahun</option>
                        <option value=0 <?= $data['k3'] == 0 ? "selected" : "" ?>>Usia < 60 tahun</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k4" class="form-control"
                            placeholder="Orang terdampak covid19 yang belum mendapatkan bantuan"> -->
                    <select name="k4" required class="form-control">
                        <option disabled selected>Orang Terdampak Covid19 Yang Belum Mendapatkan Bantuan
                        </option>
                        <option value=2 <?= $data['k4'] == 2 ? "selected" : "" ?>>Tidak memiliki penghasilan</option>
                        <option value=1 <?= $data['k4'] == 1 ? "selected" : "" ?>>Memiliki tanggungan keluarga</option>
                        <option value=0 <?= $data['k4'] == 0 ? "selected" : "" ?>>Kebutuhan pengobatan dan kondisi
                            kesehatan akibat covid19</option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k5" class="form-control"
                            placeholder="Penerima bansos APBN atau APBD yang sudah dihentikan"> -->
                    <select name="k5" required class="form-control">
                        <option disabled selected>Penerima Bansos APBN Atau APBD Yang Sudah Dihentikan
                        </option>
                        <option value=2 <?= $data['k5'] == 2 ? "selected" : "" ?>>Tidak ada yang membantu menopang hidup
                        </option>
                        <option value=1 <?= $data['k5'] == 1 ? "selected" : "" ?>>Kondisi kesehatan memburuk</option>
                        <option value=0 <?= $data['k5'] == 0 ? "selected" : "" ?>>Tidak mampu menafkahi diri sendiri
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <!-- <input required type="text" name="k6" class="form-control"
                            placeholder="Kehilangan mata pencaharian atau PHK"> -->
                    <select name="k6" required class="form-control">
                        <option disabled selected>Kehilangan Mata Pencaharian Atau PHK
                        </option>
                        <option value=2 <?= $data['k6'] == 2 ? "selected" : "" ?>>Memiliki tanggungan
                            (anak/cucu/orangtua)</option>
                        <option value=1 <?= $data['k6'] == 1 ? "selected" : "" ?>>Tidak tersedia lapangan kerja</option>
                        <option value=0 <?= $data['k6'] == 0 ? "selected" : "" ?>>Masuk kategori lansia</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" class=" btn btn-primary form-control" value="submit"
                        placeholder="submit">
                </div>
            </form>
        </div>
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
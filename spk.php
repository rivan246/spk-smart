<?php
include 'onek.php';
require_once 'nav.php';
?>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><b>DATA HASIL PERANGKINGAN </b></h1>
                <!-- <a href="index.php">kembali</a> -->
                <div class="col-md-8">
                    <form method="post" action="" class="form-inline">
                        <label for="tgl_mulai">Tahun : </label>
                        <select class="form-control mr-2" name="tgl_mulai" id="tgl_mulai" tabindex="-1"
                            style="width:10%">
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
            </div>

            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- <div class="panel-heading">
                        Hasil Proses Perhitungan SPK Menggunakan Metode SMART
                    </div> -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="datatables" class="table display cell-border table-bordered table-striped">
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
                                        <th class="text-center">Nilai Akhir</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $n = 1;
                                    $sqljumlah = "SELECT SUM(bobot) FROM kriteria";
                                    $queryjumlah = mysqli_query($dbcon, $sqljumlah);
                                    $jumlah0 = mysqli_fetch_array($queryjumlah);
                                    $jumlah = $jumlah0[0];

                                    // bobot
                                    $sqlkriteria = "SELECT bobot FROM kriteria";
                                    $querykriteria = mysqli_query($dbcon, $sqlkriteria);
                                    $bobot = [];
                                    while ($bariskriteria = mysqli_fetch_array($querykriteria)) {
                                        $bobot[] = $bariskriteria['bobot'];
                                    }
                                    // var_dump($bobot);
                                    // die();
                                    //end bobot

                                    //nilai 

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

                                    while ($barisnilai = mysqli_fetch_array($query)) {
                                        //nilai
                                        $k1 = ($barisnilai['k1'] / 2) * ($bobot[0] / $jumlah);
                                        $k2 = ($barisnilai['k2'] / 2) * ($bobot[1] / $jumlah);
                                        $k3 = ($barisnilai['k3'] / 2) * ($bobot[2] / $jumlah);
                                        $k4 = ($barisnilai['k4'] / 2) * ($bobot[3] / $jumlah);
                                        $k5 = ($barisnilai['k5'] / 2) * ($bobot[4] / $jumlah);
                                        $k6 = ($barisnilai['k6'] / 2) * ($bobot[5] / $jumlah);
                                        $nilaiAkhir = ($k1 + $k2 + $k3 + $k4 + $k5 + $k6);
                                        $ranking = array($nilaiAkhir);
                                        krsort($ranking);
                                    ?>
                                    <!-- <tr>
                                        <td>A</?= $n ?></td>
                                        <td></?= $barisnilai['nama'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k1'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k2'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k3'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k4'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k5'] ?></td>
                                        <td class="text-right"></?= $barisnilai['k6'] ?></td>
                                        <td class="text-right"></?= round($nilaiAkhir, 3) ?></td>
                                    </tr> -->
                                    <tr>
                                        <td class="text-center">A<?= $n ?></td>
                                        <td class="text-center"><?= $barisnilai['nama'] ?></td>
                                        <td class="text-center"><?= date("Y", strtotime($barisnilai['created_at'])) ?>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k1'] == 2) {
                                                    echo "Penghasilan < 1.000.000";
                                                } elseif ($barisnilai['k1'] == 1) {
                                                    echo "Penghasilan 1.000.000";
                                                } else {
                                                    echo "Penghasilan > 1.000.000";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k2'] == 2) {
                                                    echo "Tidak mampu berobat";
                                                } elseif ($barisnilai['k2'] == 1) {
                                                    echo "Rentan waktu sakit yang lama";
                                                } else {
                                                    echo "Ada yang merawat atau tidak";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k3'] == 2) {
                                                    echo "Usia > 60 tahun";
                                                } elseif ($barisnilai['k3'] == 1) {
                                                    echo "Usia 60 tahun";
                                                } else {
                                                    echo "Usia < 60 tahun";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k4'] == 2) {
                                                    echo "Tidak memiliki penghasilan";
                                                } elseif ($barisnilai['k4'] == 1) {
                                                    echo "Memiliki tanggungan keluarga";
                                                } else {
                                                    echo "Kebutuhan pengobatan dan kondisi kesehatan akibat covid19";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k5'] == 2) {
                                                    echo "Tidak ada yang membantu menopang hidup";
                                                } elseif ($barisnilai['k5'] == 1) {
                                                    echo "Kondisi kesehatan memburuk";
                                                } else {
                                                    echo "Tidak mampu menafkahi diri sendiri ";
                                                }
                                                ?> </td>
                                        <td class="text-center">
                                            <?php if ($barisnilai['k6'] == 2) {
                                                    echo "Memiliki tanggungan (anak/cucu/orangtua)";
                                                } elseif ($barisnilai['k6'] == 1) {
                                                    echo "Tidak tersedia lapangan kerja";
                                                } else {
                                                    echo "Masuk kategori lansia";
                                                }
                                                ?> </td>
                                        <td class="text-right"><?= round($nilaiAkhir, 3) ?></td>
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
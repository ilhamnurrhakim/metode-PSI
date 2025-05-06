<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body style="background-color: #fff; font-family: 'Times New Roman', Times, serif !important;">
    <!-- Contoller -->
    <?php include 'app/controller/report/cetak_laporan.php' ?>
    <!-- \Controller -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="text-uppercase text-center fw-bolder" style="font-family: 'Times New Roman', Times, serif;">
                    Laporan Penerima Beasiswa Pada Siswa <br>
                    <?= $dataProject['project'] ?> <br>
                    Periode <?= $periode ?>
                </h2>
            </div>
            <div class="col-12 mb-4">
                <div>
                    <table class="table table-bordered text-center align-middle">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Penilaian</th>
                                <th>Nisn Siswa</th>
                                <th>Nama Siswa</th>
                                <th>Total Nilai</th>
                                <th>Keputusan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($dataHasil as $row) : $no++ ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td><?= $row['kode'] ?></td>
                                    <td><?= $row['nisn'] ?></td>
                                    <td><?= $row['nama'] ?></td>
                                    <td><?= $row['total'] ?></td>
                                    <td><?= $spk->Keputusan($no, $keputusan) ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <div class="d-block">
                        <p>Padang Panjang, <?= $fungsi->TanggalIndo(date('Y-m-d')) ?></p>
                        <p style="margin-top: -15px;">Kepala Sekolah</p>
                        <br>
                        <br>
                        <br>
                        <p class="fw-bolder" style="font-family: 'Times New Roman', Times, serif;"><?= $dataKepala['nama_pengguna'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <script>
        window.print()
    </script>
    <!-- \Script -->
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/spk_kriteria.php' ?>
    <!-- \Controller -->

    <div class="page-wrapper">
        <!-- Navbar -->
        <?php include 'app/view/layout/navbar.php' ?>
        <!-- \Navbar -->

        <div class="main-container">
            <!-- Sidebar -->
            <?php include 'app/view/layout/sidebar.php' ?>
            <!-- \Sidebar -->

            <!-- Content -->
            <div class="app-container">
                <!-- Panel -->
                <div class="app-hero-header mb-4">
                    <div class="d-flex align-items-center mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <i class="bi bi-house lh-1"></i>
                                <a href="index.html" class="text-decoration-none"><?= $dataPage['panel'] ?></a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page"><?= $dataPage['page'] ?></li>
                        </ol>
                    </div>
                    <h3 class="fw-bolder text-white my-3"><?= $dataPage['page'] ?></h3>
                </div>
                <!-- Panel -->

                <!-- Body -->
                <div class="app-body">
                    <!-- Row start -->
                    <div class="row gx-3">
                        <div class="col-xl-12 col-sm-12 col-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahModal">
                                        Tambah Data
                                    </button>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Kriteria</th>
                                                    <th>Nama Kriteria</th>
                                                    <th>Jenis Kriteria</th>
                                                    <th>Tipe Kriteria</th>
                                                    <th>Sub Kriteria</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($queryKriteria as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['kode_kriteria'] ?></td>
                                                        <td><?= $row['nama_kriteria'] ?></td>
                                                        <td><?= $row['jenis_kriteria'] ?></td>
                                                        <td><?= $row['tipe_kriteria'] ?></td>
                                                        <td>
                                                            <?php if ($row['tipe_kriteria'] == "Pilihan") : ?>
                                                                <?php $queryCekSub = $crud->read("sub_kriteria", "WHERE kode_kriteria = '$row[kode_kriteria]'") ?>
                                                                <a href="?p=Sub&Kode=<?= $row['kode_kriteria'] ?>" class="btn btn-primary">(<?= mysqli_num_rows($queryCekSub) ?>) Sub Kriteria</a>
                                                            <?php else : ?>
                                                                <button type="button" disabled class="btn btn-primary">Sub Kriteria</button>
                                                            <?php endif ?>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $no ?>">
                                                                Edit
                                                            </button>
                                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal<?= $no ?>">
                                                                Hapus
                                                            </button>
                                                        </td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>
                <!-- \Body -->

                <!-- Form Tambah Data -->
                <div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Kode Kriteria</label>
                                            <select name="kode_kriteria" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                    <?php $kode = "C" . $i; ?>
                                                    <?php $queryCekKriteria = $crud->read("kriteria", "WHERE kode_kriteria = '$kode'") ?>
                                                    <?php if (mysqli_num_rows($queryCekKriteria) > 0) : ?>
                                                        <option value="" disabled><?= $kode ?> (Sudah Digunakan)</option>
                                                    <?php else : ?>
                                                        <option value="<?= $kode ?>"><?= $kode ?> (Belum Digunakan)</option>
                                                    <?php endif ?>
                                                <?php endfor ?>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Nama Kriteria</label>
                                            <input type="text" class="form-control" name="nama_kriteria" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Jenis Kriteria</label>
                                            <select name="jenis_kriteria" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                <option value="Benefit">Benefit</option>
                                                <option value="Cost">Cost</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Tipe Kriteria</label>
                                            <select name="tipe_kriteria" class="form-control" required>
                                                <option value="" disabled selected>Pilih</option>
                                                <option value="Inputan">Inputan</option>
                                                <option value="Pilihan">Pilihan</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- \Form Tambah Data -->

                <?php $no = 1 ?>
                <?php foreach ($queryKriteria as $data) : $no++ ?>
                    <!-- Form Edit Data -->
                    <div class="modal fade" id="editModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Kode Kriteria</label>
                                                <input type="text" class="form-control" name="kode_kriteria" value="<?= $data['kode_kriteria'] ?>" readonly>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Nama Kriteria</label>
                                                <input type="text" class="form-control" name="nama_kriteria" value="<?= $data['nama_kriteria'] ?>" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Jenis Kriteria</label>
                                                <select name="jenis_kriteria" class="form-control" required>
                                                    <option value="" disabled selected>Pilih</option>
                                                    <option value="Benefit" <?= $data['jenis_kriteria'] == "Benefit" ? 'selected' : '' ?>>Benefit</option>
                                                    <option value="Cost" <?= $data['jenis_kriteria'] == "Cost" ? 'selected' : '' ?>>Cost</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Tipe Kriteria</label>
                                                <select name="tipe_kriteria" class="form-control" required>
                                                    <option value="" disabled selected>Pilih</option>
                                                    <option value="Inputan" <?= $data['tipe_kriteria'] == "Inputan" ? 'selected' : '' ?>>Inputan</option>
                                                    <option value="Pilihan" <?= $data['tipe_kriteria'] == "Pilihan" ? 'selected' : '' ?>>Pilihan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="edit" class="btn btn-warning">Edit Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- \Form Edit Data -->

                    <!-- Form Hapus Data -->
                    <div class="modal fade" id="hapusModal<?= $no ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <form method="post" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="kode_kriteria" value="<?= $data['kode_kriteria'] ?>">
                                        <p>Yakin ingin hapus data dengan nama <b><?= $data['nama_kriteria'] ?></b> ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="hapus" class="btn btn-danger">Hapus Data</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- \Form Hapus Data -->
                <?php endforeach ?>

                <!-- Footer -->
                <?php include 'app/view/layout/sidebar.php' ?>
                <!-- Footer -->

            </div>
            <!-- \Content -->
        </div>
    </div>

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <!-- \Script -->
</body>

</html>
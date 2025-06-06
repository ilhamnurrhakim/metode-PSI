<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/spk_sub.php' ?>
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
                    <h3 class="fw-bolder text-white my-3"><?= $dataPage['page'] ?> <?= $dataKriteria['nama_kriteria'] ?> (<?= $kode ?>)</h3>
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
                                    <a href="?p=Kriteria" class="btn btn-secondary">Kembali</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center align-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Sub Kriteria</th>
                                                    <th>Nilai Sub Kriteria</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($querySub as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['nama_sub'] ?></td>
                                                        <td><?= $row['nilai_sub'] ?></td>
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
                                            <label class="form-label">Nama Sub Kriteria</label>
                                            <input type="text" class="form-control" name="nama_sub" required>
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Nilai Sub Kriteria</label>
                                            <input type="number" class="form-control" name="nilai_sub" required>
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
                <?php foreach ($querySub as $data) : $no++ ?>
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
                                        <input type="hidden" name="id_sub" value="<?= $data['id_sub'] ?>">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Nama Sub Kriteria</label>
                                                <input type="text" class="form-control" name="nama_sub" value="<?= $data['nama_sub'] ?>" required>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Nilai Sub Kriteria</label>
                                                <input type="number" class="form-control" name="nilai_sub" value="<?= $data['nilai_sub'] ?>" required>
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Hapus Data</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="id_sub" value="<?= $data['id_sub'] ?>">
                                        <p>Yakin ingin hapus data dengan nama <b><?= $data['nama_sub'] ?></b> ?</p>
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
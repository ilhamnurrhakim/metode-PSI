<?php

$no = 1;
$querySiswa = $crud->read(
    "siswa",
    "ORDER BY nisn ASC"
);

if (isset($_POST['tambah'])) {
    # code...
    $cekDataSiswa = $crud->read(
        "siswa",
        "WHERE nisn = '$_POST[nisn]'"
    );

    if (mysqli_num_rows($cekDataSiswa) > 0) {
        # code...
        echo $fungsi->NotifRedirect(
            "Gagal Tambah Data Siswa",
            "Mohon maaf, NISN yang anda masukan sudah ada",
            "error",
            "?p=" . $page
        );
    } else {
        # code...
        $crud->create(
            "siswa",
            "nisn, jk_siswa, nama_siswa",
            "'$_POST[nisn]', '$_POST[jk_siswa]', '$_POST[nama_siswa]'"
        );

        echo $fungsi->Redirect("?p=" . $page);
    }
}

if (isset($_POST['edit'])) {
    # code...
    $crud->update(
        "siswa",
        "nama_siswa='$_POST[nama_siswa]', jk_siswa='$_POST[jk_siswa]'",
        "nisn = '$_POST[nisn]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['hapus'])) {
    # code...
    $crud->delete(
        "siswa",
        "nisn",
        $_POST['nisn']
    );

    $crud->delete(
        "nilai",
        "nisn",
        $_POST['nisn']
    );

    echo $fungsi->Redirect("?p=" . $page);
}

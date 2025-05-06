<?php

$no = 1;
$queryKeputusan = $crud->read(
    "keputusan",
    "ORDER BY max DESC"
);

if (isset($_POST['tambah'])) {
    # code...
    $cekDataKeputusan = $crud->read(
        "keputusan",
        "WHERE jurusan = '$_POST[jurusan]'"
    );

    if (mysqli_num_rows($cekDataKeputusan) > 0) {
        # code...
        echo $fungsi->NotifRedirect(
            "Gagal Tambah Data",
            "Jurusan Sudah Dinilai",
            "error",
            "?p=" . $page
        );
    } else {
        # code...
        $crud->create(
            "keputusan",
            "jurusan, min, max",
            "'$_POST[jurusan]', '$_POST[min]', '$_POST[max]'"
        );

        echo $fungsi->Redirect("?p=" . $page);
    }
}

if (isset($_POST['edit'])) {
    # code...
    $crud->update(
        "keputusan",
        "jurusan='$_POST[jurusan]', min='$_POST[min]', max='$_POST[max]'",
        "id_keputusan = '$_POST[id_keputusan]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['hapus'])) {
    # code...
    $crud->delete(
        "keputusan",
        "id_keputusan",
        $_POST['id_keputusan']
    );

    echo $fungsi->Redirect("?p=" . $page);
}

<?php

$no = 1;

$queryNilai = $crud->read(
    "nilai",
    "INNER JOIN siswa ON nilai.nisn = siswa.nisn
     ORDER BY nilai.nisn ASC"
);

$querySiswa = $crud->read(
    "siswa",
    "ORDER BY nisn ASC"
);

$queryKriteria = $crud->read(
    "kriteria",
    "ORDER BY kode_kriteria ASC"
);

if (isset($_POST['tambah'])) {
    # code...
    $cekPenilaian = $crud->read(
        "nilai",
        "WHERE nisn = '$_POST[nisn]' AND periode = '$_POST[periode]'"
    );

    if (mysqli_num_rows($cekPenilaian) > 0) {
        # code...
        echo $fungsi->NotifRedirect(
            "Informasi",
            "Siswa dengan $_POST[nisn] pada periode $_POST[periode] sudah dinilai",
            "info",
            "?p=" . $page
        );
    } else {
        # code...
        $kode = $_POST['periode'] . "-" . date('his');
        $crud->create(
            "nilai",
            "kode_nilai, nisn, periode, C1, C2, C3, C4, C5",
            "'$kode', '$_POST[nisn]', '$_POST[periode]', '$_POST[C1]', '$_POST[C2]', 
             '$_POST[C3]', '$_POST[C4]', '$_POST[C5]'"
        );

        echo $fungsi->Redirect("?p=" . $page);
    }
}

if (isset($_POST['edit'])) {
    # code...
    $crud->update(
        "nilai",
        "C1='$_POST[C1]', C2='$_POST[C2]', C3='$_POST[C3]', C4='$_POST[C4]', C5='$_POST[C5]'",
        "kode_nilai = '$_POST[kode_nilai]'"
    );

    echo $fungsi->Redirect("?p=" . $page);
}

if (isset($_POST['hapus'])) {
    # code...
    $crud->delete(
        "nilai",
        "kode_nilai",
        $_POST['kode_nilai']
    );

    echo $fungsi->Redirect("?p=" . $page);
}

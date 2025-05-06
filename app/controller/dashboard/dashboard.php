<?php

$queryPengguna = $crud->read(
    "pengguna",
    "ORDER BY jabatan ASC"
);

$querySiswa = $crud->read(
    "siswa",
    "ORDER BY nisn ASC"
);

$queryPenilaian = $crud->read(
    "nilai",
    "ORDER BY nisn ASC"
);

$queryKriteria = $crud->read(
    "kriteria",
    "ORDER BY kode_kriteria ASC"
);

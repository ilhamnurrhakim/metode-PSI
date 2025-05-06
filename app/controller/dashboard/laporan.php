<?php

if (isset($_POST['cek'])) {
    # code...
    $no = 0;
    $periode = $_POST['periode'];
    $keputusan = $_POST['keputusan'];
    $dataKepala = mysqli_fetch_array($crud->read("pengguna", "WHERE jabatan = 'Kepala Sekolah'"));

    $queryNilai = $crud->read(
        "nilai",
        "INNER JOIN siswa ON nilai.nisn = siswa.nisn
         WHERE nilai.periode = '$periode'
         ORDER BY nilai.kode_nilai ASC"
    );

    $querySiswa = $crud->read(
        "siswa",
        "ORDER BY nisn ASC"
    );

    $queryKriteria = $crud->read(
        "kriteria",
        "ORDER BY kode_kriteria ASC"
    );

    if (mysqli_num_rows($queryNilai) > 0) {
        # code...
        foreach ($queryKriteria as $row) {
            $bobot[] = $spk->PembobotanKriteria($row);
        }

        foreach ($queryNilai as $row) {
            # code...
            $kode = $row['kode_nilai'];
            $nisn = $row['nisn'];
            $nama = $row['nama_siswa'];
            $jk = $row['jk_siswa'];
            $total_nilai = round($spk->PreferensiVektor($row, $bobot), 5);

            $dataHasil[] = [
                "kode" => $kode,
                "nisn" => $nisn,
                "nama" => $nama,
                "jk" => $jk,
                "total" => $total_nilai
            ];
        }

        usort($dataHasil, fn ($a, $b) => $b['total'] <=> $a['total']);
    }
}

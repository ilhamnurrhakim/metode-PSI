<?php

class SPK extends CRUD
{
    public function Normalisasi($value, $kriteria)
    {
        $queryNilai = $this->read("nilai", "ORDER BY kode_nilai ASC");

        foreach ($queryNilai as $data) {
            # code...
            $nilai[] = $data[$kriteria['kode_kriteria']];
        }

        if ($kriteria['jenis_kriteria'] == "Benefit") {
            # code...
            return $value / max($nilai);
        } elseif ($kriteria['jenis_kriteria'] == "Cost") {
            # code...
            return min($nilai) / $value;
        } else {
            # code...
            return 0;
        }
    }

    public function SumNormalisasi($kriteria)
    {
        $queryNilai = $this->read("nilai", "ORDER BY kode_nilai ASC");

        foreach ($queryNilai as $data) {
            # code...
            $nilai[] = $this->Normalisasi($data[$kriteria['kode_kriteria']], $kriteria);
        }

        return array_sum($nilai);
    }

    public function Mean($kriteria)
    {
        $ketetapan = 1;
        $jumlahKriteria = 5;

        return ($ketetapan / $jumlahKriteria) * $this->SumNormalisasi($kriteria);
    }

    public function VariasiPreferensi($value, $kritera)
    {
        $variasi = pow($this->Normalisasi($value, $kritera) - $this->Mean($kritera), 2);

        return $variasi;
    }

    public function SumVariasi($kritera)
    {
        $queryNilai = $this->read("nilai", "ORDER BY kode_nilai ASC");

        foreach ($queryNilai as $data) {
            # code...
            $nilai[] = $this->VariasiPreferensi($data[$kritera['kode_kriteria']], $kritera);
        }

        $result = array_sum($nilai);

        return $result;
    }

    public function Deviasi($kriteria)
    {
        return 1 - $this->SumVariasi($kriteria);
    }

    public function PembobotanKriteria($kriteria)
    {
        $queryKriteria = $this->read("kriteria", "ORDER BY kode_kriteria ASC");
        $deviasi = $this->Deviasi($kriteria);

        foreach ($queryKriteria as $data) {
            # code...
            $nilai[] = $this->Deviasi($data);
        }

        $result = $deviasi / array_sum($nilai);

        return $result;
    }

    public function PreferensiVektor($data, $bobot)
    {
        $no = 0;
        $queryKriteria = $this->read("kriteria", "ORDER BY kode_kriteria ASC");

        foreach ($queryKriteria as $row) {
            # code...
            $result[] = ($this->Normalisasi($data[$row['kode_kriteria']], $row) * $bobot[$no++]);
        }

        return array_sum($result);
    }

    public function Keputusan($ranking, $keputusan)
    {
        if ($ranking <= $keputusan) {
            # code...
            $keterangan = "Menerima";
        } else {
            # code...
            $keterangan = "Tidak Menerima";
        }

        return $keterangan;
    }
}

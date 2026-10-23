<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = $_POST["nama"];
    $jabatan = $_POST["jabatan"];
    $masa_kerja = $_POST["masa_kerja"];
    $jam_lembur = $_POST["jam_lembur"];
    $jumlah_hari_terlambat = $_POST["jumlah_hari_terlambat"];
    $nilai_kerja = $_POST["nilai_kerja"];

    $gaji_pokok = 0;

    switch ($jabatan) {
        case "staff":
            $gaji_pokok = 3000000;
            break;
        case "supervisor":
            $gaji_pokok = 5000000;
            break;
        case "manager":
            $gaji_pokok = 8000000;
            break;
    }

    if ($masa_kerja < 5) {
        $tunjangan = 500000;
    } elseif ($masa_kerja < 10) {
        $tunjangan = 1000000;
    } else {
        $tunjangan = 1500000;
    }

    if ($jam_lembur > 0) {
        $uang_lembur = $jam_lembur * 50000;
    } else {
        $uang_lembur = 0;
    }

    if ($jumlah_hari_terlambat > 3) {
        $potongan = ($jumlah_hari_terlambat - 3) * 100000;
    } else {
        $potongan = 0;
    }

    if ($nilai_kerja < 80) {
        $bonus = 0;
    } elseif ($nilai_kerja < 90) {
        $bonus = 500000;
    } else {
        $bonus = 1000000;
    }

    $gaji_bersih = $gaji_pokok + $tunjangan + $uang_lembur + $bonus - $potongan;
} else {
    header("Location: ../index.html");
    exit();
}
?>

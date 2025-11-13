<?php
session_start();
$nim = $_POST["nim"];
$nama_lengkap = $_POST["nama_lengkap"];
$tempat_lahir = $_POST["tempat_lahir"];
$tanggal_lahir = $_POST["tanggal_lahir"];
$hobi = $_POST["hobi"];
$pasangan = $_POST["pasangan"];
$pekerjaan = $_POST["pekerjaan"];
$nama_orang_tua = $_POST["nama_orang_tua"];
$nama_kakak = $_POST["nama_kakak"];
$nama_adik = $_POST["nama_adik"];
$_SESSION["mahasiswa"] = [
    "nim" => $nim,
    "nama_lengkap" => $nama_lengkap,
    "tempat_lahir" => $tempat_lahir,
    "tanggal_lahir" => $tanggal_lahir,
    "hobi" => $hobi,
    "pasangan" => $pasangan,
    "pekerjaan" => $pekerjaan,
    "nama_orang_tua" => $nama_orang_tua,
    "nama_kakak" => $nama_kakak,
    "nama_adik" => $nama_adik
];
header("location: index.php#about");
?>

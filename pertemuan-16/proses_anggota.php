<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php');
}


$nama_anggota  = bersihkan($_POST["txtNoAng"] ?? ""); 
$tgl_lahir     = bersihkan($_POST["txtNmAng"] ?? "");
$jabatan       = bersihkan($_POST["txtJabAng"] ?? "");
$tgl_jadi      = bersihkan($_POST["txtTglJadi"] ?? "");
$kemampuan     = bersihkan($_POST["txtSkill"] ?? "");
$gaji          = bersihkan($_POST["txtGaji"] ?? "");
$nowa          = bersihkan($_POST["txtNoWA"] ?? "");
$batalion      = bersihkan($_POST["txBatalion"] ?? "");
$bb            = bersihkan($_POST["txtBB"] ?? "");
$tb            = bersihkan($_POST["txtTB"] ?? "");


$_SESSION["anggota"] = [
    "noang" => $nama_anggota, "nama" => $tgl_lahir, "jabatan" => $jabatan,
    "tanggal" => $tgl_jadi, "skill" => $kemampuan, "gaji" => $gaji,
    "nowa" => $nowa, "batalion" => $batalion, "bb" => $bb, "tb" => $tb
];

// 3. 
$sql = "INSERT INTO ANGGOTA (
            nama_anggota, tanggal_lahir, jabatan_anggota, 
            tanggal_jadi_anggota, kemampuan_anggota, gaji_anggota, 
            nomor_wa, batalion_anggota, berat_badan, tinggi_badan
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "ssssssssss", 
        $nama_anggota, $tgl_lahir, $jabatan, $tgl_jadi, 
        $kemampuan, $gaji, $nowa, $batalion, $bb, $tb
    );

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['flash_sukses'] = "Data $nama_anggota berhasil disimpan!";
    } else {
        $_SESSION['flash_error'] = "Gagal simpan: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['flash_error'] = "Kesalahan Query: " . mysqli_error($conn);
}

mysqli_close($conn);
header("Location: index.php#anggota");
exit(); 
?>
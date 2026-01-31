<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('read.php');
}

$nama_key = $_POST['txtNim'] ?? ''; 
$tgl_l    = bersihkan($_POST['txtTglLhrEd'] ?? '');
$jabatan  = bersihkan($_POST['txtNamaEd'] ?? ''); 
$captcha  = $_POST['txtCaptcha'] ?? '';

if ($captcha !== "5") {
    $_SESSION['flash_error'] = 'Jawaban captcha salah.';
    redirect_ke('edit.php?nama=' . urlencode($nama_key));
}

$sql = "UPDATE ANGGOTA SET tanggal_lahir = ?, jabatan_anggota = ? WHERE nama_anggota = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sss", $tgl_l, $jabatan, $nama_key);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil diperbaharui.';
    redirect_ke('read.php');
} else {
    $_SESSION['flash_error'] = 'Gagal memperbaharui data.';
    redirect_ke('edit.php?nama=' . urlencode($nama_key));
}
mysqli_stmt_close($stmt);
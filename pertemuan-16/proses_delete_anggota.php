<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$nama = $_GET['nama'] ?? '';

if (empty($nama)) {
    $_SESSION['flash_error'] = 'Nama tidak valid.';
    redirect_ke('read.php');
}

$stmt = mysqli_prepare($conn, "DELETE FROM ANGGOTA WHERE nama_anggota = ?");
mysqli_stmt_bind_param($stmt, "s", $nama);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data anggota berhasil dihapus.';
} else {
    $_SESSION['flash_error'] = 'Gagal menghapus data.';
}

mysqli_stmt_close($stmt);
redirect_ke('read.php');
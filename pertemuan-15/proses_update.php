<?php
session_start();
require_once 'koneksi.php';
require_once 'fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') redirect_ke('index.php');

$cid = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$nama = bersihkan($_POST['txtNmLengkap'] ?? '');

if (!$cid || $nama === '') {
    $_SESSION['flash_error'] = 'Data tidak valid.';
    redirect_ke('index.php');
}

$stmt = mysqli_prepare($conn, "UPDATE `biodata mahasiswa` SET nama_lengkap = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "si", $nama, $cid);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil diperbaharui.';
} else {
    $_SESSION['flash_error'] = 'Gagal memperbarui data.';
}
mysqli_stmt_close($stmt);
redirect_ke('index.php');
<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

if (!isset($_GET['cid']) || !is_numeric($_GET['cid'])) {
    $_SESSION['flash_error'] = "ID tidak valid.";
    header("Location: index.php");
    exit;
}

$cid = (int)$_GET['cid'];

$stmt = mysqli_prepare($conn, "DELETE FROM tbl_tamu WHERE cid = ?");
if (!$stmt) {
    $_SESSION['flash_error'] = "Gagal mempersiapkan query: " . mysqli_error($conn);
    mysqli_close($conn);
    header("Location: index.php");
    exit;
}

mysqli_stmt_bind_param($stmt, "i", $cid);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    $_SESSION['flash_sukses'] = "Data berhasil dihapus.";
} else {
    $_SESSION['flash_error'] = "Gagal menghapus data: " . mysqli_stmt_error($stmt);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
header("Location: index.php");
exit;
?>
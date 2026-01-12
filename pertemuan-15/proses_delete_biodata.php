<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$id_hapus = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id_hapus) {
    $_SESSION['flash_error'] = "Gagal menghapus: ID tidak terbaca.";
    redirect_ke('index.php');
}
$sql  = "DELETE FROM biodata_mahasiswa WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $id_hapus);
    
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) {
            $_SESSION['flash_sukses'] = "Data Berhasil Dihapus!";
        } else {
            $_SESSION['flash_error'] = "Data tidak ditemukan di database (ID sudah tidak ada).";
        }
    } else {
        $_SESSION['flash_error'] = "Gagal eksekusi hapus: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
} else {
    $_SESSION['flash_error'] = "Gagal menyiapkan perintah (Prepare Error): " . mysqli_error($conn);
}

redirect_ke('index.php');
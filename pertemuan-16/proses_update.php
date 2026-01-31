<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect_ke('index.php');
}


$cid = filter_input(INPUT_POST, 'cid', FILTER_VALIDATE_INT);
if (!$cid) {
    $_SESSION['flash_error'] = 'ID tidak valid.';
    redirect_ke('index.php');
}


$nama    = bersihkan($_POST['txtNama'] ?? '');
$email   = bersihkan($_POST['txtEmail'] ?? '');
$pesan   = bersihkan($_POST['txtPesan'] ?? '');
$captcha = bersihkan($_POST['txtCaptcha'] ?? '');

$errors = [];
if (strlen($nama) < 3) $errors[] = 'Nama minimal 3 karakter.';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Format email salah.';
if (strlen($pesan) < 10) $errors[] = 'Pesan minimal 10 karakter.';


if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid=' . $cid);
}


$sql  = "UPDATE tbl_tamu SET cnama = ?, cemail = ?, cpesan = ? WHERE cid = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sssi", $nama, $email, $pesan, $cid);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['flash_sukses'] = 'Data berhasil diperbaharui!';
        
        header("Location: index.php#anggota"); 
    } else {
        $_SESSION['flash_error'] = 'Gagal update database.';
        redirect_ke('edit.php?cid=' . $cid);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
exit();
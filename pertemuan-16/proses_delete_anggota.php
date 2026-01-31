<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  $nama = $_GET['nama'] ?? '';

  $stmt = mysqli_prepare($conn, "DELETE FROM ANGGOTA WHERE nama_anggota = ?");
  mysqli_stmt_bind_param($stmt, "s", $nama);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data anggota sudah dihapus.';
  } else {
    $_SESSION['flash_error'] = 'Data gagal dihapus.';
  }
  mysqli_stmt_close($stmt);
  redirect_ke('read.php');
?>
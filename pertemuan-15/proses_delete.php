<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';
  $cid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'ID Tidak Valid.';
    redirect_ke('index.php');
  }

  $stmt = mysqli_prepare($conn, "DELETE FROM `biodata mahasiswa` WHERE id = ?");

  if (!$stmt) {
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('index.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);

  if (mysqli_stmt_execute($stmt)) { 
    $_SESSION['flash_sukses'] = 'Terima kasih, data biodata sudah dihapus.';
  } else { 
    $_SESSION['flash_error'] = 'Data gagal dihapus. Silakan coba lagi.';
  }

  mysqli_stmt_close($stmt);

  redirect_ke('index.php#daftar-biodata');
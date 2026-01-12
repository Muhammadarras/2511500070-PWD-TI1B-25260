<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('index.php');
  }

  $cid = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cid) {
    $_SESSION['flash_error'] = 'ID Tidak Valid.';
    redirect_ke('index.php');
  }

  $nama   = bersihkan($_POST['txtNmLengkap'] ?? '');
  $t4     = bersihkan($_POST['txtT4Lhr']     ?? '');
  $tgl    = bersihkan($_POST['txtTglLhr']    ?? '');
  $hobi   = bersihkan($_POST['txtHobi']      ?? '');
  $psg    = bersihkan($_POST['txtPasangan']  ?? '');
  $krj    = bersihkan($_POST['txtKerja']     ?? '');
  $ortu   = bersihkan($_POST['txtNmOrtu']    ?? '');
  $kk     = bersihkan($_POST['txtNmKakak']   ?? '');
  $adk    = bersihkan($_POST['txtNmAdik']    ?? '');

  # 4. Validasi sederhana
  $errors = [];
  if ($nama === '') $errors[] = 'Nama wajib diisi.';
  if ($t4 === '')   $errors[] = 'Tempat lahir wajib diisi.';

  if (!empty($errors)) {
    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_biodata.php?id=' . (int)$cid);
  }

  $sql = "UPDATE `biodata mahasiswa` SET 
          nama_lengkap = ?, tempat_lahir = ?, tanggal_lahir = ?, 
          hobi = ?, pasangan = ?, pekerjaan = ?, 
          nama_ortu = ?, nama_kakak = ?, nama_adik = ? 
          WHERE id = ?";

  $stmt = mysqli_prepare($conn, $sql);
  
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Sistem sibuk (Prepare gagal).';
    redirect_ke('edit_biodata.php?id=' . (int)$cid);
  }

  mysqli_stmt_bind_param($stmt, "sssssssssi", $nama, $t4, $tgl, $hobi, $psg, $krj, $ortu, $kk, $adk, $cid);

  if (mysqli_stmt_execute($stmt)) {
    $_SESSION['flash_sukses'] = 'Data berhasil diperbarui.';
    redirect_ke('index.php#daftar-biodata');
  } else {
    $_SESSION['flash_error'] = 'Gagal memperbarui data database.';
    redirect_ke('edit_biodata.php?id=' . (int)$cid);
  }

  mysqli_stmt_close($stmt);
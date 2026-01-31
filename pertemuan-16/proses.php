<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: index.php");
    exit;
}

if (isset($_POST['txtNim'])) {
    // 1. Sanitasi
    $nim    = bersihkan($_POST['txtNim']);
    $nama   = bersihkan($_POST['txtNmLengkap']);
    $t4     = bersihkan($_POST['txtT4Lhr']);
    $tgl    = bersihkan($_POST['txtTglLhr']);
    $hobi   = bersihkan($_POST['txtHobi']);
    $psg    = bersihkan($_POST['txtPasangan']);
    $krj    = bersihkan($_POST['txtKerja']);
    $ortu   = bersihkan($_POST['txtNmOrtu']);
    $kk     = bersihkan($_POST['txtNmKakak']);
    $adk    = bersihkan($_POST['txtNmAdik']);

    if (empty($nim) || empty($nama)) {
        $_SESSION['flash_error'] = "NIM dan Nama Lengkap wajib diisi!";
        header("Location: index.php#biodata");
        exit;
    }
    $_SESSION["biodata"] = [
        "nim" => $nim, "nama" => $nama, "tempat" => $t4, "tanggal" => $tgl,
        "hobi" => $hobi, "pasangan" => $psg, "pekerjaan" => $krj, 
        "ortu" => $ortu, "kakak" => $kk, "adik" => $adk
    ];
    $sql = "INSERT INTO biodata_ (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_ortu, nama_kakak, nama_adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssss", $nim, $nama, $t4, $tgl, $hobi, $psg, $krj, $ortu, $kk, $adk);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['flash_sukses'] = "Biodata berhasil disimpan ke database!";
    } else {
        $_SESSION['flash_error'] = "Gagal menyimpan: " . mysqli_error($conn);
    }
    
    mysqli_stmt_close($stmt);
    
    header("Location: index.php#about");
    exit;
}

if (isset($_POST['txtEmail'])) {
    $nama = bersihkan($_POST['txtNama']);
    $email = bersihkan($_POST['txtEmail']);
    $pesan = bersihkan($_POST['txtPesan']);
    $captcha = $_POST['txtCaptcha'];

    if ($captcha !== "5") {
        $_SESSION['flash_error'] = "Captcha salah.";
        $_SESSION['old'] = ['nama' => $nama, 'email' => $email, 'pesan' => $pesan];
        header("Location: index.php#contact");
        exit;
    }

    $sql = "INSERT INTO tbl_tamu (cnama, cemail, cpesan) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
    
    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['flash_sukses'] = "Pesan terkirim.";
    }
    header("Location: index.php#contact");
    exit;
}
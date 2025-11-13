<?php
session_start();
$_SESSION['nim'] = $_POST['nim'];
$_SESSION['namaLengkap'] = $_POST['namaLengkap'];
$_SESSION['tempatLahir'] = $_POST['tempatLahir'];
$_SESSION['tanggalLahir'] = $_POST['tanggalLahir'];
$_SESSION['hobi'] = $_POST['hobi'];
$_SESSION['pasangan'] = $_POST['pasangan'];
$_SESSION['pekerjaan'] = $_POST['pekerjaan'];
$_SESSION['namaOrangTua'] = $_POST['namaOrangTua'];
$_SESSION['namaKakak'] = $_POST['namaKakak'];
$_SESSION['namaAdik'] = $_POST['namaAdik'];
?>



<?php
session_start();
$sesnama = $_POST["txtNama"];
$sesemail = $_POST["txtEmail"];
$sespesan = $_POST["txtPesan"];
$sesalamat = $_POST["txtAlamat"];  
$sestelepon = $_POST["txtTelepon"]; 
$sestanggalLahir = $_POST["txtTanggalLahir"];  
$_SESSION["sesnama"] = $sesnama;
$_SESSION["sesemail"] = $sesemail;
$_SESSION["sespesan"] = $sespesan;
$_SESSION["sesalamat"] = $sesalamat;  
$_SESSION["sestelepon"] = $sestelepon; 
$_SESSION["sestanggalLahir"] = $sestanggalLahir;  
header("location: index.php"); 
?>

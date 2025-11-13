   <?php
    echo "process.php diakses"; 
    session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['nim'] = $_POST['nim'];
    $_SESSION['nama_lengkap'] = $_POST['nama_lengkap'];
    $_SESSION['tempat_lahir'] = $_POST['tempat_lahir'];
    $_SESSION['tanggal_lahir'] = $_POST['tanggal_lahir'];
    $_SESSION['hobi'] = $_POST['hobi'];
    $_SESSION['pasangan'] = $_POST['pasangan'];
    $_SESSION['pekerjaan'] = $_POST['pekerjaan'];
    $_SESSION['nama_orang_tua'] = $_POST['nama_orang_tua'];
    $_SESSION['nama_kakak'] = $_POST['nama_kakak'];
    $_SESSION['nama_adik'] = $_POST['nama_adik'];
    header("Location: index.html");
    exit();
}
?>


<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

$stmt = mysqli_prepare($conn, "SELECT cid, cnama, cemail, cpesan FROM tbl_tamu WHERE cid = ? LIMIT 1");
if ($stmt) {
    mysqli_stmt_bind_param($stmt, "i", $cid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($res);
    mysqli_stmt_close($stmt);
}

if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

$nama  = $row['cnama'] ?? '';
$email = $row['cemail'] ?? '';
$pesan = $row['cpesan'] ?? '';

$flash_error = $_SESSION['flash_error'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash_error'], $_SESSION['old']);

if (!empty($old)) {
    $nama  = $old['nama'] ?? $nama;
    $email = $old['email'] ?? $email;
    $pesan = $old['pesan'] ?? $pesan;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main id="contact">
        <section>
            <h2>Edit Buku Tamu</h2>
            <?php if (!empty($flash_error)): ?>
                <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
                    <?= $flash_error; ?>
                </div>
            <?php endif; ?>

            <form action="proses_update.php" method="POST">
                <input type="hidden" name="cid" value="<?= (int)$cid; ?>">

                <label for="txtNama"><span>Nama:</span>
                    <input type="text" id="txtNama" name="txtNamaEd" required value="<?= $nama; ?>">
                </label>

                <label for="txtEmail"><span>Email:</span>
                    <input type="email" id="txtEmail" name="txtEmailEd" required value="<?= $email; ?>">
                </label>

                <label for="txtPesan"><span>Pesan Anda:</span>
                    <textarea id="txtPesan" name="txtPesanEd" rows="4" required><?= $pesan; ?></textarea>
                </label>

                <button type="submit">Kirim Perubahan</button>
                <a href="read.php">Batal</a>
            </form>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
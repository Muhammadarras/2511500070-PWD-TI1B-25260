<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT);

$stmt = mysqli_prepare($conn, "SELECT * FROM biodata_ WHERE cid = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section id="contact">
            <h2>Edit Biodata Mahasiswa</h2>
            <?php if (!empty($flash_error)): ?>
                <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
                    <?= $flash_error; ?>
                </div>
            <?php endif; ?>

            <form action="proses_update.php" method="POST">
                <input type="hidden" name="cid" value="<?= (int)$row['cid']; ?>">

                <label for="txtNim"><span>NIM (Readonly):</span>
                    <input type="text" id="txtNim" name="txtNim" value="<?= htmlspecialchars($row['nim']); ?>" readonly style="background:#eee;">
                </label>

                <label for="txtNmLengkap"><span>Nama Lengkap:</span>
                    <input type="text" id="txtNmLengkap" name="txtNamaEd" value="<?= htmlspecialchars($row['nama_lengkap']); ?>" required>
                </label>

                <label for="txtT4Lhr"><span>Tempat Lahir:</span>
                    <input type="text" id="txtT4Lhr" name="txtT4LhrEd" value="<?= htmlspecialchars($row['tempat_lahir']); ?>">
                </label>

                <label for="txtTglLhr"><span>Tanggal Lahir:</span>
                    <input type="text" id="txtTglLhr" name="txtTglLhrEd" value="<?= htmlspecialchars($row['tanggal_lahir']); ?>">
                </label>

                <label for="txtCaptcha"><span>Captcha 2 + 3 = ?</span>
                    <input type="number" id="txtCaptcha" name="txtCaptcha" placeholder="Jawab..." required>
                </label>

                <button type="submit">Kirim</button>
                <a href="read.php" class="reset">Batal</a>
            </form>
        </section>
    </main>
</body>
</html>
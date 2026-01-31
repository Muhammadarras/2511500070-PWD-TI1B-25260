<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';


$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT);

$stmt = mysqli_prepare($conn, "SELECT * FROM tbl_tamu WHERE cid = ? LIMIT 1");
mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);


if (!$row) {
    $_SESSION['flash_error'] = 'Data tamu tidak ditemukan di database.';
    header("Location: index.php"); 
    exit();
}

$flash_error = $_SESSION['flash_error'] ?? '';
unset($_SESSION['flash_error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Tamu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <section id="contact">
            <h2>Edit Pesan Tamu</h2>
            <?php if (!empty($flash_error)): ?>
                <div style="padding:10px; background:#f8d7da; color:#721c24; border-radius:6px;"><?= $flash_error; ?></div>
            <?php endif; ?>

            <form action="proses_update_tamu.php" method="POST">
                <input type="hidden" name="cid" value="<?= (int)$row['cid']; ?>">

                <label><span>Nama:</span>
                    <input type="text" name="txtNama" value="<?= htmlspecialchars($row['cnama']); ?>" required>
                </label>

                <label><span>Email:</span>
                    <input type="email" name="txtEmail" value="<?= htmlspecialchars($row['cemail']); ?>" required>
                </label>

                <label><span>Pesan:</span>
                    <textarea name="txtPesan" required style="width:100%; height:100px;"><?= htmlspecialchars($row['cpesan']); ?></textarea>
                </label>

                <br><br>
                <button type="submit">Update Data</button>
                <a href="index.php" class="reset">Batal</a>
            </form>
        </section>
    </main>
</body>
</html>
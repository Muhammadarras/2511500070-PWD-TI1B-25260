<?php
session_start();
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = mysqli_prepare($conn, "SELECT * FROM biodata_mahasiswa WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    exit("Data tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Biodata</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header><h1>Edit Biodata Mahasiswa</h1></header>
    <main>
        <section id="contact"> <h2>Form Perubahan Data</h2>
            
            <form action="proses_update_biodata.php" method="POST">
                <input type="hidden" name="id" value="<?= $data['id'] ?>">

                <label><span>NIM:</span>
                    <input type="text" name="txtNim" value="<?= $data['nim'] ?>" readonly>
                </label>

                <label><span>Nama Lengkap:</span>
                    <input type="text" name="txtNmLengkap" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
                </label>

                <label><span>Tempat Lahir:</span>
                    <input type="text" name="txtT4Lhr" value="<?= htmlspecialchars($data['tempat_lahir']) ?>" required>
                </label>

                <label><span>Hobi:</span>
                    <input type="text" name="txtHobi" value="<?= htmlspecialchars($data['hobi']) ?>" required>
                </label>

                <div class="button-group">
                    <button type="submit">Update Data</button>
                    <button type="button" onclick="window.location.href='index.php'">Batal</button>
                </div>
            </form>
        </section>
    </main>
</body>
</html>
<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

$query  = "SELECT * FROM ANGGOTA";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Gagal: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Daftar Anggota Organisasi</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr style="background:#f4f4f4;">
                <th>Nama Anggota</th>
                <th>Jabatan</th>
                <th>Batalion</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= htmlspecialchars($row['nama_anggota']) ?></td>
                    <td><?= htmlspecialchars($row['jabatan_anggota']) ?></td>
                    <td><?= htmlspecialchars($row['batalion_anggota']) ?></td>
                    <td>
                        <a href="edit.php?nama=<?= urlencode($row['nama_anggota']) ?>">Edit</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
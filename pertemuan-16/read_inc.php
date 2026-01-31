<?php
require_once __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';
global $conn;

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);

if (!$q) {
    die("Error Database: " . mysqli_error($conn));
}

// 2. Cek jumlah baris
if (mysqli_num_rows($q) > 0) {
    echo '<table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse:collapse;">
          <tr style="background:#eee;"><th>No</th><th>Nama</th><th>Email</th><th>Pesan</th><th>Aksi</th></tr>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($q)) {
        echo "<tr>
                <td>".($i++)."</td>
                <td>".htmlspecialchars($row['cnama'])."</td>
                <td>".htmlspecialchars($row['cemail'])."</td>
                <td>".nl2br(htmlspecialchars($row['cpesan']))."</td>
                <td>
                    <a href='edit.php?cid={$row['cid']}'>Edit</a> | 
                    <a href='proses_delete.php?cid={$row['cid']}'>Hapus</a>
                </td>
              </tr>";
    }
    echo '</table>';
} else {
    // 3. Jika kosong, tampilkan pesan ini
    echo "<p style='color:orange; font-weight:bold;'>Data kosong! Silakan isi form 'Hubungi Kami' terlebih dahulu.</p>";
}
?>
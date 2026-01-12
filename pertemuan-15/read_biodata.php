<?php
require_once __DIR__ . '/koneksi.php';

$sql = "SELECT * FROM biodata_mahasiswa ORDER BY id DESC";
$query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    echo "<table border='1' cellpadding='10' cellspacing='0' style='width:100%; border-collapse: collapse;'>";
    echo "<tr style='background-color: #eee;'>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Lengkap</th>
            <th>Aksi</th>
          </tr>";

    $no = 1;
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td>" . $no++ . "</td>";
        echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nama_lengkap']) . "</td>";
        
        echo "<td>
                <a href='edit_biodata.php?id=" . $row['id'] . "'>Edit</a> | 
                <a href='proses_delete_biodata.php?id=" . $row['id'] . "' 
                   onclick='return confirm(\"Yakin ingin menghapus data " . htmlspecialchars($row['nama_lengkap']) . "?\")'>Hapus</a>
              </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Belum ada data mahasiswa.</p>";
}
?>
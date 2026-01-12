<?php
session_start();
require 'koneksi.php';
require 'fungsi.php';

$sql = "SELECT * FROM tbl_tamu ORDER BY cid DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
    die("Query error: " . mysqli_error($conn));
}

// Ambil pesan notifikasi
$flash_sukses = $_SESSION['flash_sukses'] ?? ''; 
$flash_error  = $_SESSION['flash_error'] ?? '';  
unset($_SESSION['flash_sukses'], $_SESSION['flash_error']);
?>

<?php if (!empty($flash_sukses)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#d4edda; color:#155724; border:1px solid #c3e6cb; border-radius:6px;">
        <?= $flash_sukses; ?>
    </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
    <div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border:1px solid #f5c6cb; border-radius:6px;">
        <?= $flash_error; ?>
    </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0" style="width:100%; border-collapse: collapse;">
    <tr style="background-color: #f2f2f2;">
        <th>No</th>
        <th>Aksi</th>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Tanggal Dibuat</th>
    </tr>
    <?php $i = 1; ?>
    <?php while ($row = mysqli_fetch_assoc($q)): ?>
        <tr>
            <td align="center"><?= $i++ ?></td>
            <td align="center">
                <a href="edit.php?cid=<?= (int)$row['cid']; ?>" style="color: blue; text-decoration: none;">Edit</a>
            </td>
            <td><?= $row['cid']; ?></td>
            <td><?= htmlspecialchars($row['cnama'] ?? ''); ?></td>
            <td><?= htmlspecialchars($row['cemail'] ?? ''); ?></td>
            <td><?= nl2br(htmlspecialchars($row['cpesan'] ?? '')); ?></td>
            <td>
                <?php 
                // Cek nama kolom yang benar: dcreated_at ATAU created_at
                $tgl = $row['dcreated_at'] ?? $row['created_at'] ?? '';
                echo formatTanggal($tgl); 
                ?>
            </td>
        </tr>
    <?php endwhile; ?>
</table>
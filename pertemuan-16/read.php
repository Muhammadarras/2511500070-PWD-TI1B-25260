<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>Nama Anggota</th>
    <th>Jabatan</th>
    <th>WA</th>
  </tr>
  <?php $i = 1; $q = mysqli_query($conn, "SELECT * FROM ANGGOTA"); ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?nama=<?= urlencode($row['nama_anggota']); ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['nama_anggota']); ?>?')" 
           href="proses_delete_anggota.php?nama=<?= urlencode($row['nama_anggota']); ?>">Delete</a>
      </td>
      <td><?= htmlspecialchars($row['nama_anggota']); ?></td>
      <td><?= htmlspecialchars($row['jabatan_anggota']); ?></td>
      <td><?= htmlspecialchars($row['nomor_wa']); ?></td>
    </tr>
  <?php endwhile; ?>
</table>
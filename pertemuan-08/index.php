<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Judul Halaman</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
      &#9776;
    </button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#entry-mahasiswa">Entry Data Mahasiswa</a></li>
        <li><a href="#about">Tentang</a></li>
        <li><a href="#contact">Kontak</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <?php
      // Menampilkan pesan sederhana dengan PHP
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <!-- Section baru: Entry Data Mahasiswa (di atas #about, mengikuti styling #contact) -->
    <section id="entry-mahasiswa">
      <h2>Entry Data Mahasiswa</h2>
      <form action="process.php" method="POST">
        <label for="nim"><span>NIM:</span>
          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required autocomplete="off">
        </label>

        <label for="namaLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="namaLengkap" name="namaLengkap" placeholder="Masukkan nama lengkap" required autocomplete="name">
        </label>

        <label for="tempatLahir"><span>Tempat Lahir:</span>
          <input type="text" id="tempatLahir" name="tempatLahir" placeholder="Masukkan tempat lahir" required autocomplete="address-level2">
        </label>

        <label for="tanggalLahir"><span>Tanggal Lahir:</span>
          <input type="date" id="tanggalLahir" name="tanggalLahir" required>
        </label>

        <label for="hobi"><span>Hobi:</span>
          <input type="text" id="hobi" name="hobi" placeholder="Masukkan hobi" required autocomplete="off">
        </label>

        <label for="pasangan"><span>Pasangan:</span>
          <input type="text" id="pasangan" name="pasangan" placeholder="Masukkan nama pasangan" autocomplete="off">
        </label>

        <label for="pekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan" required autocomplete="organization-title">
        </label>

        <label for="namaOrangTua"><span>Nama Orang Tua:</span>
          <input type="text" id="namaOrangTua" name="namaOrangTua" placeholder="Masukkan nama orang tua" required autocomplete="name">
        </label>

        <label for="namaKakak"><span>Nama Kakak:</span>
          <input type="text" id="namaKakak" name="namaKakak" placeholder="Masukkan nama kakak" autocomplete="name">
        </label>

        <label for="namaAdik"><span>Nama Adik:</span>
          <input type="text" id="namaAdik" name="namaAdik" placeholder="Masukkan nama adik" autocomplete="name">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <?php
      // Mulai session untuk mengambil data dari form
      session_start();

      // Gunakan data dari session jika ada, jika tidak gunakan default dari data yang diberikan pengguna
      $NIM = isset($_SESSION['nim']) ? $_SESSION['nim'] : '2511500070';
      $Nama = isset($_SESSION['namaLengkap']) ? $_SESSION['namaLengkap'] : 'muhammad arrasy &#128512;';
      $tempatlahir = isset($_SESSION['tempatLahir']) ? $_SESSION['tempatLahir'] : "bangka belitung";
      $tanggallahir = isset($_SESSION['tanggalLahir']) ? $_SESSION['tanggalLahir'] : "30 april 2007";
      $hobi = isset($_SESSION['hobi']) ? $_SESSION['hobi'] : "ngulik linux , diving , videografi , 3d animator , batminton";
      $pasangan = isset($_SESSION['pasangan']) ? $_SESSION['pasangan'] : "Belum ada &hearts;";
      $pekerjaan = isset($_SESSION['pekerjaan']) ? $_SESSION['pekerjaan'] : "Mahasiswa Atma Luhur , freelance video/fotografi pemerintahan";
      $namaOrangTua = isset($_SESSION['namaOrangTua']) ? $_SESSION['namaOrangTua'] : "Bapak Marwan Dinata dan Ibu AYU";
      $namaKakak = isset($_SESSION['namaKakak']) ? $_SESSION['namaKakak'] : ""; // Default kosong, hanya tampil jika ada
      $namaAdik = isset($_SESSION['namaAdik']) ? $_SESSION['namaAdik'] : "Al fatih";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?php echo $NIM; ?></p>
      <p><strong>Nama Lengkap:</strong> <?php echo $Nama; ?></p>
      <p><strong>Tempat Lahir:</strong> <?php echo $tempatlahir; ?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo $tanggallahir; ?></p>
      <p><strong>Hobi:</strong> <?php echo $hobi; ?></p>
      <p><strong>Pasangan:</strong> <?php echo $pasangan; ?></p>
      <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan; ?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo $namaOrangTua; ?></p>
      <?php if (!empty($namaKakak)): ?>
        <p><strong>Nama Kakak:</strong> <?php echo $namaKakak; ?></p>
      <?php endif; ?>
      <p><strong>Nama Adik:</strong> <?php echo $namaAdik; ?></p>
    </section>

    <section id="ipk">
      <h2>Nilai Saya</h2>
      <?php
      // Data mata kuliah dari pengguna
      $namaMatkul1 = "Algoritma dan Struktur Data";
      $sksMatkul1 = 4;
      $nilaiHadir1 = 90;
      $nilaiTugas1 = 60;
      $nilaiUTS1 = 80;
      $nilaiUAS1 = 70;

      $namaMatkul2 = "Agama";
      $sksMatkul2 = 2;
      $nilaiHadir2 = 70;
      $nilaiTugas2 = 50;
      $nilaiUTS2 = 60;
      $nilaiUAS2 = 80;

      $namaMatkul3 = "Matematika Diskrit";
      $sksMatkul3 = 3;
      $nilaiHadir3 = 85;
      $nilaiTugas3 = 75;
      $nilaiUTS3 = 85;
      $nilaiUAS3 = 90;

      $namaMatkul4 = "Bahasa Inggris";
      $sksMatkul4 = 2;
      $nilaiHadir4 = 95;
      $nilaiTugas4 = 80;
      $nilaiUTS4 = 75;
      $nilaiUAS4 = 85;

      $namaMatkul5 = "Pemrograman Web Dasar";
      $sksMatkul5 = 3;
      $nilaiHadir5 = 69;
      $nilaiTugas5 = 80;
      $nilaiUTS5 = 90;
      $nilaiUAS5 = 100;

      // Array untuk menyimpan data mata kuliah
      $matkul = [
          1 => ['nama' => $namaMatkul1, 'sks' => $sksMatkul1, 'hadir' => $nilaiHadir1, 'tugas' => $nilaiTugas1, 'uts' => $nilaiUTS1, 'uas' => $nilaiUAS1],
          2 => ['nama' => $namaMatkul2, 'sks' => $sksMatkul2, 'hadir' => $nilaiHadir2, 'tugas' => $nilaiTugas2, 'uts' => $nilaiUTS2, 'uas' => $nilaiUAS2],
          3 => ['nama' => $namaMatkul3, 'sks' => $sksMatkul3, 'hadir' => $nilaiHadir3, 'tugas' => $nilaiTugas3, 'uts' => $nilaiUTS3, 'uas' => $nilaiUAS3],
          4 => ['nama' => $namaMatkul4, 'sks' => $sksMatkul4, 'hadir' => $nilaiHadir4, 'tugas' => $nilaiTugas4, 'uts' => $nilaiUTS4, 'uas' => $nilaiUAS4],
          5 => ['nama' => $namaMatkul5, 'sks' => $sksMatkul5, 'hadir' => $nilaiHadir5, 'tugas' => $nilaiTugas5, 'uts' => $nilaiUTS5, 'uas' => $nilaiUAS5]
      ];

      $totalBobot = 0;
      $totalSKS = 0;

      // Loop untuk menghitung dan menampilkan setiap mata kuliah
      for ($i = 1; $i <= 5; $i++) {
          $nama = $matkul[$i]['nama'];
          $sks = $matkul[$i]['sks'];
          $hadir = $matkul[$i]['hadir'];
          $tugas = $matkul[$i]['tugas'];
          $uts = $matkul[$i]['uts'];
          $uas = $matkul[$i]['uas'];

          // Hitung nilai akhir
          $nilaiAkhir = (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);

          // Tentukan grade berdasarkan nilai akhir dan kehadiran
          if ($hadir < 70) {
              $grade = 'E';
          } else {
              if ($nilaiAkhir >= 85) {
                  $grade = 'A';
              } elseif ($nilaiAkhir >= 80) {
                  $grade = 'A-';
              } elseif ($nilaiAkhir >= 75) {
                  $grade = 'B+';
              } elseif ($nilaiAkhir >= 70) {
                  $grade = 'B';
              } elseif ($nilaiAkhir >= 65) {
                  $grade = 'B-';
              } elseif ($nilaiAkhir >= 60) {
                  $grade = 'C+';
              } elseif ($nilaiAkhir >= 55) {
                  $grade = 'C';
              } elseif ($nilaiAkhir >= 50) {
                  $grade = 'C-';
              } elseif ($nilaiAkhir >= 45) {
                  $grade = 'D';
              } else {
                  $grade = 'E';
              }
          }

          switch ($grade) {
              case 'A':
                  $mutu = 4.00;
                  break;
              case 'A-':
                  $mutu = 3.70;
                  break;
              case 'B+':
                  $mutu = 3.30;
                  break;
              case 'B':
                  $mutu = 3.00;
                  break;
              case 'B-':
                  $mutu = 2.70;
                  break;
              case 'C+':
                  $mutu = 2.30;
                  break;
              case 'C':
                  $mutu = 2.00;
                  break;
              case 'C-':
                  $mutu = 1.70;
                  break;
              case 'D':
                  $mutu = 1.00;
                  break;
              case 'E':
                  $mutu = 0.00;
                  break;
              default:
                  $mutu = 0.00;
          }

          $bobot = $mutu * $sks;

          $status = (in_array($grade, ['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-'])) ? 'LULUS' : 'GAGAL';

          $totalBobot += $bobot;
          $totalSKS += $sks;

          echo "<div class='matkul-item'>";
          echo "<p><span class='label'>Nama Matakuliah ke-$i :</span> <span class='value'>$nama</span></p>";
          echo "<p><span class='label'>SKS :</span> <span class='value'>$sks</span></p>";
          echo "<p><span class='label'>Kehadiran :</span> <span class='value'>$hadir</span></p>";
          echo "<p><span class='label'>Tugas :</span> <span class='value'>$tugas</span></p>";
          echo "<p><span class='label'>UTS :</span> <span class='value'>$uts</span></p>";
          echo "<p><span class='label'>UAS :</span> <span class='value'>$uas</span></p>";
          echo "<p><span class='label'>Nilai Akhir :</span> <span class='value'>" . number_format($nilaiAkhir, 0) . "</span></p>";
          echo "<p><span class='label'>Grade :</span> <span class='value'>$grade</span></p>";
          echo "<p><span class='label'>Angka Mutu :</span> <span class='value'>" . number_format($mutu, 2) . "</span></p>";
          echo "<p><span class='label'>Bobot :</span> <span class='value'>" . number_format($bobot, 2) . "</span></p>";
          echo "<p><span class='label'>Status :</span> <span class='value'>$status</span></p>";
          echo "<hr>";
          echo "</div>";
      }

      $IPK = ($totalSKS > 0) ? $totalBobot / $totalSKS : 0;
      echo "<div class='total-section'>";
      echo "<p><span class='label'>Total Bobot :</span> <span class='value'>" . number_format($totalBobot, 2) . "</span></p>";
      echo "<p><span class='label'>Total SKS :</span> <span class='value'>$totalSKS</span></p>";
      echo "<p><span class='label'>IPK :</span> <span class='value'>" . number_format($IPK, 2) . "</span></p>";
      echo "</div>";
      ?>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="" method="POST">
        <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtNama" placeholder="Masukkan nama" required autocomplete="name">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
        </label>

        <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 muhammad arrasy [2511500070]</p>
  </footer>

  <script src="script.js"></script>
</body>

</html>
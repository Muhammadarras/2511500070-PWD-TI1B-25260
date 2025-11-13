<?php
session_start();

$sesnama = "";
if (isset($_SESSION["sesnama"])):
  $sesnama = $_SESSION["sesnama"];
endif;

$sesemail = "";
if (isset($_SESSION["sesemail"])):
  $sesemail = $_SESSION["sesemail"];
endif;

$sespesan = "";
if (isset($_SESSION["sespesan"])):
  $sespesan = $_SESSION["sespesan"];
endif;

$mahasiswa = isset($_SESSION["mahasiswa"]) ? $_SESSION["mahasiswa"] : [];
if (!empty($mahasiswa)) {
    unset($_SESSION["mahasiswa"]);
}
?>

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
      echo "halo dunia!<br>";
      echo "nama saya hadi";
      ?>
      <p>Ini contoh paragraf HTML.</p>
    </section>

    <section id="entry-mahasiswa">
      <h2>Entry Data Mahasiswa</h2>
      <form action="process_entry.php" method="POST"> 
        <label for="nim"><span>NIM:</span>
          <input type="text" id="nim" name="nim" placeholder="Masukkan NIM" required>
        </label>

        <label for="nama_lengkap"><span>Nama Lengkap:</span>
          <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap" required>
        </label>

        <label for="tempat_lahir"><span>Tempat Lahir:</span>
          <input type="text" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan tempat lahir" required>
        </label>

        <label for="tanggal_lahir"><span>Tanggal Lahir:</span>
          <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
        </label>

        <label for="hobi"><span>Hobi:</span>
          <input type="text" id="hobi" name="hobi" placeholder="Masukkan hobi">
        </label>

        <label for="pasangan"><span>Pasangan:</span>
          <input type="text" id="pasangan" name="pasangan" placeholder="Masukkan nama pasangan">
        </label>

        <label for="pekerjaan"><span>Pekerjaan:</span>
          <input type="text" id="pekerjaan" name="pekerjaan" placeholder="Masukkan pekerjaan">
        </label>

        <label for="nama_orang_tua"><span>Nama Orang Tua:</span>
          <input type="text" id="nama_orang_tua" name="nama_orang_tua" placeholder="Masukkan nama orang tua">
        </label>

        <label for="nama_kakak"><span>Nama Kakak:</span>
          <input type="text" id="nama_kakak" name="nama_kakak" placeholder="Masukkan nama kakak">
        </label>

        <label for="nama_adik"><span>Nama Adik:</span>
          <input type="text" id="nama_adik" name="nama_adik" placeholder="Masukkan nama adik">
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
      </form>
    </section>

    <section id="about">
      <?php
      $nim_default = "2511500070";
      $nama_default = "muhammad arrasy &#128512;";
      $tempat_default = "bangka belitung";
      $tanggal_default = "30 april 2007";
      $hobi_default = "ngulik linux , diving , videografi , 3d animator , batminton";
      $pasangan_default = "Belum ada &hearts;";
      $pekerjaan_default = "Mahasiswa Atma Luhur , freelance video/fotografi pemerintahan";
      $orang_tua_default = "Bapak Marwan Dinata dan Ibu AYU";
      $kakak_default = "Belum diisi"; 
      $adik_default = "Al fatih";
      ?>
      <h2>Tentang Saya</h2>
      <p><strong>NIM:</strong> <?php echo htmlspecialchars($mahasiswa['nim'] ?? $nim_default); ?></p>
      <p><strong>Nama Lengkap:</strong> <?php echo htmlspecialchars($mahasiswa['nama_lengkap'] ?? $nama_default); ?></p>
      <p><strong>Tempat Lahir:</strong> <?php echo htmlspecialchars($mahasiswa['tempat_lahir'] ?? $tempat_default); ?></p>
      <p><strong>Tanggal Lahir:</strong> <?php echo htmlspecialchars($mahasiswa['tanggal_lahir'] ?? $tanggal_default); ?></p>
      <p><strong>Hobi:</strong> <?php echo htmlspecialchars($mahasiswa['hobi'] ?? $hobi_default); ?></p>
      <p><strong>Pasangan:</strong> <?php echo htmlspecialchars($mahasiswa['pasangan'] ?? $pasangan_default); ?></p>
      <p><strong>Pekerjaan:</strong> <?php echo htmlspecialchars($mahasiswa['pekerjaan'] ?? $pekerjaan_default); ?></p>
      <p><strong>Nama Orang Tua:</strong> <?php echo htmlspecialchars($mahasiswa['nama_orang_tua'] ?? $orang_tua_default); ?></p>
      <p><strong>Nama Kakak:</strong> <?php echo htmlspecialchars($mahasiswa['nama_kakak'] ?? $kakak_default); ?></p>
      <p><strong>Nama Adik:</strong> <?php echo htmlspecialchars($mahasiswa['nama_adik'] ?? $adik_default); ?></p>
    </section>

    <section id="contact">
      <h2>Kontak Kami</h2>
      <form action="proses.php" method="POST">
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

      <?php if (!empty($sesnama)): ?>
        <br><hr>
        <h2>Yang menghubungi kami</h2>
        <p><strong>Nama :</strong> <?php echo $sesnama ?></p>
        <p><strong>Email :</strong> <?php echo $sesemail ?></p>
        <p><strong>Pesan :</strong> <?php echo $sespesan ?></p>
      <?php endif; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 muhammad arrasy [2511500070] &trade;</p> 
  </footer>

  <script src="script.js"></script>
</body>

</html>
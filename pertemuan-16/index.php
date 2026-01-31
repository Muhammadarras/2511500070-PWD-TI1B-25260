<?php
session_start();
require_once __DIR__ . '/fungsi.php';

$flash_sukses = $_SESSION['flash_sukses'] ?? ''; 
$flash_error  = $_SESSION['flash_error'] ?? ''; 
$old          = $_SESSION['old'] ?? []; 
$anggota_data = $_SESSION["anggota"] ?? [];

unset($_SESSION['flash_sukses'], $_SESSION['flash_error'], $_SESSION['old']); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Organisasi</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <header>
    <h1>Halaman Administrasi</h1>
    <button class="menu-toggle" id="menuToggle">&#9776;</button>
    <nav>
      <ul>
        <li><a href="#home">Beranda</a></li>
        <li><a href="#anggota">Input Anggota</a></li>
        <li><a href="#about">Data Session</a></li>
        <li><a href="#contact">Kontak & Data Database</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <section id="home">
      <h2>Selamat Datang</h2>
      <p>Halo dunia! Nama saya Hadi. Ini adalah sistem pengelolaan data anggota dan pesan tamu.</p>
    </section>

    <section id="anggota">
      <h2>Data Anggota Organisasi</h2>
      <form action="proses_anggota.php" method="POST">
        <label for="txtNama"><span>Nama Lengkap:</span>
          <input type="text" id="txtNama" name="txtNoAng" placeholder="Nama Lengkap" required>
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="date" id="txtTglLhr" name="txtNmAng" required>
        </label>

        <label for="txtJabAng"><span>Jabatan:</span>
          <input type="text" id="txtJabAng" name="txtJabAng" placeholder="Jabatan" required>
        </label>

        <label for="txtTglJadi"><span>Tanggal Jadi Anggota:</span>
          <input type="date" id="txtTglJadi" name="txtTglJadi" required>
        </label>

        <label for="txtSkill"><span>Kemampuan:</span>
          <input type="text" id="txtSkill" name="txtSkill" placeholder="Skill" required>
        </label>

        <label for="txtGaji"><span>Gaji:</span>
          <input type="number" id="txtGaji" name="txtGaji" placeholder="Gaji" required>
        </label>

        <label for="txtNoWA"><span>Nomor WA:</span>
          <input type="text" id="txtNoWA" name="txtNoWA" placeholder="08..." required>
        </label>

        <label for="txBatalion"><span>Batalion:</span>
          <input type="text" id="txBatalion" name="txBatalion" placeholder="Batalion" required>
        </label>

        <label for="txtBB"><span>Berat Badan (kg):</span>
          <input type="number" id="txtBB" name="txtBB" placeholder="BB" required>
        </label>

        <label for="txtTB"><span>Tinggi Badan (cm):</span>
          <input type="number" id="txtTB" name="txtTB" placeholder="TB" required>
        </label>

        <button type="submit">Kirim Data Anggota</button>
        <button type="reset" class="reset">Batal</button>
      </form>
    </section>

    <?php
    $fieldConfig = [
      "noang" => ["label" => "Nama :", "suffix" => ""],
      "nama" => ["label" => "Tanggal Lahir :", "suffix" => ""],
      "jabatan" => ["label" => "Jabatan :", "suffix" => ""],
      "tanggal" => ["label" => "Tanggal Bergabung :", "suffix" => ""],
      "skill" => ["label" => "Kemampuan :", "suffix" => ""],
      "gaji" => ["label" => "Gaji :", "suffix" => ""],
      "nowa" => ["label" => "Nomor WA:", "suffix" => ""],
      "batalion" => ["label" => "Batalion :", "suffix" => ""],
      "bb" => ["label" => "Berat Badan:", "suffix" => " kg"],
      "tb" => ["label" => "Tinggi Badan:", "suffix" => " cm"],
    ];
    ?>

    <section id="about">
      <h2>Data Anggota Terakhir (Session)</h2>
      <?= tampilkanData($fieldConfig, $anggota_data) ?>
    </section>

    <section id="contact">
      <h2>Hubungi Kami (Database)</h2>

      <?php if ($flash_sukses): ?>
        <div class="alert alert-success" style="padding:10px; background:#d4edda; color:#155724; border-radius:5px; margin-bottom:10px;">
          <?= $flash_sukses; ?>
        </div>
      <?php endif; ?>

      <?php if ($flash_error): ?>
        <div class="alert alert-danger" style="padding:10px; background:#f8d7da; color:#721c24; border-radius:5px; margin-bottom:10px;">
          <?= $flash_error; ?>
        </div>
      <?php endif; ?>

      <form action="proses.php" method="POST">
        <label for="txtNamaContact"><span>Nama:</span>
          <input type="text" id="txtNamaContact" name="txtNama" placeholder="Nama Anda" required 
                 value="<?= $old['nama'] ?? '' ?>">
        </label>

        <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Email Anda" required 
                 value="<?= $old['email'] ?? '' ?>">
        </label>

        <label for="txtPesan"><span>Pesan:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" required><?= $old['pesan'] ?? '' ?></textarea>
        </label>

        <label for="txtCaptcha"><span>Berapa 2 + 3?</span>
          <input type="number" id="txtCaptcha" name="txtCaptcha" placeholder="Jawaban" required>
        </label>

        <button type="submit">Kirim Pesan</button>
        <button type="reset">Batal</button>
      </form>

      <br><hr>
      <h2>Daftar Pesan Tamu (Read Database)</h2>
      <?php include 'read_inc.php'; ?>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Yohanes Setiawan Japriadi [0344300002]</p>
  </footer>

  <script src="script.js"></script>
</body>
</html>
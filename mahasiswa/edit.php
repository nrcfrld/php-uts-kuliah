<?php
include "../layouts/header.php";
require_once "../models/Mahasiswa.php";

$mahasiswa = new Mahasiswa();

$row = $mahasiswa->getMahasiswaById($_GET['id']);

?>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Mahasiswa</h3>
        <!-- Button trigger modal -->
        <a href="index.php" class="btn btn-primary mb-5">
          Kembali
        </a>
      </div>
      <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <section class="section">
    <div class="card">
      <div class="card-body">
        <form action="process.php?action=edit&id=<?= $row['id'] ?>" method="post" id="form-mahasiswa">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required maxlength="10" minlength="10" value="<?= $row['nim'] ?>">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required value="<?= $row['nama'] ?>">
              </div>
              <div class="mb-3">
                <label for="telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="telpon" name="telpon" required value="<?= $row['telpon'] ?>">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?= $row['email'] ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan" required>
                  <option value="">--Pilih Jurusan--</option>
                  <option value="Informatika Komputer" <?= $row['jurusan'] == 'Informatika Komputer' ? 'selected' : '' ?>>Informatika Komputer</option>
                  <option value="Komputerisasi Akuntansi" <?= $row['jurusan'] == 'Komputerisasi Akuntansi' ? 'selected' : '' ?>>Komputerisasi Akuntansi</option>
                  <option value="Administrasi Perkantoran" <?= $row['jurusan'] == 'Administrasi Perkantoran' ? 'selected' : '' ?>>Administrasi Perkantoran</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="jenjang_studi" class="form-label">jenjang_studi</label>
                <select class="form-select" name="jenjang_studi" required>
                  <option value="">--Pilih Jenjang Studi--</option>
                  <option value="D3" <?= $row['jenjang_studi'] == 'D3' ? 'selected' : '' ?>>D3</option>
                  <option value="S1" <?= $row['jenjang_studi'] == 'S1' ? 'selected' : '' ?>>S1</option>
                  <option value="S2" <?= $row['jenjang_studi'] == 'S2' ? 'selected' : '' ?>>S2</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required rows="4"><?= $row['alamat'] ?></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" required value="<?= $row['username'] ?>">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required value="<?= $row['password'] ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>

  </section>
</div>

<?php
include "../layouts/footer.php";
?>
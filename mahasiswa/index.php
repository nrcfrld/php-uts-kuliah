<?php
include "../layouts/header.php";
require_once "../models/Mahasiswa.php";

$mahasiswa = new Mahasiswa();

?>

<!-- Modal -->
<form action="process.php?action=create" method="post" id="form-mahasiswa">
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mahasiswa</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" required maxlength="10" minlength="10">
              </div>
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="mb-3">
                <label for="telpon" class="form-label">No Telpon</label>
                <input type="text" class="form-control" id="telpon" name="telpon" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select" name="jurusan" required>
                  <option value="" selected>--Pilih Jurusan--</option>
                  <option value="Informatika Komputer">Informatika Komputer</option>
                  <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                  <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="jenjang_studi" class="form-label">jenjang_studi</label>
                <select class="form-select" name="jenjang_studi" required>
                  <option value="" selected>--Pilih Jenjang Studi--</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required rows="4"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" id="username" name="username" required>
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" id="password" name="password" required>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary" type="submit">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</form>

<div class="page-heading">
  <div class="page-title">
    <div class="row">
      <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>Mahasiswa</h3>
        <p class="text-subtitle text-muted">Daftar mahasiswa</p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
          Tambah Data
        </button>
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
        <div class="table-responsive">
          <table class="table table-striped datatable" id="table1">
            <thead>
              <tr>
                <th>Aksi</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Jurusan</th>
                <th>Jenjang Studi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($mahasiswa->getAllMahasiswa() as $row) {
              ?>
                <tr>
                  <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="process.php?action=delete&id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
                  </td>
                  <td><?= $row['nim'] ?></td>
                  <td><?= $row['nama'] ?></td>
                  <td><?= $row['alamat'] ?></td>
                  <td><?= $row['telpon'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['password'] ?></td>
                  <td><?= $row['jurusan'] ?></td>
                  <td>
                    <?= $row['jenjang_studi'] ?>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
</div>

<?php
include "../layouts/footer.php";

if (isset($_SESSION['info'])) {
?>
  <script>
    let color = ""

    if (`<?= $_SESSION['info']['status'] ?>` == 'success') {
      color = "#4fbe87";
    } else {
      color = "#dc3545";
    }

    Toastify({
      text: `<?= $_SESSION['info']['message'] ?>`,
      duration: 3000,
      backgroundColor: color,
      gravity: "top",
      position: "center",
    }).showToast();
  </script>
<?php

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
}
?>
<?php

require_once "../models/Mahasiswa.php";
$mahasiswa = new Mahasiswa();

if ($_GET['action'] == 'create') {
  if ($mahasiswa->storeMahasiswa($_POST)) {
    echo "<script>
      alert('Berhasil')
      window.location.href = 'index.php';
      </script>";
  } else {
    echo "<script> alert('Gagal') window.location.href = 'index.php';</script>";
  }
}

if ($_GET['action'] == 'edit') {
  if ($mahasiswa->updateMahasiswa($_POST, $_GET['id'])) {
    echo "<script>
      alert('Berhasil')
      window.location.href = 'index.php';
      </script>";
  } else {
    echo "<script> alert('Gagal') window.location.href = 'index.php';</script>";
  }
}

<?php

class Mahasiswa
{
  var $host = "localhost";
  var $username = "root";
  var $password = "";
  var $database = "db_mahasiswa";
  var $connection = "";

  function __construct()
  {
    $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);
  }

  public function getAllMahasiswa()
  {
    $hasil = [];
    $data = mysqli_query($this->connection, "SELECT * FROM mahasiswa");
    while ($row = mysqli_fetch_array($data)) {
      $hasil[] = $row;
    }

    return $hasil;
  }

  public function storeMahasiswa($data)
  {
    $result = mysqli_query($this->connection, "INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `alamat`, `telpon`, `email`, `username`, `password`, `jurusan`, `jenjang_studi`) VALUES (NULL, '$data[nim]', '$data[nama]', '$data[alamat]', '$data[telpon]', '$data[email]', '$data[username]', '$data[password]', '$data[jurusan]', '$data[jenjang_studi]')");

    if (!$result) {
      return [
        'status' => 'failed',
        'message' => mysqli_error($this->connection)
      ];
    }

    return [
      'status' => 'success',
      'message' => 'Berhasil menambah data'
    ];
  }

  public function getMahasiswaById($id)
  {
    $hasil = "";
    $result = mysqli_query($this->connection, "SELECT * FROM mahasiswa WHERE id='$id'");

    while ($row = mysqli_fetch_array($result)) {
      $hasil = $row;
    }

    return $hasil;
  }

  public function updateMahasiswa($data, $id)
  {
    $result = mysqli_query($this->connection, "UPDATE `mahasiswa` SET `nim` = '$data[nim]', `nama` = '$data[nama]', `alamat` = '$data[alamat]', `telpon` = '$data[telpon]', `email` = '$data[email]', `username` = '$data[username]', `password` = '$data[password]', `jurusan` = '$data[jurusan]', `jenjang_studi` = '$data[jenjang_studi]' WHERE `mahasiswa`.`id` = $id");

    if (mysqli_errno($this->connection)) {
      return false;
    }

    return true;
  }

  public function deleteMahasiswa($id)
  {
    $result = mysqli_query($this->connection, "DELETE FROM mahasiswa WHERE id='$id'");
    if (mysqli_errno($this->connection)) {
      return false;
    }

    return true;
  }

  public function login($data)
  {
    $hasil = "";
    $result = mysqli_query($this->connection, "SELECT * FROM mahasiswa WHERE username='$data[username]' AND password='$data[password]'");

    while ($row = mysqli_fetch_array($result)) {
      $hasil = $row;
    }

    if ($hasil) {
      return $hasil;
    }

    return false;
  }
}

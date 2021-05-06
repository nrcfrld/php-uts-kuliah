<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  header('Location: index.php');
}

require_once 'models/Mahasiswa.php';

if ($_POST['username'] == 'user' && $_POST['password'] == 'password') {
  $_SESSION['login'] = [
    'nama' => 'User',
    'username' => 'user'
  ];

  echo json_encode(true);
} else {
  $mahasiswa = new Mahasiswa();

  $result = $mahasiswa->login($_POST);

  if ($result) {
    $_SESSION['login'] = $result;
    echo json_encode($result);
  } else {
    echo json_encode($result);
  }
}

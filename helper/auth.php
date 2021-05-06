<?php
session_start();


function isLogin()
{
  if (!isset($_SESSION['login'])) {
    return false;
  }

  return true;
}

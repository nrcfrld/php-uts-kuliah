<?php

require_once 'helper/auth.php';

if (isLogin()) {
  header('Location: dashboard/index.php');
} else {
  header('Location: login.php');
}

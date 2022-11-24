<?php
session_start();
require 'config/init.php';

// cek login
if (isset($_SESSION)) {
  header('Location: auth/ceklogin.php');
  exit;
} else {
  header('Location: auth/login.php');
  exit;
}

<?php
require_once '../config/init.php';

$id = $_GET['id'];
$obj = new Alat;
$data = $obj->hapusAlat($id);
return;

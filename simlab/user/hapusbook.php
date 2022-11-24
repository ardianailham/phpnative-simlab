<?php
require_once '../config/init.php';

$id = $_GET['id'];
$obj = new Booking;
$data = $obj->hapusBook($id);
header('location:' . BASEURL . '/user/booking.php');

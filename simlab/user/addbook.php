<?php
$judul = 'Detail Booking';
require_once '../config/init.php';
require_once '../inc/template/header.php';
$id_alat = $_GET['id'];
$obj = new Alat;
$data['alat'] = $obj->getAlatById($id_alat);
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i");
$now = date_create("Now");
$interval = date_interval_create_from_date_string('1 hour');
$then = date_add($now, $interval);
$then = $then->format("Y-m-d H:i");
?>
<div class="container mt-3">
  <h3>Booking <?= $data['alat']['Nama_Alat']; ?></h3>
  <form action="<?= BASEURL; ?>/handler/handlerbooking.php" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="id_alat" id="id_alat" value="<?= $data['alat']['id'] ?>">
    <input type="hidden" name="status" id="status" value="3">
    <div class="mb-3">
      <label for="nama-alat">Nama Alat</label>
      <input type="text" class="form-control" id="nama-alat" name="Nama_Alat" value="<?= $data['alat']['Nama_Alat'] ?>">
    </div>
    <div class="mb-3">
      <label for="merk">Merk</label>
      <input type="text" class="form-control" id="merk" name="Merk" value="<?= $data['alat']['Merk'] ?>">
    </div>
    <div class="mb-3">
      <label for="Qty">Qty</label>
      <input type="number" class="form-control" min="1" max="<?= $data['alat']['Qty']; ?>" id="Qty" name="Qty" value="1">
    </div>
    <div class="mb-3">
      <label for="start_date">Start Date</label>
      <input type="datetime-local" class="form-control" name="start_date" id="start_date" value="<?= $date; ?>">
    </div>
    <div class="mb-3">
      <label for="end_date">End Date</label>
      <input type="datetime-local" class="form-control" name="end_date" id="end_date" value="<?= $then; ?>">
    </div>
    <button type="submit" class="btn btn-primary submit" id="submit" name="submit">Book</button>
  </form>
</div>
<?php
require_once '../inc/template/footer.php';
?>
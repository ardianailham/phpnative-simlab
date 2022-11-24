<?php
$judul = 'Detail Booking';
require_once '../config/init.php';
require_once '../inc/template/header.php';
$id = $_GET['id'];
$obj = new Bahan;
$data['bahan'] = $obj->getBahanById($id);
date_default_timezone_set("Asia/Jakarta");
$date = date("Y-m-d H:i");


?>
<div class="container mt-3">
  <h3>Booking <?= $data['bahan']['Nama_Bahan']; ?></h3>
  <form action="<?= BASEURL; ?>/handler/handlerlogbook.php" method="post">
    <input type="hidden" name="id" id="id">
    <input type="hidden" name="id_bahan" id="id_bahan" value="<?= $data['bahan']['id'] ?>">
    <input type="hidden" name="status" id="status" value="3">
    <div class="mb-3">
      <label for="nama-bahan">Nama Bahan</label>
      <input type="text" class="form-control" id="nama-bahan" name="Nama_Bahan" value="<?= $data['bahan']['Nama_Bahan'] ?>">
    </div>
    <div class="mb-3">
      <label for="merk">Merk</label>
      <input type="text" class="form-control" id="merk" name="Merk" value="<?= $data['bahan']['Merk'] ?>">
    </div>
    <div class="mb-3">
      <label for="Jumlah">Jumlah</label>
      <input type="number" step="0.00001" class="form-control" min="0.00001" max="<?= $data['bahan']['Jumlah']; ?>" value="0.00001" id="Jumlah" name="Jumlah">
    </div>
    <div class="mb-3">
      <label for="tanggal">Tanggal</label>
      <input type="datetime-local" class="form-control" value="<?= $date; ?>" id="tanggal" name="tanggal">
    </div>


    <button type="submit" class="btn btn-primary submit" id="submit" name="submit">Book</button>
  </form>
</div>
<?php
require_once '../inc/template/footer.php';
?>
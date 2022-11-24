<?php
$judul = 'Detail Logbook';
require_once '../config/init.php';
require_once '../inc/template/header.php';
$id = $_GET['id'];
$obj = new Logbook;
$data = $obj->getLogbookById($id);
?>
<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['Nama_Bahan']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted">Merk : <?= $data['Merk']; ?></h6>
      <h6 class="card-subtitle mb-2 text-muted">Pengguna : <?= $data['username']; ?></h6>
      <p class="card-text">No. Seri : <?= $data['Serial']; ?></p>
      <p class="card-text">Expired : <?= $data['Exp']; ?></p>
      <p class="card-text">Letak : Rak <?= $data['Letak']; ?></p>
      <p class="card-text">Jumlah : <?= $data['qty'] . ' ' . $data['Satuan']; ?></p>
      <p class="card-text">Tanggal : <?= $data['date']; ?></p>
      <a href="<?= BASEURL; ?>" class="card-link">Back</a>

    </div>
  </div>

</div>

<?php require_once '../inc/template/footer.php'; ?>
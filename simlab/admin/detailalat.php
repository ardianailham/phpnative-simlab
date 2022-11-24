<?php
$judul = 'Detail Alat';
require_once '../config/init.php';
require_once '../inc/template/header.php';
$id = $_GET['id'];
$obj = new Alat;
$data = $obj->getAlatById($id);
?>
<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['Nama_Alat']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['Merk']; ?></h6>
      <p class="card-text"><?= $data['Qty']; ?></p>
      <a href="<?= BASEURL; ?>" class="card-link">Back</a>

    </div>
  </div>

</div>

<?php require_once '../inc/template/footer.php'; ?>
<?php
$judul = 'Detail Booking';
require_once '../config/init.php';
require_once '../inc/template/header.php';
$id = $_GET['id'];
$obj = new Booking;
$data = $obj->getBookingById($id);
?>
<div class="container mt-5">

  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title"><?= $data['Nama_Alat']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted"><?= $data['username']; ?></h6>
      <p class="card-text"><?= $data['qty']; ?></p>
      <p class="card-text"><?= $data['start_date']; ?></p>
      <p class="card-text"><?= $data['end_date']; ?></p>
      <p class="card-text"><?= $data['name']; ?></p>
      <a href="<?= BASEURL; ?>" class="card-link">Back</a>

    </div>
  </div>

</div>

<?php require_once '../inc/template/footer.php'; ?>
<?php
$judul = 'Booking';
require_once '../config/init.php';
require_once '../inc/template/header.php';


$obj = new Booking;
$data = $obj->getBooking();
// var_dump($data);
?>
<div class="container mt-3">
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <h3 class="mt-3">Daftar Booking</h3>
      <table class="table table-bordered table-responsive table-striped" cellpadding="10" cellspacing="0">
        <thead>
          <tr cellpadding="10" cellspacing="0">
            <th>No</th>
            <th>Nama Alat</th>
            <th>User</th>
            <th>Jumlah</th>
            <th>Waktu Mulai</th>
            <th>Waktu Selesai</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($data as $booking) : ?>
          <tr cellpadding="10" cellspacing="0">
            <td><?= $i; ?></td>
            <td><?= $booking['Nama_Alat']; ?></td>
            <td><?= $booking['username']; ?></td>
            <td><?= $booking['qty']; ?></td>
            <td><?= $booking['start_date']; ?></td>
            <td><?= $booking['end_date']; ?></td>
            <td><?= $booking['name']; ?></td>

            <td>

              <a href="detailbook.php?id=<?= $booking['id']; ?>" class="badge text-bg-primary float-end ms-1">ubah</a>

            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>


      </table>
    </div>
  </div>
</div>
<?php
require_once '../inc/template/footer.php';
?>
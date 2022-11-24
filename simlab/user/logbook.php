<?php
$judul = 'Logbook';
require_once '../config/init.php';
require_once '../inc/template/header.php';


$obj = new Logbook;
$data = $obj->getLogbook();
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
      <h3 class="mt-3">Daftar logbook</h3>
      <table class="table table-bordered table-responsive table-striped" cellpadding="10" cellspacing="0">
        <thead>
          <tr cellpadding="10" cellspacing="0">
            <th>No</th>
            <th>Nama Bahan</th>
            <th>User</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $i = 1; ?>
        <?php foreach ($data as $logbook) : ?>
          <tr cellpadding="10" cellspacing="0">
            <td><?= $i; ?></td>
            <td><?= $logbook['Nama_Bahan']; ?></td>
            <td><?= $logbook['username']; ?></td>
            <td><?= $logbook['qty'] . ' ' . $logbook['Satuan']; ?></td>
            <td><?= $logbook['date']; ?></td>
            <td>
              <a href="detaillog.php?id=<?= $logbook['id']; ?>" class="badge text-bg-primary float-end ms-1">detail</a>
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
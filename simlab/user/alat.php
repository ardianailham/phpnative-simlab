<?php
$judul = 'Index';
require_once '../config/init.php';
require_once '../inc/template/header.php';


$obj = new Alat;
$data = $obj->getAlat();
?>

<div class="container mt-3">

  <div class="row d-flex justify-content-center">
    <div class="col-lg-8">
      <?php Flasher::flash(); ?>
    </div>
  </div>
  <div class="row d-flex justify-content-center">

    <div class="row d-flex justify-content-center">
      <div class="col-lg-8">

        <h3 class="mt-3">Daftar Alat</h3>
        <table class="table table-bordered table-responsive table-striped" cellpadding="10" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Alat</th>
              <th>Merk</th>
              <th>Jumlah</th>
              <th align="center">Aksi</th>
            </tr>
          </thead>
          <?php $i = 1; ?>
          <?php foreach ($data as $alat) : ?>
            <tr>
              <td><?= $i; ?></td>
              <td><?= $alat['Nama_Alat']; ?></td>
              <td><?= $alat['Merk']; ?></td>
              <td><?= $alat['Qty']; ?></td>
              <td>
                <a href="detailalat.php?id=<?= $alat['id']; ?>" class="badge text-bg-primary float-end ms-1">detail</a>
                <a href="addbook.php?id=<?= $alat['id']; ?>" class="badge text-bg-success float-end ms-1">book</a>
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
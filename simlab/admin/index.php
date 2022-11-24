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
    <div class="col-lg-8 ">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary tambahAlat" data-bs-toggle="modal" data-bs-target="#formModal">
        Tambah Alat
      </button>
    </div>
  </div>
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
              <a href="<?= BASEURL; ?>/alat/hapus/<?= $alat['id']; ?>" class="badge text-bg-danger float-end ms-1" onclick="return confirm('yakin?');">hapus</a>
              <a href="<?= BASEURL; ?>/alat/ubah/<?= $alat['id']; ?>" class="badge text-bg-primary float-end ms-1 tampilModalUbah" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $alat['id']; ?>">ubah</a>
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

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModal">Tambah Alat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/alat/tambah" method="post">
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="nama-alat" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" id="nama-alat" name="Nama_Alat">
          </div>
          <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" id="merk" name="Merk">
          </div>
          <div class="mb-3">
            <label for="Qty" class="form-label">Qty</label>
            <input type="number" class="form-control" id="Qty" name="Qty">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary submit" id="submit">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require_once '../inc/template/footer.php';
?>
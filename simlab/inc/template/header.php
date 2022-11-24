<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $judul; ?></title>
  <link rel="stylesheet" href="<?= BASEURL; ?>/inc/assets/css/bootstrap.css">
  <script src="<?= BASEURL; ?>/inc/assets/js/jquery-3.6.0.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="<?= BASEURL; ?>"><b>SIMLAB</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/user/alat.php">Daftar Alat</a>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/user/bahan.php">Daftar Bahan</a>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/user/booking.php">Logbook Alat</a>
          <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>/user/logbook.php">Logbook Bahan</a>
        </div>
      </div>
    </div>
  </nav>
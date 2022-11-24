<?php
session_start();

require_once '../config/config.php';
require_once '../config/init.php';

// cek tombol submit
if (!isset($_POST['submit'])) {
  header('location:' . BASEURL);
}


// ambil data yang dikirim
$id = $_POST['id'];
$id_bahan = $_POST['id_bahan'];
$user_id = '1';
$Jumlah = $_POST['Jumlah'];
$date = $_POST['tanggal'];

$data =
  [
    'id' => $id,
    'id_bahan' => $id_bahan,
    'user_id' => $user_id,
    'qty' => $Jumlah,
    'date' => $date
  ];

$bahan = new Bahan;
$infobahan = $bahan->getBahanById($id_bahan);
$stok = $infobahan['Jumlah'];
$logbook = new Logbook;

// cek stok barang
if ($infobahan['Jumlah'] === 0) {
?>
  <script type="text/javascript">
    alert("Stok Habis");
    history.back();
  </script>
<?php
} else {
  $logbook->addLog($data);
  $bahan->updateByBook($id_bahan, $stok, $Jumlah);
?>
  <script type="text/javascript">
    alert("Berhasil");
    window.location.href = '<?= BASEURL; ?>';
  </script>
<?php
}

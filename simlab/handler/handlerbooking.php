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
$id_alat = $_POST['id_alat'];
$user_id = '1';
$qty = $_POST['Qty'];
$sd = $_POST['start_date'];
$ed = $_POST['end_date'];
$status = $_POST['status'];

$data =
  [
    'id' => $id,
    'id_alat' => $id_alat,
    'user_id' => $user_id,
    'qty' => $qty,
    'start_date' => $sd,
    'end_date' => $ed,
    'status' => $status
  ];
$alat = new Alat;
$infoalat = $alat->getAlatById($data['id_alat']);
$booking = new Booking;
$bookinginfo = $booking->getBookingQtyById($data['id_alat']);

// Cek jadwal
$cekjadwal = $booking->getBookingScheduleById($data['id_alat'], $data['start_date'], $data['end_date']);
var_dump($cekjadwal);

if (!empty($cekjadwal)) {
?>
  <script type="text/javascript">
    alert("Jadwal Penuh");
    // history.back();
  </script>
  <?php
} else {
  // Cek kuantitas alat
  $var1 = $data['qty'];
  $var2 = $bookinginfo['data'];
  $var3 = $infoalat['Qty'];



  if ($var1 + $var2 > $var3) {
  ?>
    <script type="text/javascript">
      alert("Booking Penuh");
      history.back();
    </script>
<?php
  } else {
    $result1 = $booking->addBook($data);
    header('location:' . BASEURL);
  }
}

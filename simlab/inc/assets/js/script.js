$(function () {
  $('.tambahAlat').on('click', function () {
    $('#judulModal').html('Tambah Alat')
    $('#submit').html('Tambah')
    $('#nama-alat').val()
    $('#merk').val()
    $('#Qty').val()
  });
  $('.tampilModalUbah').on('click', function () {
    $('#judulModal').html('Ubah Alat')
    $('#submit').html('Ubah')
    $('.modal-body form').attr('action', 'http://localhost/phpmvc/public/alat/ubah');

    const id = $(this).data('id');

    $.ajax({
      url: 'http://localhost/phpmvc/public/alat/getubah',
      data: { id: id },
      method: 'post',
      dataType: 'json',
      success: function (data) {
        $('#nama-alat').val(data.Nama_Alat)
        $('#merk').val(data.Merk)
        $('#Qty').val(data.Qty)
        $('#id').val(data.id)
      }
    })
  });



});
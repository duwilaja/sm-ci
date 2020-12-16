$(document).ready(function() {
    showtable();
});

$('#form_add').submit(function (e) { 
  e.preventDefault();
  $.ajax({
      type: "POST",
      url: "../Api/api_lap_gatur_lalin",
      secureuri: false,
      contentType: false,
      cache: false,
      processData:false,
      data: new FormData(this),
      dataType: "json",
      beforeSend: function() {
         $('#btn-save').hide();
         $('#btn-save-loading').show();
      },
      success: function (r) {
          if (r.status) {
              Swal.fire(
                'Berhasil',
                r.msg,
                'success'
              );

              $('#btn-save').show();
              $('#btn-save-loading').hide();

              $('#form_add')[0].reset();;

          }else{
              Swal.fire(
                'Gagal',
                r.msg,
                'error'
              );

              $('#btn-save').show();
              $('#btn-save-loading').hide();
          } 
      },
      error: function () { 
            Swal.fire(
              'Gagal',
              'Terjadi gangguan sistem, harap hubungi developer',
              'error'
            );

            $('#btn-save').show();
            $('#btn-save-loading').hide();
       }
  });
});

function showtable() {
    $('#tabel').DataTable({
        // Processing indicator
        "bAutoWidth": false,
        "destroy": true,
        "searching": true,
        "processing": true,
        // DataTables server-side processing mode
        "serverSide": true,
        "scrollX": true,
        // Initial no order.
        "order": [],
        // Load data from an Ajax source
        "ajax": {
          "url": 'dt_lap_gat_lin',
          "type": "POST",
        },
        //Set column definition initialisation properties
        "columnDefs": [{
          // "targets": [5],
          "orderable": false
        }]
      });
  }
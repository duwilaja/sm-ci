$(document).ready(function() {
    showtable();
} );

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
          "targets": [5],
          "orderable": false
        }]
      });
  }
$(document).ready(function() {
    var table = $('#tabel-stnk').DataTable({
        lengthChange: false,
        buttons: [ {
            extend:'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        'colvis'],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-stnk .col-md-6:eq(0)' );
} );

$(document).ready(function() {
    var table = $('#tabel-servis').DataTable({
        lengthChange: false,
        buttons: [ {
            extend:'excelHtml5',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        'colvis'],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-servis .col-md-6:eq(0)' );
} );

console.log()
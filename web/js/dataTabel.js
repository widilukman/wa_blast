//Untuk Sorting Tanggal dalam datatables
$.fn.dataTable.moment = function ( format, locale ) {
    var types = $.fn.dataTable.ext.type;
 
    // Add type detection
    types.detect.unshift( function ( d ) {
        return moment( d, format, locale, true ).isValid() ?
            'moment-'+format :
            null;
    } );
 
    // Add sorting method - use an integer for the sorting
    types.order[ 'moment-'+format+'-pre' ] = function ( d ) {
        return moment( d, format, locale, true ).unix();
    };
};

//Datatables Untuk STNK
$(document).ready(function() {
    $.fn.dataTable.moment( 'DD-MM-YYYY' ); //SORTING TANGGAL
    var table = $('#tabel-stnk').DataTable({
        lengthChange: false,
        "order": [[ 4, "asc" ]],
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

//Datatables Untuk Servis
$(document).ready(function() {
    var table = $('#tabel-servis').DataTable({
        lengthChange: false,
        "order": [[ 7, "asc" ]],
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
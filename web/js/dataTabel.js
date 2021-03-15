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
        "order": [[ 3, "asc" ]],
        buttons: [ {
            extend:'excelHtml5',
            text: 'Export as Excel',
            title: 'Data_STNK',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        'colvis'],
        columnDefs: [
            { orderable: false, targets: [0, 1, 2, 7] }
        ],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-stnk .col-md-6:eq(0)' );
} );

//Datatables Untuk Servis
$(document).ready(function() {
    var table = $('#tabel-servis').DataTable({
        lengthChange: false,
        "order": [[ 6, "asc" ]],
        buttons: [ {
            extend:'excelHtml5',
            text: 'Export as Excel',
            title: 'Data_Servis',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        'colvis'],
        columnDefs: [
            { orderable: false, targets: [0, 1, 2, 3, 4, 8] }
        ],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-servis .col-md-6:eq(0)' );
} );

//Datatables Untuk Customer
$(document).ready(function() {
    var table = $('#tabel-customer').DataTable({
        lengthChange: false,
        buttons: [ {
            extend:'excelHtml5',
            text: 'Export as Excel',
            title: 'Data_Customer',
            exportOptions: {
                columns: ':visible'
            }
        }],
        columnDefs: [
            { orderable: false, targets: [1, 2, 3, 4] }
        ],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-customer .col-md-6:eq(0)' );
} );

//Datatables Untuk Karyawan
$(document).ready(function() {
    var table = $('#tabel-karyawan').DataTable({
        lengthChange: false,
        buttons: [ {
            extend:'excelHtml5',
            text: 'Export as Excel',
            title: 'Data_Karyawan',
            exportOptions: {
                columns: ':visible'
            }
        }],
        columnDefs: [
            { orderable: false, targets: [1, 2] }
        ],
        "pageLength": 5
    } );

    table.buttons().container()
        .appendTo( '#card-karyawan .col-md-6:eq(0)' );
} );

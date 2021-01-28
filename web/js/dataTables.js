$(document).ready(function() {
    var table = $('#tabelSTNK').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardSTNK .col-md-6:eq(0)' );
} );

$(document).ready(function() {
    var table = $('#tabelServis').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardServis .col-md-6:eq(0)' );
} );
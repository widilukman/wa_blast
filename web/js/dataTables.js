$(document).ready(function() {
    var table = $('#TabelSTNK').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardSTNK .col-md-6:eq(0)' );
} );

$(document).ready(function() {
    var table = $('#TabelServis').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardServis .col-md-6:eq(0)' );
} );
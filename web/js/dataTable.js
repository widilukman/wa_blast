$(document).ready(function() {
    var table = $('#tableSTNK').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardSTNK .col-md-6:eq(0)' );
} );

$(document).ready(function() {
    var table = $('#tableServis').DataTable({
        lengthChange: false,
        buttons: [ 'excel', 'colvis' ]
    } );

    table.buttons().container()
        .appendTo( '#cardServis .col-md-6:eq(0)' );
} );
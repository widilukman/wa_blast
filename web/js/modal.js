// MODAL SERVIS
$(document).on("click", ".edit-servis", function () { //on click button kelas edit-servis
    var nopol = $(this).data('value'); //mengambil value dari button dan menyimpan pada var nopol
    $('#modalServis').html( nopol ); //mem-passing data nopol ke id=modalServis di file modalServis.php
});
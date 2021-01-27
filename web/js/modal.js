// MODAL UPDATE SERVIS 
$(document).ready(function() {

    $(document).on('click', '.edit-servis', function () {
        var nopol = $(this).data('nopol');
        var holder = $(this).data('holder');
        var km_terbaru = $(this).data('km_terbaru');
        var km_servis = $(this).data('km_servis');
        var servis_berikutnya = $(this).data('servis_berikutnya');
        
        $("#nopol").val(nopol);
        $("#holder").val(holder);
        $("#km_terbaru").val(km_terbaru);
        $("#km_servis").val(km_servis);
        $("#servis_berikutnya").val(servis_berikutnya);
    });
})

//MODAL HAPUS DATA
$(document).ready(function() {

    $(document).on('click', '.hapus', function () { 
        var nopol = $(this).data('nopol');
        
        $("#nopolHapus").val(nopol);
    });
})
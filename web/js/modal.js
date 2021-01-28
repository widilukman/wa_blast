// MODAL UPDATE SERVIS 
$(document).ready(function() {

    $(document).on('click', '.edit-servis', function () {
        var nopolServis = $(this).data('nopol_servis');
        var holderServis = $(this).data('holder_servis');
        var km_terbaru = $(this).data('km_terbaru');
        var km_servis = $(this).data('km_servis');
        var servis_berikutnya = $(this).data('servis_berikutnya');
        
        $(".Servis #nopol-servis").val(nopolServis);
        $(".Servis #holder-servis").val(holderServis);
        $(".Servis #km_terbaru").val(km_terbaru);
        $(".Servis #km_servis").val(km_servis);
        $(".Servis #servis_berikutnya").val(servis_berikutnya);
    });
})

// MODAL UPDATE STNK 
$(document).ready(function() {

    $(document).on('click', '.edit-stnk', function () {
        var nopolStnk = $(this).data('nopol-stnk');
        var holderStnk = $(this).data('holder-stnk');
        var tgl_1thn = $(this).data('tgl_1thn');
        var tgl_5thn = $(this).data('tgl_5thn');
        
        $(".STNK #nopol-stnk").val(nopolStnk);
        $(".STNK #holder-stnk").val(holderStnk);
        $(".STNK #tenggat_1thn").val(tgl_1thn);
        $(".STNK #tenggat_5thn").val(tgl_5thn);
    });
})

//MODAL HAPUS DATA
$(document).ready(function() {

    $(document).on('click', '.hapus', function () { 
        var nopol = $(this).data('nopol');
        
        $("#nopolHapus").val(nopol);
    });
})
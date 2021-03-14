// MODAL UPDATE SERVIS 
$(document).ready(function() {

    $(document).on('click', '.edit-servis', function () {
        var nopolServis = $(this).data('nopol_servis');
        var holderServis = $(this).data('holder_servis');
        var servis_ke = $(this).data('servis_ke');
        var km_terbaru = $(this).data('km_terbaru');
        var km_servis = $(this).data('km_servis');
        var servis_terakhir = $(this).data('servis_terakhir');
        var servis_berikutnya = $(this).data('servis_berikutnya');
        
        $(".Servis #nopol-servis").val(nopolServis);
        $(".Servis #holder-servis").val(holderServis);
        $(".Servis #servis-ke").val(servis_ke);
        $(".Servis #km_terbaru").val(km_terbaru);
        $(".Servis #km_servis").val(km_servis);
        $(".Servis #servis_terakhir").val(servis_terakhir);
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

//MODAL HAPUS DATA KENDARAAN
$(document).ready(function() {

    $(document).on('click', '.hapus', function () { 
        var nopol = $(this).data('nopol');
        
        $("#nopolHapus").val(nopol);
    });
})

// MODAL UPDATE CUSTOMER 
$(document).ready(function() {

    $(document).on('click', '.edit-customer', function () {
        var idCustomer = $(this).data('id_customer');
        var namaCustomer = $(this).data('nama_customer');
        var telpCustomer = $(this).data('telp_customer');
        var alamatCustomer = $(this).data('alamat_customer');
        var tgl_hut = $(this).data('tgl_hut');
        
        $(".Customer #id-customer").val(idCustomer);
        $(".Customer #nama-customer").val(namaCustomer);
        $(".Customer #telp-customer").val(telpCustomer);
        $(".Customer #alamat-customer").val(alamatCustomer);
        $(".Customer #hut-customer").val(tgl_hut);
    });
})

//MODAL HAPUS DATA CUSTOMER
$(document).ready(function() {

    $(document).on('click', '.hapus-customer', function () { 
        var id_customer = $(this).data('id_customer');
        
        $("#id_customer").val(id_customer);
    });
})

// MODAL UPDATE KARYAWAN 
$(document).ready(function() {

    $(document).on('click', '.edit-karyawan', function () {
        var nopol = $(this).data('nopol-karyawan');
        var idKaryawan = $(this).data('id_karyawan');
        var namaKaryawan = $(this).data('nama_karyawan');
        var telpKaryawan = $(this).data('telp_karyawan');

        $(".Karyawan #nopol-karyawan").val(nopol);
        $(".Karyawan #id-karyawan").val(idKaryawan);
        $(".Karyawan #nama-karyawan").val(namaKaryawan);
        $(".Karyawan #telp-karyawan").val(telpKaryawan);
    });
})

//MODAL HAPUS DATA KARYAWAN
$(document).ready(function() {

    $(document).on('click', '.hapus-karyawan', function () {
        var nopol_karyawan = $(this).data('nopol_karyawan');
        var id_karyawan = $(this).data('id_karyawan');
        
        $(".hapusKaryawan #nopol_karyawan").val(nopol_karyawan);
        $(".hapusKaryawan #id_karyawan").val(id_karyawan);
    });
})

// MODAL INFO KARYAWAN 
$(document).ready(function() {

    $(document).on('click', '.info-karyawan', function () {
        var namaKaryawan = $(this).data('nama_karyawan');
        var telpKaryawan = $(this).data('telp_karyawan');

        $(".infoKaryawan #nama-karyawan").val(namaKaryawan);
        $(".infoKaryawan #telp-karyawan").val(telpKaryawan);
    });
})
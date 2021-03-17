$(function() {
    "use strict";

    $(".preloader").fadeOut();
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").delay(20).show();
    
    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);

});

//Script untuk DATEPICKER
$("#tahun-kendaraan").datepicker({
    format: "yyyy",
    startView: "years", 
    minViewMode: "years"
});

//Script untuk ALERT
$(document).ready(function() {
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
});

//Script untuk hitung jumlah STNK 1 tahun tenggat 1 minggu
$(function() {
    var stnk1Thn = document.getElementById("tableSTNK1Thn");
    var hitungBarisBody = stnk1Thn.tBodies[0].rows.length;
    
    $("#badgeSTNK1Thn").text(hitungBarisBody);
});

//Script untuk hitung jumlah STNK 5 tahun tenggat 1 minggu
$(function() {
    var stnk5Thn = document.getElementById("tableSTNK5Thn");
    var hitungBarisBody = stnk5Thn.tBodies[0].rows.length;
    
    $("#badgeSTNK5Thn").text(hitungBarisBody);
});

//Script untuk hitung jumlah tenggat servis 1 minggu
$(function() {
    var TglServis = document.getElementById("tableTglServis");
    var hitungBarisBody = TglServis.tBodies[0].rows.length;
    
    $("#badgeTglServis").text(hitungBarisBody);
});

//Script untuk hitung jumlah kendaraan mendekati Km servis
$(function() {
    var KmServis = document.getElementById("tableKmServis");
    var hitungBarisBody = KmServis.tBodies[0].rows.length;
    
    $("#badgeKmServis").text(hitungBarisBody);
});

//Script untuk hitung jumlah HUT customer 1 minggu
$(function() {
    var HUT = document.getElementById("tableHUT");
    var hitungBarisBody = HUT.tBodies[0].rows.length;
    
    $("#badgeHUT").text(hitungBarisBody);
});

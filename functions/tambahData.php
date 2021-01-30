<?php
require_once('db_login.php');

if(isset($_POST['tambahData'])){
    $nopol = $_POST['nopol'];
    $jenis_kendaraan = $_POST['jenis_kendaraan'];
    $thn_kendaraan = $_POST['thn_kendaraan'];
    $holder = $_POST['holder'];
    $wilayah = $_POST['wilayah'];
    $tenggat_1thn = $_POST['tgl_stnk_1_thn'];
    $tenggat_5thn = $_POST['tgl_stnk_5_thn'];
    $tgl_servis_terakhir = $_POST['tgl_servis_terakhir'];
    $servis_ke = $_POST['servis_ke'];
    $km_terbaru = $_POST['km_terbaru'];
    $km_servis = $_POST['servis_pada_km'];
    $servis_berikutnya = $_POST['tgl_servis_berikutnya'];

    $query_tambah_data = "INSERT INTO invent_kendaraan
                            (nopol, jenis_kendaraan, thn_kendaraan, holder, wilayah, tgl_stnk_1_thn, tgl_stnk_5_thn,
                            tgl_servis_terakhir, servis_ke, servis_pada_km, tgl_servis_berikutnya, tgl_input_data)
                            VALUES ('$nopol', '$jenis_kendaraan', '$thn_kendaraan', '$holder', '$wilayah', '$tenggat_1thn',
                            '$tenggat_5thn', '$tgl_servis_terakhir', '$servis_ke', '$km_terbaru', '$km_servis', '$servis_berikutnya')";
    
    $result_tambah = $db->query($query_tambah_data);
    if (!$result_tambah) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_tambah_data);
    }
    if($result_tambah){
        echo '<script type="text/javascript">';
        echo 'alert("DATA BERHASIL DITAMBAHKAN");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA GAGAL DITAMBAHKAN");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }
}
?>
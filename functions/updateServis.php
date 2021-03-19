<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['updateServis'])){
    $nopol = $_POST['nopol'];
    $holder = $_POST['holder'];
    $servis_ke = $_POST['servis_ke'];
    $km_terbaru = $_POST['km_terbaru'];
    $servis_terakhir = $_POST['tgl_servis_terakhir'];
    $km_servis = $_POST['servis_pada_km'];
    $servis_berikutnya = $_POST['tgl_servis_berikutnya'];

    $query_update_servis = "UPDATE invent_kendaraan SET
                            holder = '$holder',
                            servis_ke = '$servis_ke',
                            km_terbaru = '$km_terbaru',
                            servis_pada_km = '$km_servis',
                            tgl_servis_terakhir = '$servis_terakhir',
                            tgl_servis_berikutnya = '$servis_berikutnya'
                            WHERE nopol = '$nopol'";
    
    $result_servis = $db->query($query_update_servis);
    if($result_servis && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=2";';
        echo '</script>';
    }elseif(!$result_servis && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=-2";';
        echo '</script>';
    }elseif($result_servis){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=2";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=-2";';
        echo '</script>';
    }
}
if($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/logistik/stnkServis_logistik.php";';
    echo '</script>';
}elseif($_SESSION['kode'] == 'G0089'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/index_marcomm.php"';
    echo '</script>';
}else{
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/logistik/stnkServis.php";';
    echo '</script>';
}
?>
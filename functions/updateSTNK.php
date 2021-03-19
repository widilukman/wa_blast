<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['updateSTNK'])){
    $nopol = $_POST['nopol'];
    $holder = $_POST['holder'];
    $tenggat_1thn = $_POST['tgl_stnk_1_thn'];
    $tenggat_5thn = $_POST['tgl_stnk_5_thn'];

    $query_update_stnk = "UPDATE invent_kendaraan SET
                            holder = '$holder',
                            tgl_stnk_1_thn = '$tenggat_1thn',
                            tgl_stnk_5_thn = '$tenggat_5thn'
                            WHERE nopol = '$nopol'";
    
    $result_stnk = $db->query($query_update_stnk);
    if($result_stnk && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=1";';
        echo '</script>';
    }elseif(!$result_stnk && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=-1";';
        echo '</script>';
    }elseif($result_stnk){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=1";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=-1";';
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
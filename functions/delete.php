<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['hapusData'])){
    $nopol = $_POST['nopol'];
    $query_delete = "DELETE FROM invent_kendaraan
                    WHERE nopol = '$nopol'";
    
    $result_delete = $db->query($query_delete);
    if($result_delete && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=3"';
        echo '</script>';
    }elseif(!$result_delete && ($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993')){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/logistik/stnkServis_logistik.php?success=-3"';
        echo '</script>';
    }elseif($result_delete){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=3"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=-3"';
        echo '</script>';
    }
}
if($_SESSION['kode'] == 'G0139' || $_SESSION['kode'] == 'G0993'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/logistik/stnkServis_logistik.php"';
    echo '</script>';
}elseif($_SESSION['kode'] == 'G0089'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/index_marcomm.php"';
    echo '</script>';
}else{
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/stnkServis.php"';
    echo '</script>';
}
?>
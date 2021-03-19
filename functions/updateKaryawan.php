<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['updateKaryawan'])){
    $nopol = $_POST['nopol'];
    $id_karyawan = $_POST['id_karyawan'];
    $nama_karyawan = $_POST['nama_karyawan'];
    $telp_karyawan = $_POST['telp_karyawan'];

    $query_update_karyawan = "UPDATE karyawan SET
                            nama_karyawan = '$nama_karyawan',
                            no_telp_karyawan = '$telp_karyawan'
                            WHERE id_karyawan = '$id_karyawan'";
    
    $query_update_invent = "UPDATE invent_kendaraan SET
                            holder = '$nama_karyawan'
                            WHERE nopol = '$nopol'";

    $result_karyawan = $db->query($query_update_karyawan);
    $result_invent = $db->query($query_update_invent);

    if (!$result_karyawan) {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-60";';
        echo '</script>';
    }
    if($result_karyawan && $result_invent){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=2";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-2";';
        echo '</script>';
    }
}
if($_SESSION['kode'] == 'G0089'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/index_marcomm.php"';
    echo '</script>';
}elseif($_SESSION['kode'] == 'G0993' || $_SESSION['kode'] == 'G0139'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/index_logistik.php"';
    echo '</script>';
}else{
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/customer_karyawan.php"';
    echo '</script>';
}
?>
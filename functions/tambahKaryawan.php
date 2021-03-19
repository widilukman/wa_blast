<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['tambahKaryawan'])){
    $nama_karyawan = $_POST['nama_karyawan'];
    $no_telepon = $_POST['no_telp_karyawan'];

    $query_tambah_karyawan = "INSERT INTO karyawan
                            (nama_karyawan, no_telp_karyawan)
                            VALUES ('$nama_karyawan', '$no_telepon')";
    
    $result_tambah = $db->query($query_tambah_karyawan);
    if (!$result_tambah) {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-60"';
        echo '</script>';
    }
    if($result_tambah){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=6"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-6"';
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
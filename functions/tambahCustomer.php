<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['tambahCustomer'])){
    $nama_customer = $_POST['nama_customer'];
    $no_telepon = $_POST['no_telp_customer'];
    $alamat = $_POST['alamat_customer'];
    $hut_customer = $_POST['hut_customer'];

    $query_tambah_customer = "INSERT INTO customer
                            (nama_customer, no_telepon, alamat, tgl_hut)
                            VALUES ('$nama_customer', '$no_telepon', '$alamat', '$hut_customer')";
    
    $result_tambah = $db->query($query_tambah_customer);
    if (!$result_tambah) {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-50"';
        echo '</script>';
    }
    if($result_tambah){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=5"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-5"';
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
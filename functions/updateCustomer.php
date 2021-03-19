<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['updateCustomer'])){
    $id_customer = $_POST['id_customer'];
    $nama_customer = $_POST['nama_customer'];
    $telp_customer = $_POST['telp_customer'];
    $alamat_customer = $_POST['alamat_customer'];
    $hut_customer = $_POST['hut_customer'];

    $query_update_customer = "UPDATE customer SET
                            nama_customer = '$nama_customer',
                            no_telepon = '$telp_customer',
                            alamat = '$alamat_customer',
                            tgl_hut = '$hut_customer'
                            WHERE id_customer = '$id_customer'";
    
    $result_customer = $db->query($query_update_customer);
    if (!$result_customer) {
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-50";';
        echo '</script>';
    }
    if($result_customer){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=1";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-1";';
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
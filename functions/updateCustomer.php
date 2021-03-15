<?php
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
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_update_customer);
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
?>
<?php
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
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_tambah_customer);
    }
    if($result_tambah){
        echo '<script type="text/javascript">';
        echo 'alert("DATA CUSTOMER BERHASIL DITAMBAHKAN");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA CUSTOMER GAGAL DITAMBAHKAN");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }
}
?>
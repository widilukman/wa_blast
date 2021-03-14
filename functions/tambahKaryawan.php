<?php
require_once('db_login.php');

if(isset($_POST['tambahKaryawan'])){
    $nama_karyawan = $_POST['nama_karyawan'];
    $no_telepon = $_POST['no_telp_karyawan'];

    $query_tambah_karyawan = "INSERT INTO karyawan
                            (nama_karyawan, no_telp_karyawan)
                            VALUES ('$nama_karyawan', '$no_telepon')";
    
    $result_tambah = $db->query($query_tambah_karyawan);
    if (!$result_tambah) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_tambah_karyawan);
    }
    if($result_tambah){
        echo '<script type="text/javascript">';
        echo 'alert("DATA KARYAWAN BERHASIL DITAMBAHKAN");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA KARYAWAN GAGAL DITAMBAHKAN");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }
}
?>
<?php
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

    if (!$result_karyawan || !$result_invent) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_update_karyawan);
    }
    if($result_karyawan || $result_invent){
        echo '<script type="text/javascript">';
        echo 'alert("DATA KARYAWAN BERHASIL DI-UPDATE");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA KARYAWAN GAGAL DI-UPDATE");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }
}
?>
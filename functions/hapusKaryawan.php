<?php
require_once('db_login.php');

if(isset($_POST['hapusKaryawan'])){
    $id_karyawan = $_POST['id_karyawan'];
    $query_delete_karyawan = "DELETE FROM karyawan
                    WHERE id_karyawan = '$id_karyawan'";
    
    $result_delete_karyawan = $db->query($query_delete_karyawan);
    if (!$result_delete_karyawan) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_delete_karyawan);
    }
    if($result_delete_karyawan){
        echo '<script type="text/javascript">';
        echo 'alert("DATA BERHASIL DIHAPUS");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA GAGAL DIHAPUS");';
        echo 'window.location.href = "../web/customer_karyawan.php";';
        echo '</script>';
    }
}
?>
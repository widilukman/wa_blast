<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['hapusKaryawan'])){
    $nopol_karyawan = $_POST['nopol_karyawan'];
    $id_karyawan = $_POST['id_karyawan'];
    $query_delete_karyawan = "DELETE FROM karyawan
                            WHERE id_karyawan = '$id_karyawan'";
    
    $query_delete_invent = "DELETE FROM invent_kendaraan
                            WHERE nopol = '$nopol_karyawan'";
    
    $result_delete_karyawan = $db->query($query_delete_karyawan);
    $result_delete_invent = $db->query($query_delete_invent);

    if (!$result_delete_karyawan || !$result_delete_karyawan) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_delete_karyawan."
        <br>Could not query the database : <br>".$db->error."<br>Query: ".$query_delete_invent);
    }
    if($result_delete_karyawan || $result_delete_karyawan){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=4"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-4"';
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
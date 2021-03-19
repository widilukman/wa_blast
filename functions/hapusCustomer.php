<?php
session_start(); //insisalisasi session

require_once('db_login.php');

if(isset($_POST['hapusCustomer'])){
    $id_customer = $_POST['id_customer'];
    $query_delete_customer = "DELETE FROM customer
                    WHERE id_customer = '$id_customer'";
    
    $result_delete_customer = $db->query($query_delete_customer);
    if (!$result_delete_customer) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_delete_customer);
    }
    if($result_delete_customer){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=3"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-3"';
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
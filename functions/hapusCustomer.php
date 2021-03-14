<?php
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
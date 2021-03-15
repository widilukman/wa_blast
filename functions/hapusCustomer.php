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
        echo 'window.location.href = "../web/customer_karyawan.php?success=3";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=-3";';
        echo '</script>';
    }
}
?>
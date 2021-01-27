<?php
require_once('db_login.php');

if(isset($_GET['nopol'])){
    $nopol = $_GET['nopol'];

    $query_delete = "DELETE FROM invent_kendaraan
                    WHERE nopol = '$nopol'";
    
    $result_delete = $db->query($query_delete);
    if (!$result_delete) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_delete);
    }
    if($result_delete){
        echo '<script type="text/javascript">';
        echo 'alert("Data BERHASIL dihapus");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("Data GAGAL dihapus");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }
}
?>
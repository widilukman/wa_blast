<?php
require_once('db_login.php');

if(isset($_POST['hapusData'])){
    $nopol = $_POST['nopol'];
    $query_delete = "DELETE FROM invent_kendaraan
                    WHERE nopol = '$nopol'";
    
    $result_delete = $db->query($query_delete);
    if (!$result_delete) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_delete);
    }
    if($result_delete){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=3";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/stnkServis.php?success=-3";';
        echo '</script>';
    }
}
?>
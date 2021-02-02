<?php
require_once('db_login.php');

if(isset($_POST['updateSTNK'])){
    $nopol = $_POST['nopol'];
    $holder = $_POST['holder'];
    $tenggat_1thn = $_POST['tgl_stnk_1_thn'];
    $tenggat_5thn = $_POST['tgl_stnk_5_thn'];

    $query_update_stnk = "UPDATE invent_kendaraan SET
                            holder = '$holder',
                            tgl_stnk_1_thn = '$tenggat_1thn',
                            tgl_stnk_5_thn = '$tenggat_5thn'
                            WHERE nopol = '$nopol'";
    
    $result_stnk = $db->query($query_update_stnk);
    if (!$result_stnk) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_update_stnk);
    }
    if($result_stnk){
        echo '<script type="text/javascript">';
        echo 'alert("DATA BERHASIL DI-UPDATE");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'alert("DATA GAGAL DI-UPDATE");';
        echo 'window.location.href = "../web/stnkServis.php";';
        echo '</script>';
    }
}
?>
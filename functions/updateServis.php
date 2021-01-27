<?php
require_once('db_login.php');

if(isset($_POST['updateServis'])){
    $nopol = $_POST['nopol'];
    $holder = $_POST['holder'];
    $km_terbaru = $_POST['km_terbaru'];
    $km_servis = $_POST['servis_pada_km'];
    $servis_berikutnya = $_POST['tgl_servis_berikutnya'];

    $query_update_servis = "UPDATE invent_kendaraan SET
                            holder = '$holder',
                            km_terbaru = '$km_terbaru',
                            servis_pada_km = '$km_servis',
                            tgl_servis_berikutnya = '$servis_berikutnya'
                            WHERE nopol = '$nopol'";
    
    $result_servis = $db->query($query_update_servis);
    if (!$result_servis) {
        die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_update_servis);
    }
    if($result_servis){
        echo '<script>alert("Data Updated")</script>';
        header("location:../web/stnkServis.php");
    }else{
        echo '<script>alert("Data NOT Updated")</script>';
    }
}
?>
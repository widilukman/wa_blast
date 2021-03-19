<?php
session_start(); //insisalisasi session

#include our login information
require_once('db_login.php');

//UPDATE TEMPLATE UCAPAN DI DATABASE
if(isset($_POST['updateTemplate'])){
    $template_update = $_POST['ucapanUltah'];
    $query_update_template = "UPDATE template SET template_ucapan = '$template_update'";

    $result_update_template = $db->query($query_update_template);
    if($result_update_template && $_SESSION['kode'] == 'G0089'){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/marcomm/kirimUcapan_marcomm.php?success=2";';
        echo '</script>';
    }elseif(!$result_update_template && $_SESSION['kode'] == 'G0089'){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/marcomm/kirimUcapan_marcomm.php?success=-2";';
        echo '</script>';
    }elseif($result_update_template){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/kirimUcapan.php?success=2";';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/kirimUcapan.php?success=-2";';
        echo '</script>';
    }
}

//MENGIRIM PESAN BROADCAST KE SEMUA CUSTOMER
if(isset($_POST['broadcastUcapan'])){
    //QUERY MENGAMBIL DATA CUSTOMER BERULANG TAHUN HARI INI
    $query_cust = "SELECT * FROM customer WHERE DAY(tgl_hut) = DAY(CURRENT_DATE) AND MONTH(tgl_hut) = MONTH(CURRENT_DATE)";
    
    //EKSESKUSI QUERY
    $result_cust = $db->query($query_cust);

    //KIRIM PESAN KE WHATSAPP CUSTOMER
    $tgl_sekarang = new DateTime();
    $i = 1;
    while($row_cust = $result_cust->fetch_object()){
        $ucapan = $_POST['ucapanUltah'];

        //KALKULASI UMUR CUSTOMER
        $umur_cust[$i] = new DateTime($row_cust->tgl_hut);
        $umur[$i] = date_diff($tgl_sekarang, $umur_cust[$i]);

        $ucapan = str_replace("[nama]", $row_cust->nama_customer, $ucapan);
        $ucapan = str_replace("[umur]", $umur[$i]->format("%y"), $ucapan);
        $ucapan = str_replace("[alamat]", $row_cust->alamat, $ucapan);

        //KIRIM PESAN
        $my_apikey = $_POST['selectedApi'];
        $destination[$i] = $row_cust->no_telepon;
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($destination[$i]);
        $message = $ucapan;
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));

        //INSERT PESAN TERKIRIM KE DATABASE
        $query_insert = "INSERT INTO broadcast_ucapan (nama_customer, isi_pesan, no_tujuan)
                        VALUES ('$row_cust->nama_customer', '$ucapan', '$destination[$i]')";
        $result_insert = $db->query($query_insert);
        if(!$result_insert){
            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_insert);
        }
        $i++;
    }
    if($result_cust && $_SESSION['kode'] == 'G0089'){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/marcomm/kirimUcapan_marcomm.php?success=1"';
        echo '</script>';
    }elseif(!$result_cust && $_SESSION['kode'] == 'G0089'){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/marcomm/kirimUcapan_marcomm.php?success=-1"';
        echo '</script>';
    }elseif($result_cust && $_SESSION['kode'] != 'G0089'){
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/kirimUcapan.php?success=1"';
        echo '</script>';
    }else{
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/kirimUcapan.php?success=-1"';
        echo '</script>';
    }
    $result_cust->free();
}
if($_SESSION['kode'] == 'G0089'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/kirimUcapan_marcomm.php"';
    echo '</script>';
}elseif($_SESSION['kode'] == 'G0993' || $_SESSION['kode'] == 'G0139'){
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/marcomm/index_logistik.php"';
    echo '</script>';
}else{
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/kirimUcapan.php"';
    echo '</script>';
}
?>
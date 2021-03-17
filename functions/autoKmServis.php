<?php
#include our login information
require_once('db_login.php');

//QUERY MENGAMBIL DATA KARYAWAN
$query_karyawan = "SELECT * FROM invent_kendaraan 
                    WHERE servis_pada_km - km_terbaru < 1000";

//EKSESKUSI QUERY
$result_karyawan = $db->query($query_karyawan);

//KIRIM PESAN KE WHATSAPP KARYAWAN

$i = 1;
$message = "KM Kendaraan Anda hampir mendekati saatnya servis. Periksa kembali KM servis kendaraan Anda";
while($row_karyawan = $result_karyawan->fetch_object()){
    //KIRIM PESAN
    $my_apikey = "CPDDKYJ3J9ZX59V87YS4";
    $destination.$i = $row_karyawan->no_telp_karyawan;
    $api_url = "http://panel.rapiwha.com/send_message.php";
    $api_url .= "?apikey=" . urlencode($my_apikey);
    $api_url .= "&number=" . urlencode($destination[$i]);
    $api_url .= "&text=" . urlencode($message);
    $my_result_object = json_decode(file_get_contents($api_url, false));

    //INSERT PESAN TERKIRIM KE DATABASE
    $query_insert = "INSERT INTO broadcast_karyawan (nama_karyawan, isi_pesan, no_tujuan)
                    VALUES ('$row_karyawan->nama_karyawan', '$message', '$destination.$i')";
    $result_insert = $db->query($query_insert);
    $i++;
}
$result_karyawan->free();
?>
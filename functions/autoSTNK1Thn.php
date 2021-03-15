<?php
#include our login information
require_once('db_login.php');

//QUERY MENGAMBIL DATA KARYAWAN
$query_karyawan = "SELECT * FROM invent_kendaraan JOIN karyawan ON invent_kendaraan.holder = karyawan.nama_karyawan
                WHERE DATE_ADD(tgl_stnk_1_thn, INTERVAL YEAR(CURDATE())-YEAR(tgl_stnk_1_thn) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(tgl_stnk_1_thn),1,0) YEAR) 
                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";

//EKSESKUSI QUERY
$result_karyawan = $db->query($query_karyawan);

//KIRIM PESAN KE WHATSAPP KARYAWAN

$i = 1;
while($row_karyawan = $result_karyawan->fetch_object()){
    //KIRIM PESAN
    $my_apikey = "CPDDKYJ3J9ZX59V87YS4";
    $destination[$i] = $row_karyawan->no_telp_karyawan;
    $api_url = "http://panel.rapiwha.com/send_message.php";
    $api_url .= "?apikey=" . urlencode($my_apikey);
    $api_url .= "&number=" . urlencode($destination[$i]);
    $message = "STNK kendaraan Anda mendekati tenggat 1 tahun. Periksa kembali STNK anda";
    $api_url .= "&text=" . urlencode($message);
    $my_result_object = json_decode(file_get_contents($api_url, false));

    //INSERT PESAN TERKIRIM KE DATABASE
    $query_insert = "INSERT INTO broadcast_karyawan (nama_karyawan, isi_pesan, no_tujuan)
                    VALUES ('$row_karyawan->nama_karyawan', '$message', '$destination[$i]')";
    $result_insert = $db->query($query_insert);
    $i++;
}
$result_karyawan->free();
?>
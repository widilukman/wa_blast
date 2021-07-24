<?php
#include our login information
require_once('../db_login.php');

//QUERY MENGAMBIL DATA KARYAWAN
$query_karyawan = "SELECT * FROM invent_kendaraan JOIN karyawan ON invent_kendaraan.holder = karyawan.nama_karyawan 
                    WHERE DATE(tgl_stnk_5_thn) = DATE_ADD(DATE(NOW()), INTERVAL 7 DAY)";

//EKSESKUSI QUERY
$result_karyawan = $db->query($query_karyawan);

//KIRIM PESAN KE WHATSAPP KARYAWAN

$i = 1;
while($row_karyawan = $result_karyawan->fetch_object()){
    $message = "Peringatan untuk ".$row_karyawan->holder.", STNK kendaraan Anda dengan nopol ".$row_karyawan->nopol." mendekati tenggat 5 tahun. Segera perbarui STNK Anda.";
    //KIRIM PESAN
    $my_apikey = "CPDDKYJ3J9ZX59V87YS4";
    $destination[$i] = $row_karyawan->no_telp_karyawan;
    $api_url = "http://panel.rapiwha.com/send_message.php";
    $api_url .= "?apikey=" . urlencode($my_apikey);
    $api_url .= "&number=" . urlencode($destination[$i]);
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
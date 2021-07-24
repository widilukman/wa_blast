<?php
#include our login information
require_once('../db_login.php');

//QUERY MENGAMBIL DATA KARYAWAN
//Bagian Supporting  : kirim pesan selama seminggu sejak 3 bulan sebelum tenggat servis
//Bagian Marketing   : kirim pesan selama seminggu sejak 2 bulan sebelum tenggat servis
//Bagian Operasional : kirim pesan selama seminggu sejak 1 bulan sebelum tenggat servis
$query_karyawan = "SELECT * FROM invent_kendaraan JOIN karyawan ON invent_kendaraan.holder = karyawan.nama_karyawan 
                    WHERE (bagian = 'suporting' AND tgl_servis_berikutnya BETWEEN DATE_ADD(NOW(), INTERVAL 83 DAY) AND DATE_ADD(NOW(), INTERVAL 90 DAY))
                    OR (bagian = 'marketing' AND tgl_servis_berikutnya BETWEEN DATE_ADD(NOW(), INTERVAL 53 DAY) AND DATE_ADD(NOW(), INTERVAL 60 DAY)) 
                    OR (bagian = 'operasional' AND tgl_servis_berikutnya BETWEEN DATE_ADD(NOW(), INTERVAL 23 DAY) AND DATE_ADD(NOW(), INTERVAL 30 DAY))";

//EKSESKUSI QUERY
$result_karyawan = $db->query($query_karyawan);

//KIRIM PESAN KE WHATSAPP KARYAWAN

$i = 1;
while($row_karyawan = $result_karyawan->fetch_object()){
    $message = "Peringatan untuk ".$row_karyawan->holder."Kendaraan Anda dengan nopol ".$row_karyawan->nopol." mendekati saatnya servis. Segera servis kendaraan Anda";
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
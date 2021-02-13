<?php
#include our login information
require_once('db_login.php');

//QUERY MENGAMBIL DATA CUSTOMER BERULANG TAHUN HARI INI
$query_cust = "SELECT * FROM customer WHERE DAY(tgl_hut) = DAY(CURRENT_DATE) AND MONTH(tgl_hut) = MONTH(CURRENT_DATE)";
//QUERY MENGAMBIL TEMPLATE UCAPAN
$query_template = "SELECT * FROM template";
//EKSESKUSI QUERY
$result_cust = $db->query($query_cust);
$result_template = $db->query($query_template);

//KIRIM PESAN KE WHATSAPP CUSTOMER
$row_ucapan = $result_template->fetch_object();

$tgl_sekarang = new DateTime();
$i = 1;
while($row_cust = $result_cust->fetch_object()){
    $ucapan = $row_ucapan->template_ucapan;
    //KALKULASI UMUR CUSTOMER
    $umur_cust[$i] = new DateTime($row_cust->tgl_hut);
    $umur[$i] = date_diff($tgl_sekarang, $umur_cust[$i]);

    $ucapan = str_replace("[nama]", $row_cust->nama_customer, $ucapan);
    $ucapan = str_replace("[umur]", $umur[$i]->format("%y"), $ucapan);
    $ucapan = str_replace("[alamat]", $row_cust->alamat, $ucapan);

    //KIRIM PESAN
    $my_apikey = "CPDDKYJ3J9ZX59V87YS4";
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
    $i++;
}
?>
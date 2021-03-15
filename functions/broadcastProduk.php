<?php
#include our login information
require_once('db_login.php');

// UPLOAD FOTO KE DATABASE
if (isset($_POST["uploadProduk"])) {
    $foto = $_FILES['gambarProduk']['name'];
    $foto_temp = $_FILES['gambarProduk']['tmp_name'];
    move_uploaded_file($foto_temp, "../assets/product/$foto");
    $deskripsi = $_POST['deskripsi'];
    #QUERY untuk mengambil data dari customer
    $query_cust = "SELECT * FROM customer";
    #execute query
    $result_cust = $db->query($query_cust);
    if (!$query_cust) {
        die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_cust);
    }
    
    //KIRIM KE WHATSAPP
    $i = 1;
    while($row_cust = $result_cust->fetch_object()){
        $my_apikey = $_POST['selectedApi'];
        $destination[$i] = $row_cust->no_telepon;
        //Pesan Gambar
        $message = "https://n2.sdlcdn.com/imgs/a/a/1/Chromozome_Yamaha_102025_m_1_2x-4ab77.jpg"; //LINK GAMBAR MASIH DARI GOOGLE!!!
        $api_url = "http://panel.rapiwha.com/send_message.php";
        $api_url .= "?apikey=" . urlencode($my_apikey);
        $api_url .= "&number=" . urlencode($destination[$i]);
        $api_url .= "&text=" . urlencode($message);
        $my_result_object = json_decode(file_get_contents($api_url, false));
        //Pesan Text
        $api_url1 = "http://panel.rapiwha.com/send_message.php";
        $api_url1 .= "?apikey=" . urlencode($my_apikey);
        $api_url1 .= "&number=" . urlencode($destination[$i]);
        $message1 = $deskripsi;
        $api_url1 .= "&text=" . urlencode($message1);
        $my_result_object1 = json_decode(file_get_contents($api_url1, false));

        #QUERY untuk INSERT Produk terkirim ke database
        $query = "INSERT INTO broadcast_produk (foto, deskripsi, no_tujuan)
        VALUES ('$foto', '$deskripsi', '$destination[$i]')";
        $result_foto = $db->query($query);
        if(!$result_foto){
            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
        }
        $i++;
    }
    $result_cust->free();
    echo "<br>Result: " . $my_result_object->success;
    echo "<br>Description: " . $my_result_object->description;
    echo "<br>Code: " . $my_result_object->result_code;

    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/uploadProduk.php?succes=1"';
    echo '</script>';
}
echo '<script type="text/javascript">';
echo 'window.location.href = "../web/uploadProduk.php?succes=-1"';
echo '</script>';

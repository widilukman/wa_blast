<?php 
#include our login information
require_once('db_login.php');
#assign a query
$query = " SELECT * FROM setting_wa";
#execute query
$result_api = $db->query($query);
if (!$result_api) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
}
#fetch and display result
$i = 1;
while($row = $result_api->fetch_object()){
    echo '<option value="'.$row->api_key.'">'.$row->api_key.' ('.$row->deskripsi_api.')</option>';
    $i++;
}
$result_api->free();
?>
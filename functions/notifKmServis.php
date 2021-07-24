<!-- PHP TABEL ULTAH DALAM 7 HARI -->
<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_stnk = "SELECT * FROM invent_kendaraan 
                WHERE servis_pada_km - km_terbaru < 1000";
#execute query
$result_stnk = $db->query($query_stnk);
if (!$result_stnk) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_stnk);
}
while ($row_stnk = $result_stnk->fetch_object()) {
    
    echo
    '<tr>
    <td>' . $row_stnk->nopol . '</td>
    <td>' . $row_stnk->holder . '</td>
    <td>' . $row_stnk->km_terbaru . '</td>
    <td>' . $row_stnk->servis_pada_km . '</td>
    </tr>';
}
$result_stnk->free();
?>
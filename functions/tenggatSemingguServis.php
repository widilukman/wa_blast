<!-- PHP TABEL ULTAH DALAM 7 HARI -->
<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_stnk = "SELECT * FROM invent_kendaraan 
                WHERE DATE_ADD(tgl_servis_berikutnya, INTERVAL YEAR(CURDATE())-YEAR(tgl_servis_berikutnya) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(tgl_servis_berikutnya),1,0) YEAR) 
                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
#execute query
$result_stnk = $db->query($query_stnk);
if (!$result_stnk) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_stnk);
}
while ($row_stnk = $result_stnk->fetch_object()) {
    $tgl_servis_berikutnya = new DateTime($row_stnk->tgl_servis_berikutnya);
    $tgl_stnk_5_thn = new DateTime($row_stnk->tgl_stnk_5_thn);
    
    echo
    '<tr>
    <td>' . $row_stnk->nopol . '</td>
    <td>' . $row_stnk->holder . '</td>
    <td>' . date_format($tgl_servis_berikutnya, "d-m-Y") . '</td>
    </tr>';
}
$result_stnk->free();
?>
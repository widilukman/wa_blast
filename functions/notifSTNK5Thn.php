<!-- PHP TABEL STNK 5 TAHUN DALAM 7 HARI -->
<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_stnk = "SELECT * FROM invent_kendaraan 
                WHERE tgl_stnk_5_thn BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 7 DAY)
                ORDER BY tgl_stnk_5_thn ASC";
#execute query
$result_stnk = $db->query($query_stnk);
if (!$result_stnk) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_stnk);
}
while ($row_stnk = $result_stnk->fetch_object()) {
    $tgl_stnk_5_thn = new DateTime($row_stnk->tgl_stnk_5_thn);
    
    echo
    '<tr>
    <td>' . $row_stnk->nopol . '</td>
    <td>' . $row_stnk->holder . '</td>
    <td>' . date_format($tgl_stnk_5_thn, "d-m-Y") . '</td>
    </tr>';
}
$result_stnk->free();
?>
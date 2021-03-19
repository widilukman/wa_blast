<!-- PHP TABEL ULTAH DALAM 7 HARI -->
<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_servis = "SELECT * FROM invent_kendaraan 
                WHERE tgl_servis_berikutnya BETWEEN NOW() AND DATE_ADD(NOW(), INTERVAL 8 DAY)
                ORDER BY DAY(tgl_servis_berikutnya) ASC";
#execute query
$result_servis = $db->query($query_servis);
if (!$result_servis) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_servis);
}
while ($row_servis = $result_servis->fetch_object()) {
    $tgl_servis_berikutnya = new DateTime($row_servis->tgl_servis_berikutnya);
    
    echo
    '<tr>
    <td>' . $row_servis->nopol . '</td>
    <td>' . $row_servis->holder . '</td>
    <td>' . date_format($tgl_servis_berikutnya, "d-m-Y") . '</td>
    </tr>';
}
$result_servis->free();
?>
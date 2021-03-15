<!-- PHP TABEL ULTAH DALAM 7 HARI -->
<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_ultah = "SELECT * FROM customer 
                WHERE DATE_ADD(tgl_hut, INTERVAL YEAR(CURDATE())-YEAR(tgl_hut) + IF(DAYOFYEAR(CURDATE()) > DAYOFYEAR(tgl_hut),1,0) YEAR) 
                BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY)";
#execute query
$result_ultah = $db->query($query_ultah);
if (!$result_ultah) {
    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_ultah);
}
$i = 1;
while ($row_ultah = $result_ultah->fetch_object()) {
    $tgl_hut = new DateTime($row_ultah->tgl_hut);
    
    echo
    '<tr>
    <td style="text-align:center;">' . $i . '.</td>
    <td>' . $row_ultah->nama_customer . '</td>
    <td>' . date_format($tgl_hut, "d-m-Y") . '</td>
    </tr>';
    $i++;
}
$result_ultah->free();
?>
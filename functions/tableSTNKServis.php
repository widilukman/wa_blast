<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_export = "SELECT * FROM invent_kendaraan ORDER BY tgl_servis_berikutnya";
#execute query
$result_export = $db->query($query_export);
if (!$result_export) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_export);
}
#fetch and display result
while ($row = $result_export->fetch_object()) {
    $tgl_stnk_1_thn = new DateTime($row->tgl_stnk_1_thn);
    $tgl_stnk_5_thn = new DateTime($row->tgl_stnk_5_thn);
    $tgl_servis_terakhir = new DateTime($row->tgl_servis_terakhir);
    $tgl_servis_berikutnya = new DateTime($row->tgl_servis_berikutnya);

    echo '<tr>';
    echo '<td>'.$row->nopol.'</td>';
    echo '<td>'.$row->jenis_kendaraan.'</td>';
    echo '<td>'.$row->thn_kendaraan.'</td>';
    echo '<td>'.$row->holder.'</td>';
    echo '<td>'.$row->wilayah.'</td>';
    echo '<td>'.date_format($tgl_stnk_1_thn, "d-m-Y").'</td>';
    echo '<td>'.date_format($tgl_stnk_5_thn, "d-m-Y").'</td>';
    echo '<td>'.date_format($tgl_servis_terakhir, "d-m-Y").'</td>';
    echo '<td>'.$row->servis_ke.'</td>';
    echo '<td>'.$row->km_terbaru.'</td>';
    echo '<td>'.$row->servis_pada_km.'</td>';
    echo '<td>'.date_format($tgl_servis_berikutnya, "d-m-Y").'</td>';
    echo '</tr>';
}

$result_export->free();
?>
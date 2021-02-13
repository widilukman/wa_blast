<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_servis = "SELECT * FROM invent_kendaraan ORDER BY tgl_servis_berikutnya";
#execute query
$result = $db->query($query_servis);
if (!$result) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_servis);
}
#fetch and display result
$tgl_sekarang = new DateTime();
$i = 0;
while ($row = $result->fetch_object()) {
    $tgl_servis_berikutnya[$i] = new DateTime($row->tgl_servis_berikutnya);
    //KALKULASI SERVIS BERIKUTNYA
    $tgl_servis[$i] = new DateTime($row->tgl_servis_berikutnya);
    $selisih_servis[$i] = date_diff($tgl_sekarang,$tgl_servis[$i]);

    echo '<tr>';
    echo '<td>'.$row->nopol.'</td>';
    echo '<td>'.$row->jenis_kendaraan.'</td>';
    echo '<td>'.$row->holder.'</td>';
    echo '<td>'.$row->km_terbaru.'</td>';
    echo '<td>'.$row->servis_pada_km.'</td>';
    echo '<td>'.date_format($tgl_servis[$i], "d-m-Y").'</td>';
    echo '<td>'.date_format($tgl_servis_berikutnya[$i], "d-m-Y").'</td>';
    echo '<td>'.$selisih_servis[$i]->format("%a hari").'</td>';
    echo '<td>
    <button class="btn btn-warning edit-servis" data-toggle="modal"
    data-nopol_servis="'.$row->nopol.'" 
    data-holder_servis="'.$row->holder.'"
    data-km_terbaru="'.$row->km_terbaru.'"
    data-km_servis="'.$row->servis_pada_km.'"
    data-servis_terakhir="'.$row->tgl_servis_terakhir.'"
    data-servis_berikutnya="'.$row->tgl_servis_berikutnya.'"
    data-target="#modal-edit-servis">Edit</button>

    <button class="btn btn-danger hapus"
    data-nopol="'.$row->nopol.'" 
    data-toggle="modal" 
    data-target="#modal-hapus"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '</tr>';
    $i++;
    
}

$result->free();
?>
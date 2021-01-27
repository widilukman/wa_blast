<?php
#include our login information
require_once('db_login.php');
#assign a query
$query = " SELECT * FROM invent_kendaraan";
#execute query
$result = $db->query($query);
if (!$result) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query);
}
#fetch and display result
$tgl_sekarang = new DateTime();
$i = 0;
while ($row = $result->fetch_object()) {
    echo '<tr>';
    echo '<td>'.$row->nopol.'</td>';
    echo '<td>'.$row->jenis_kendaraan.'</td>';
    echo '<td>'.$row->holder.'</td>';
    echo '<td>'.$row->km_terbaru.'</td>';
    echo '<td>'.$row->servis_pada_km.'</td>';
    echo '<td>'.$row->tgl_servis_berikutnya.'</td>';
    $tgl_servis[$i] = new DateTime($row->tgl_servis_berikutnya);
    $selisih_servis[$i] = date_diff($tgl_sekarang,$tgl_servis[$i]);
    echo '<td>'.$selisih_servis[$i]->format("%a hari").'</td>';
    echo '<td>
    <button class="btn btn-warning edit-servis" data-toggle="modal"
    data-nopol="'.$row->nopol.'" 
    data-holder="'.$row->holder.'"
    data-km_terbaru="'.$row->km_terbaru.'"
    data-km_servis="'.$row->servis_pada_km.'"
    data-servis_berikutnya="'.$row->tgl_servis_berikutnya.'"
    data-target="#staticBackdrop">Edit</button>

    <a href="hapusServis.php?nopol='.$row->nopol.'" name="hapus-servis" class="btn btn-danger hapus"><i class="mr-1 fas fa-trash-alt" aria-hidden="true"></i></a>
    </td>';
    echo '<tr>';
    $i++;
    
}

$result->free();
?>
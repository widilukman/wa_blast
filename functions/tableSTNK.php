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
    echo '<td>'.$row->tgl_stnk_1_thn.'</td>';
    $tgl_1thn[$i] = new DateTime($row->tgl_stnk_1_thn);
    $selisih_1thn[$i] = date_diff($tgl_sekarang,$tgl_1thn[$i]);
    echo '<td>'.$selisih_1thn[$i]->format("%a hari").'</td>';
    echo '<td>'.$row->tgl_stnk_5_thn.'</td>';
    $tgl_5thn[$i] = new DateTime($row->tgl_stnk_5_thn);
    $selisih_5thn[$i] = date_diff($tgl_sekarang,$tgl_5thn[$i]);
    echo '<td>'.$selisih_5thn[$i]->format("%a hari").'</td>';
    echo '<td>
    <button class="btn btn-warning edit-stnk" data-toggle="modal"
    data-nopol-stnk="'.$row->nopol.'" 
    data-holder-stnk="'.$row->holder.'"
    data-tgl_1thn="'.$row->tgl_stnk_1_thn.'"
    data-tgl_5thn="'.$row->tgl_stnk_5_thn.'"
    data-target="#modal-edit-stnk">Edit</button>

    <button class="btn btn-danger hapus"
    data-nopol="'.$row->nopol.'" 
    data-toggle="modal" 
    data-target="#modal-hapus"><i class="mr-1 fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '<tr>';
    $i++;
}

$result->free();
?>
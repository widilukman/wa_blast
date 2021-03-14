<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_karyawan = "SELECT * FROM karyawan ORDER BY nama_karyawan";
#execute query
$result_karyawan = $db->query($query_karyawan);
if (!$result_karyawan) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_karyawan);
}
#fetch and display result
while ($row = $result_karyawan->fetch_object()) {
    //QUERY INFO KARYAWAN DI INVENTARIS KENDARAAN
    $query_invent = "SELECT * FROM invent_kendaraan WHERE holder = '$row->nama_karyawan'";
    $result_invent = $db->query($query_invent);
    $row_invent = $result_invent->fetch_object();

    //JIKA KARYAWAN TIDAK MEMEGANG KENDARAAN INVENTARIS
    if($row_invent == NULL){
        $nopol = '';
    }else{
        $nopol = $row_invent->nopol;
    }

    echo '<tr>';
    echo '<td>'.$row->nama_karyawan.'</td>';
    echo '<td>'.$row->no_telp_karyawan.'</td>';
    echo '<td>
    <button class="btn btn-warning edit-karyawan" data-toggle="modal"
    data-nopol="'.$nopol.'"
    data-id_karyawan="'.$row->id_karyawan.'"
    data-nama_karyawan="'.$row->nama_karyawan.'" 
    data-telp_karyawan="'.$row->no_telp_karyawan.'"
    data-target="#modal-edit-karyawan">Edit</button>

    <button class="btn btn-danger hapus-karyawan"
    data-nopol_karyawan="'.$nopol.'"
    data-id_karyawan="'.$row->id_karyawan.'" 
    data-toggle="modal" 
    data-target="#modal-hapus-karyawan"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '</tr>';
}

$result_karyawan->free();
?>
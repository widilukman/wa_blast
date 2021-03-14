<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_servis = "SELECT * FROM invent_kendaraan ORDER BY tgl_servis_berikutnya";
#execute query
$result_servis = $db->query($query_servis);
if (!$result_servis) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_servis);
}
#fetch and display result
$tgl_sekarang = new DateTime();
$i = 0;
while ($row = $result_servis->fetch_object()) {
    //QUERY INFO KARYAWAN
    $query_info = "SELECT * FROM karyawan WHERE nama_karyawan = '$row->holder'";
    $result_info = $db->query($query_info);
    $row_info = $result_info->fetch_object();
    
    //JIKA NAMA HOLDER TIDAK TERDAFTAR DALAM DATA KARYAWAN
    if($row_info == NULL){
        $nama_karyawan = 'Holder Tidak Terdaftar dalam Data Karyawan';
        $telp_karyawan = 'Nomor Telepon Tidak Terdaftar';
    }else{
        $nama_karyawan = $row_info->nama_karyawan;
        $telp_karyawan = $row_info->no_telp_karyawan;
    }

    //KALKULASI SERVIS BERIKUTNYA
    $tgl_servis[$i] = new DateTime($row->tgl_servis_terakhir);
    $tgl_servis_berikutnya[$i] = new DateTime($row->tgl_servis_berikutnya);
    $selisih_servis[$i] = date_diff($tgl_sekarang,$tgl_servis_berikutnya[$i]);

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
    <button class="btn btn-info info-karyawan"
    data-nama_karyawan="'.$nama_karyawan.'"
    data-telp_karyawan="'.$telp_karyawan.'"
    data-toggle="modal"
    data-target="#modal-info-karyawan">
    <i class="fas fa-info mr-1 ml-1"></i></button>

    <button class="btn btn-warning edit-servis" data-toggle="modal"
    data-nopol_servis="'.$row->nopol.'" 
    data-holder_servis="'.$row->holder.'"
    data-servis_ke="'.$row->servis_ke.'"
    data-km_terbaru="'.$row->km_terbaru.'"
    data-km_servis="'.$row->servis_pada_km.'"
    data-servis_terakhir="'.$row->tgl_servis_terakhir.'"
    data-servis_berikutnya="'.$row->tgl_servis_berikutnya.'"
    data-target="#modal-edit-servis">Edit</button>

    <button class="btn btn-danger hapus"
    data-nopol="'.$row->nopol.'" 
    data-toggle="modal" 
    data-target="#modal-hapus">
    <i class="fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '</tr>';
    $i++;
    
}

$result_servis->free();
?>
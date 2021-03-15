<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_stnk = "SELECT * FROM invent_kendaraan ORDER BY tgl_stnk_1_thn";
#execute query
$result_stnk = $db->query($query_stnk);
if (!$result_stnk) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_stnk);
}
#fetch and display result
$tgl_sekarang = new DateTime();
$i = 0;
while ($row = $result_stnk->fetch_object()) {
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

    //KALKULASI TENGGAT STNK 1 TAHUN
    $tgl_1thn[$i] = new DateTime($row->tgl_stnk_1_thn);
    $selisih_1thn[$i] = date_diff($tgl_sekarang,$tgl_1thn[$i]);
    //KALKULASI TENGGAT STNK 5 TAHUN
    $tgl_5thn[$i] = new DateTime($row->tgl_stnk_5_thn);
    $selisih_5thn[$i] = date_diff($tgl_sekarang,$tgl_5thn[$i]);
    
    echo '<tr>';
    echo '<td>'.$row->nopol.'</td>';
    echo '<td>'.$row->jenis_kendaraan.'</td>';
    echo '<td>'.$row->holder.'</td>';
    echo '<td>'.date_format($tgl_1thn[$i], "d-m-Y").'</td>';
    echo '<td>'.$selisih_1thn[$i]->format("%r%a hari").'</td>';
    echo '<td>'.date_format($tgl_5thn[$i], "d-m-Y").'</td>';
    echo '<td>'.$selisih_5thn[$i]->format("%r%a hari").'</td>';
    echo '<td>
    <button class="btn btn-info info-karyawan"
    data-nama_karyawan="'.$nama_karyawan.'"
    data-telp_karyawan="'.$telp_karyawan.'"
    data-toggle="modal"
    data-target="#modal-info-karyawan">
    <i class="fas fa-info mr-1 ml-1"></i></button>

    <button class="btn btn-warning edit-stnk" data-toggle="modal"
    data-nopol-stnk="'.$row->nopol.'" 
    data-holder-stnk="'.$row->holder.'"
    data-tgl_1thn="'.$row->tgl_stnk_1_thn.'"
    data-tgl_5thn="'.$row->tgl_stnk_5_thn.'"
    data-target="#modal-edit-stnk">Edit</button>

    <button class="btn btn-danger hapus"
    data-nopol="'.$row->nopol.'" 
    data-toggle="modal" 
    data-target="#modal-hapus"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '</tr>';
    $i++;
}

$result_stnk->free();
?>
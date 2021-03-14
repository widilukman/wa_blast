<?php
#include our login information
require_once('db_login.php');
#assign a query
$query_customer = "SELECT * FROM customer ORDER BY nama_customer";
#execute query
$result_customer = $db->query($query_customer);
if (!$result_customer) {
    die ("Could not query the database: <br>".$db->error."<br>Query: ".$query_customer);
}
#fetch and display result
while ($row = $result_customer->fetch_object()) {
    $hut_customer = new DateTime($row->tgl_hut);
    echo '<tr>';
    echo '<td>'.$row->nama_customer.'</td>';
    echo '<td>'.$row->no_telepon.'</td>';
    echo '<td>'.$row->alamat.'</td>';
    echo '<td>'.date_format($hut_customer, "d-m-Y").'</td>'; 
    echo '<td>
    <button class="btn btn-warning edit-customer" data-toggle="modal"
    data-id_customer="'.$row->id_customer.'"
    data-nama_customer="'.$row->nama_customer.'" 
    data-telp_customer="'.$row->no_telepon.'"
    data-alamat_customer="'.$row->alamat.'"
    data-tgl_hut="'.$row->tgl_hut.'"
    data-target="#modal-edit-customer">Edit</button>

    <button class="btn btn-danger hapus-customer"
    data-id_customer="'.$row->id_customer.'" 
    data-toggle="modal" 
    data-target="#modal-hapus-customer"><i class="fas fa-trash-alt" aria-hidden="true"></i></button>
    </td>';
    echo '</tr>';
}

$result_customer->free();
?>
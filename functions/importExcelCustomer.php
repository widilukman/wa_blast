<?php
require '../vendor/autoload.php';

?>
<?php
if (isset($_POST['importCustomer'])) {
    $file_extension = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

    if (isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_extension)) {

        $arr_file = explode('.', $_FILES['berkas_excel']['name']);
        $extension = end($arr_file);

        if ('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);

        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        $l = 0;
        for ($i = 1; $i < count($sheetData); $i++) {
            $nama_customer  = $sheetData[$i]['0'];
            $alamat         = $sheetData[$i]['1'];
            $no_telepon     = $sheetData[$i]['2'];
            $tgl_hut        = $sheetData[$i]['3'];
            
            $ada_duplikat = mysqli_query($db, "INSERT INTO customer (nama_customer, alamat, no_telepon, tgl_hut)
                                VALUES ('$nama_customer', '$alamat', '$no_telepon', '$tgl_hut')");
            if(!$ada_duplikat){
                $l++;
            }
        }
        echo '<script type="text/javascript">';
        echo 'window.location.href = "../web/customer_karyawan.php?success=7&duplikat='.$l.'"';
        echo '</script>';
    }
    echo '<script type="text/javascript">';
    echo 'window.location.href = "../web/customer_karyawan.php?success=-7";';
    echo '</script>';
}
?>
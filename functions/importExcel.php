<?php
require '../vendor/autoload.php';

?>
<?php
if (isset($_POST['import'])) {
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
        for ($i = 1; $i < count($sheetData); $i++) {
            $nopol                  = $sheetData[$i]['0'];
            $jenis_kendaraan        = $sheetData[$i]['1'];
            $thn_kendaraan          = $sheetData[$i]['2'];
            $holder                 = $sheetData[$i]['3'];
            $wilayah                = $sheetData[$i]['4'];
            $tgl_stnk_1_thn         = $sheetData[$i]['5'];
            $tgl_stnk_5_thn         = $sheetData[$i]['6'];
            $tgl_servis_terakhir    = $sheetData[$i]['7'];
            $servis_ke              = $sheetData[$i]['8'];
            $tgl_servis_berikutnya  = $sheetData[$i]['9'];
            $km_terbaru             = $sheetData[$i]['10'];
            $servis_pada_km         = $sheetData[$i]['11'];
            mysqli_query($db, "INSERT into invent_kendaraan (nopol, jenis_kendaraan, thn_kendaraan, holder, wilayah, tgl_stnk_1_thn, tgl_stnk_5_thn,
                                            tgl_servis_terakhir, servis_ke, tgl_servis_berikutnya, km_terbaru, servis_pada_km) 
                                VALUES ('$nopol','$jenis_kendaraan','$thn_kendaraan','$holder','$wilayah','$tgl_stnk_1_thn', '$tgl_stnk_5_thn',
                                        '$tgl_servis_terakhir', '$servis_ke', '$tgl_servis_berikutnya', '$km_terbaru', '$servis_pada_km')");
        }
        echo "<b style='color :red;'>Data berhasil diimport!</b>";
    }
}
?>
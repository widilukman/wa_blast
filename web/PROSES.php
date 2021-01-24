<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <fieldset>
        <legend>Form Upload Excel | www.hakkoblogs.com</legend>
        <?php

        include('../functions/db_login.php');
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
                    $nim     = $sheetData[$i]['1'];
                    $nama    = $sheetData[$i]['2'];
                    $ipk     = $sheetData[$i]['3'];
                    $jurusan = $sheetData[$i]['4'];
                    mysqli_query($db, "insert into mahasiswa (id,nim,nama,ipk,jurusan) values ('','$nim','$nama','$ipk','$jurusan')");
                }
                //header("Location: form_upload.html"); 
                echo "<b style='color :red;'>Data berhasil di upload!</b>";
            }
        }
        ?>
        <a href="Data Mahasiswa.xlsx" style="background:yellow; color:green; border:1px;">DOWNLOAD FORMAT EXCEL</a>
        <br /><br />
        <form method="post" enctype="multipart/form-data" action="">
            <div class="form-group">
                <label for="exampleInputFile">File Upload</label>
                <input type="file" name="berkas_excel" class="form-control" id="exampleInputFile">
            </div>
            <input type="submit" class="btn btn-primary" value="Import" name="import" />
        </form>
    </fieldset>
</body>

</html>
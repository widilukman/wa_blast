<?php
include "../functions/db_login.php";
$query1 = "select * from mahasiswa";
$tampil = $db->query($query1);
?>
<a href="PROSES.php" style="background:yellow; color:green; border:1px;">IMPORT DATA DARI EXCEL</a>
<table border="1">
    <thead>
        <tr>
            <th>
                <center>No </center>
            </th>
            <th>
                <center>NIM</center>
            </th>
            <th>
                <center>Nama </center>
            </th>
            <th>
                <center>IPK </center>
            </th>
            <th>
                <center>Jurusan </center>
            </th>
        </tr>
    </thead>
    <?php
    $no = 0;
    while ($data = mysqli_fetch_array($tampil)) {
        $no++; ?>
        <tbody>
            <tr>
                <td>
                    <center><?php echo $no; ?></center>
                </td>
                <td>
                    <center><?php echo $data['nim']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['nama']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['ipk']; ?></center>
                </td>
                <td>
                    <center><?php echo $data['jurusan']; ?></center>
                </td>
            </tr>
        <?php
    }
        ?>
        </tbody>
        </div>
        </div>
        </body>
</table>

</html>
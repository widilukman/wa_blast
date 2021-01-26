<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalServis<?php echo $_POST['nopol'];?>">
                <?php
                #include our login information
                require_once('db_login.php');
                if(isset($_POST['nopol']))
                #assign a query
                $query = " SELECT * FROM invent_kendaraan WHERE nopol = '".$_POST['nopol']."'";
                #execute query
                $result = $db->query($query);
                if (!$result) {
                    die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                }
                #fetch and display result
                $row = mysqli_fetch_array($result);
                    echo '<table>';
                    echo '<tr><td>' . $row['nopol'] . '</td></tr>';
                    echo '<tr><td>' . $row['jenis_kendaraan'] . '</td></tr>';
                    echo '<tr><td>' . $row['holder'] . '</td></tr>';
                    echo '<tr><td>' . $row['km_terbaru'] . '</td></tr>';
                    echo '<tr><td>' . $row['servis_pada_km'] . '</td></tr>';
                    echo '<tr><td>' . $row['tgl_servis_berikutnya'] . '</td></tr>';
                    echo '</table>';

                $result->free();
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>
<table>
    <tr>
        <td></td>
    </tr>
</table>
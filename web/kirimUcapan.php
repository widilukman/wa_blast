<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
} else {
    $nama = $_SESSION['nama'];
}

if($_SESSION['kode'] == 'G0089'){
    header('Location: ./marcomm/index_marcomm.php');
}elseif($_SESSION['kode'] == 'G0993' || $_SESSION['kode'] == 'G0139'){
    header('Location: ./logistik/index_logistik.php');
}
?>
<?php
require_once('../functions/db_login.php');
?>

<?php $title = "Kirim Ucapan | WA Blast"; ?>
<?php include("./templates/header.php"); ?>
<?php include("./templates/sidebar.php"); ?>

<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Kirim Ucapan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kirim Ucapan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <?php 
        if(isset($_GET['success'])){
            echo '<div class="col">';
            switch($_GET['success']){
                case '1':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> ucapan berhasil dikirimkan ke customer<br>';
                    break;
                case '-1':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> ucapan gagal dikirimkan ke customer<br>';
                    break;
                case '2':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> template berhasil di-update<br>';
                    break;
                case '-2':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> template gagal di-update<br>';
                    break;
            }
            echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            echo '</div>';
        }
        ?>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-broadcast-tab" data-toggle="tab" href="#nav-broadcast" role="tab" aria-controls="nav-broadcast" aria-selected="true">Broadcast Ucapan</a>
                        <a class="nav-link" id="nav-ultah-tab" data-toggle="tab" href="#nav-ultah" role="tab" aria-controls="nav-ultah" aria-selected="true">Ultah Hari Ini</a>
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#nav-terkirim" role="tab" aria-controls="nav-terkirim" aria-selected="false">Pesan Terkirim</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-broadcast" role="tabpanel" aria-labelledby="nav-broadcast-tab">
                                <form method="POST" action="../functions/broadcastUcapan.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="setting-wa">
                                            <h4>Setting WA</h4><b>Pilih API KEY :</b>
                                        </label>
                                        <select class="custom-select" name="selectedApi" id="selectApiUltah" onchange="selectApi()">
                                            <?php include('../functions/pilihAPI.php'); ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="ucapanUltah">
                                            <h4>Template Ucapan</h4>
                                        </label>
                                        <p>Contoh : Selamat ulang tahun kepada <b>[nama]</b> yang ke-<b>[umur]</b> di <b>[alamat]</b></p>
                                        <!-- MENGAMBIL TEMPLATE UCAPAN DARI DB -->
                                        <?php
                                        #assign a query
                                        $query_template = "SELECT * FROM template";
                                        #execute query
                                        $result_template = $db->query($query_template);
                                        if (!$result_template) {
                                            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_template);
                                        }
                                        $row_template = $result_template->fetch_object();
                                        ?>
                                        <!-- END MENGAMBIL TEMPLATE UCAPAN DARI DB -->
                                        <textarea class="form-control" name="ucapanUltah" id="ucapanUltah" cols="30" rows="7" required><?= $row_template->template_ucapan; ?></textarea>
                                        <p>Keterangan :
                                            <br><br>nama customer/instansi dituliskan dengan -> [nama]
                                            <br>umur customer/instansi dituliskan dengan -> [umur]
                                            <br>alamat customer/instansi dituliskan dengan -> [alamat]
                                        </p>
                                    </div>
                                    <button type="submit" name="updateTemplate" class="btn btn-warning">Update Template</button>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="broadcastUcapan" class="btn btn-info mt-4">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-ultah" role="tabpanel" aria-labelledby="nav-ultah-tab">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-ultah-sekarang">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 10rem;">Nama</th>
                                                <th style="text-align: center; width: 20rem;">Alamat</th>
                                                <th style="text-align: center; width: 9rem;">No. Telepon</th>
                                                <th style="text-align: center; width: 6rem;">HUT</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            #assign a query
                                            $query_ultah = "SELECT * FROM customer WHERE DAY(tgl_hut) = DAY(CURRENT_DATE) AND MONTH(tgl_hut) = MONTH(CURRENT_DATE)";
                                            #execute query
                                            $result_ultah = $db->query($query_ultah);
                                            if (!$result_ultah) {
                                                die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_ultah);
                                            }
                                            if (mysqli_num_rows($result_ultah) == 0) {
                                                echo '<tr><td colspan="4" style="text-align: center;">Tidak ada yang berulang tahun hari ini</td></tr>';
                                            } else {
                                                while ($row_ultah = $result_ultah->fetch_object()) {
                                                    $hut = new DateTime($row_ultah->tgl_hut);
                                                    echo
                                                    '<tr>
                                                <td>' . $row_ultah->nama_customer . '</td>
                                                <td>' . $row_ultah->alamat . '</td>
                                                <td>' . $row_ultah->no_telepon . '</td>
                                                <td>' . date_format($hut, "d-m-Y") . '</td>
                                                </tr>';
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-terkirim" role="tabpanel" aria-labelledby="nav-terkirim-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="table-layout: fixed;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 10rem;">Nama</th>
                                                <th style="text-align: center; width: 20rem;">Isi Pesan</th>
                                                <th style="text-align: center; width: 9rem;">No. Tujuan</th>
                                                <th style="text-align: center; width: 10rem;">Waktu Kirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            #assign a query
                                            $query_ucapan = " SELECT * FROM broadcast_ucapan
                                                        WHERE DATE(tgl_kirim) = CURRENT_DATE ORDER BY tgl_kirim DESC";
                                            #execute query
                                            $result_ucapan = $db->query($query_ucapan);
                                            if (!$result_ucapan) {
                                                die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query_ucapan);
                                            }
                                            if (mysqli_num_rows($result_ucapan) == 0) {
                                                echo '<tr><td colspan="4" style="text-align: center;">Tidak ada pesan terkirim hari ini</td></tr>';
                                            }
                                            while ($row_terkirim = $result_ucapan->fetch_object()) {
                                                echo
                                                '<tr>
                                                <td>' . $row_terkirim->nama_customer . '</td>
                                                <td style="text-overflow: ellipsis; overflow : hidden; white-space : nowrap; min-width: 15%;">' . $row_terkirim->isi_pesan . '</td>    
                                                <td>' . $row_terkirim->no_tujuan . '</td>
                                                <td>' . $row_terkirim->tgl_kirim . '</td>    
                                            </tr>';
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <!-- script pilih API KEY -->
    <script>
        function selectApi() {
            document.getElementById("selectApiUltah").value;
        }
    </script>

    <?php include("./templates/footer.php"); ?>
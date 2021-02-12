<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
} else {
    $nama = $_SESSION['nama'];
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-ultah-tab" data-toggle="tab" href="#nav-ultah" role="tab" aria-controls="nav-ultah" aria-selected="true">Ultah Hari Ini</a>
                        <a class="nav-link" id="nav-broadcast-tab" data-toggle="tab" href="#nav-broadcast" role="tab" aria-controls="nav-broadcast" aria-selected="true">Broadcast Ucapan</a>
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#nav-terkirim" role="tab" aria-controls="nav-terkirim" aria-selected="false">Pesan Terkirim</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-ultah" role="tabpanel" aria-labelledby="nav-ultah-tab">
                            lorem
                            </div>
                            <div class="tab-pane fade show" id="nav-broadcast" role="tabpanel" aria-labelledby="nav-broadcast-tab">
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
                                        <button type="submit" name="broadcastUcapan" class="btn btn-info col-2 mt-4">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-terkirim" role="tabpanel" aria-labelledby="nav-terkirim-tab">
                                <table class="table table-striped table-bordered" style="table-layout: fixed;">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center; width: 15%;">Foto</th>
                                            <th style="text-align: center;">Isi Pesan</th>
                                            <th style="text-align: center; width: 130px;">NO. Tujuan</th>
                                            <th style="text-align: center; width: 160px;">Waktu Kirim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        #assign a query
                                        $query = " SELECT * FROM broadcast_produk ORDER BY tgl_input_produk DESC";
                                        #execute query
                                        $result_produk = $db->query($query);
                                        if (!$result_produk) {
                                            die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                                        }
                                        while ($row_terkirim = $result_produk->fetch_object()) {
                                            echo
                                            '<tr>
                                                <td style="text-align: center;"><img class="img-fluid" src="../assets/product/' . $row_terkirim->foto . '"></td>
                                                <td style="text-overflow: ellipsis; overflow : hidden; white-space : nowrap; min-width: 15%;">' . $row_terkirim->deskripsi . '</td>    
                                                <td>' . $row_terkirim->no_tujuan . '</td>
                                                <td>' . $row_terkirim->tgl_input_produk . '</td>    
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
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
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
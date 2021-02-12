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

<?php $title = "Upload Produk | WA Blast"; ?>
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
                <h3 class="page-title mb-0 p-0">Upload Produk</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Produk</li>
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
                        <a class="nav-link active" id="nav-broadcast-tab" data-toggle="tab" href="#nav-broadcast" role="tab" aria-controls="nav-broadcast" aria-selected="true">Broadcast Produk</a>
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#nav-terkirim" role="tab" aria-controls="nav-terkirim" aria-selected="false">Pesan Terkirim</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-broadcast" role="tabpanel" aria-labelledby="nav-broadcast-tab">
                                <form method="POST" action="../functions/broadcastProduk.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="setting-wa">
                                            <h4>Setting WA</h4><b>Pilih API KEY :</b>
                                        </label>
                                        <select class="custom-select" name="selectedApi" id="selectApiProduk" onchange="selectApi()">
                                            <?php include('../functions/pilihAPI.php'); ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="fotoCover">
                                            <h4>Upload Foto</h4>
                                        </label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" class="" name="gambarProduk" id="fotoCover" onchange="showPreview(event);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview">
                                        <img class="img-fluid" id="fotoCoverPreview" style="width: 300px;">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="deskripsi">
                                            <h4>Deskripsi</h4>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsiProduk" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="uploadProduk" class="btn btn-info col-2 mt-4">Kirim Pesan</button>
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
                                                <td style="text-align: center;"><img class="img-fluid" src="../assets/product/'.$row_terkirim->foto.'"></td>
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
            document.getElementById("selectApiProduk").value;
        }
    </script>

    <?php include("./templates/footer.php"); ?>
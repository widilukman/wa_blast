<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: ../login.php');
} else {
    $nama = $_SESSION['nama'];
}

if($_SESSION['kode'] == 'G0993' || $_SESSION['kode'] == 'G0139'){
    header('Location: ../logistik/index_logistik.php');
}elseif($_SESSION['kode'] != 'G0089'){
    header('Location: ../index.php');
}
?>

<?php
require_once('../../functions/db_login.php');
?>

<?php $title = "Upload Produk | WA Blast"; ?>
<?php include("./template_marcomm/header.php"); ?>
<?php include("./template_marcomm/sidebar.php"); ?>

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
                            <li class="breadcrumb-item"><a href="index_marcomm.php">Home</a></li>
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
        <?php 
        if(isset($_GET['success'])){
            echo '<div class="col">';
            switch($_GET['success']){
                case '1':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> pesan berhasil dikirimkan ke customer<br>';
                    break;
                case '-1':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> pesan gagal dikirimkan ke customer<br>';
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
                        <a class="nav-link active" id="nav-broadcast-tab" data-toggle="tab" href="#nav-broadcast" role="tab" aria-controls="nav-broadcast" aria-selected="true">Broadcast Produk</a>
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#nav-terkirim" role="tab" aria-controls="nav-terkirim" aria-selected="false">Pesan Terkirim</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-broadcast" role="tabpanel" aria-labelledby="nav-broadcast-tab">
                                <form method="POST" action="../../functions/broadcastProduk.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="setting-wa">
                                            <h4>Setting WA</h4><b>Pilih API KEY :</b>
                                        </label>
                                        <select class="custom-select" name="selectedApi" id="selectApiProduk" onchange="selectApi()">
                                            <?php include('../../functions/pilihAPI.php'); ?>
                                        </select>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="fotoCover">
                                            <h4>Upload Foto</h4>
                                        </label>
                                        <!-- <div class="row">
                                            <div class="col">
                                                <input type="file" class="" name="gambarProduk" id="fotoCover" onchange="showPreview(event);" required>
                                            </div>
                                        </div>
                                        <hr> -->
                                        <div class="row mt-2">
                                            <div class="col">
                                                <label for="linkGambar"><h5>Masukkan Link Gambar</h5></label>
                                                <input type="text" class="form-control" name="linkGambar" id="linkFotoCover" placeholder="contoh : https://..../foto.jpg" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="preview">
                                        <img class="img-fluid" id="fotoCoverPreview" style="width: 300px;">
                                    </div> -->
                                    <hr>
                                    <div class="form-group">
                                        <label for="deskripsi">
                                            <h4>Deskripsi</h4>
                                        </label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsiProduk" cols="30" rows="10" required></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" name="uploadProduk" class="btn btn-info mt-4">Kirim Pesan</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="nav-terkirim" role="tabpanel" aria-labelledby="nav-terkirim-tab">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" style="table-layout: fixed;">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center; width: 5rem;">#</th>
                                                <th style="text-align: center; width: 20rem;">Isi Pesan</th>
                                                <th style="text-align: center; width: 9rem;">No. Tujuan</th>
                                                <th style="text-align: center; width: 10rem;">Waktu Kirim</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            #assign a query
                                            $query = " SELECT * FROM broadcast_produk 
                                                    WHERE DATE(tgl_input_produk) = CURRENT_DATE
                                                    ORDER BY tgl_input_produk DESC";
                                            #execute query
                                            $result_produk = $db->query($query);
                                            if (!$result_produk) {
                                                die("Could not query the database: <br>" . $db->error . "<br>Query: " . $query);
                                            }
                                            if (mysqli_num_rows($result_produk) == 0) {
                                                echo '<tr><td colspan="4" style="text-align: center;">Tidak ada pesan terkirim hari ini</td></tr>';
                                            }
                                            $i = 1;
                                            while ($row_terkirim = $result_produk->fetch_object()) {
                                                echo
                                                '<tr>
                                                <td style="text-align: center;">' . $i . '.</td>
                                                <td style="text-overflow: ellipsis; overflow : hidden; white-space : nowrap; min-width: 15%;">' . $row_terkirim->deskripsi . '</td>    
                                                <td>' . $row_terkirim->no_tujuan . '</td>
                                                <td>' . $row_terkirim->tgl_input_produk . '</td>    
                                            </tr>';
                                            $i++;
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
            document.getElementById("selectApiProduk").value;
        }
    </script>

    <?php include("./template_marcomm/footer.php"); ?>
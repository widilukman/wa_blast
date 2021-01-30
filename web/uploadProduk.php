<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}else{
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
                        <div class="card">
                            <div class="card-body">
                                <form method="" action="">
                                    <div class="form-group">
                                        <label for="fotoCover"><h3>Upload Foto</h3></label>
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" class="" id="fotoCover" onchange="showPreview(event);" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="preview">
                                        <img class="img-fluid" id="fotoCoverPreview" style="width: 300px;">
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="deskripsi"><h3>Deskripsi</h3></label>
                                        <textarea class="form-control" name="deskripsi" id="deskripsiProduk" cols="30" rows="10" required></textarea>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="basic-url"><h3>Link</h3></label>
                                        <input type="text" class="form-control" id="basic-url" placeholder="https://example.com" required>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-info col-2 mt-4">Kirim Pesan</button>
                                    </div>
                                </form>
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
            
<?php include("./templates/footer.php"); ?>
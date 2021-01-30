<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}else{
    $nama = $_SESSION['nama'];
}
?>

<?php $title = "STNK/Servis | WA Blast"; ?>
<?php include("templates/header.php"); ?>
<?php include("templates/sidebar.php"); ?>

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
                        <h3 class="page-title mb-0 p-0">STNK/Servis</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">STNK/Servis</li>
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
                    <div class="col">
                        <div class="d-flex justify-content-end mr-4">
                            <button class="btn btn-info" data-toggle="modal" data-target="#modal-tambah-data">
                            <i class="mr-3 fas fa-plus-circle" aria-hidden="true"></i>Tambah Data</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- column -->
                    <div class="col">
                        <h3>Jatuh Tempo STNK</h3>
                        <div class="card">
                            <div class="card-body" id="card-stnk">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-stnk">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nopol</th>
                                                <th class="border-top-0">Jenis Kendaraan</th>
                                                <th class="border-top-0">Holder</th>
                                                <th class="border-top-0">Tenggat 1 Thn</th>
                                                <th class="border-top-0">Jatuh Hari (1 Thn)</th>
                                                <th class="border-top-0">Tenggat 5 Thn</th>
                                                <th class="border-top-0">Jatuh Hari (5 Thn)</th>
                                                <th class="border-top-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../functions/tableSTNK.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h3>Jatuh Tempo Servis Kendaraan</h3>
                        <div class="card">
                            <div class="card-body" id="card-servis">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-servis">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nopol</th>
                                                <th class="border-top-0">Jenis Kendaraan</th>
                                                <th class="border-top-0">Holder</th>
                                                <th class="border-top-0">KM Terbaru</th>
                                                <th class="border-top-0">Servis pada KM</th>
                                                <th class="border-top-0">Servis Selanjutnya</th>
                                                <th class="border-top-0">Jatuh Hari Servis</th>
                                                <th class="border-top-0">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../functions/tableServis.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- MODAL -->
                        <?php include('../functions/modalTambah.php'); ?>
                        <?php include('../functions/modalSTNK.php'); ?>
                        <?php include('../functions/modalServis.php'); ?>
                        <?php include('../functions/modalHapus.php'); ?>
                        <!-- MODAL -->
                        <hr>
                        <h3>Import ke Database</h3>
                        <div class="card">
                            <div class="card-body">
                                <!-- Form Upload File Excel -->
                                <?php include('../functions/importExcel.php'); ?>
                                <div class="row">
                                    <div class="col-6">
                                    <form method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">
                                                <input type="file" name="berkas_excel" class="" id="importExcel" required>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="submit" name="import" value="import" class="btn btn-info">Import</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                
                                            </div>
                                        </div>
                                    </form>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-secondary"><a href="../assets/file/Template_Excel.xlsx" style="color: whitesmoke;">
                                            <i class="mr-3 fas fa-download" aria-hidden="true"></i>Template Excel</a></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Upload File Excel -->
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
            
<?php include("templates/footer.php"); ?>

<!-- CDN Data Table -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<!-- Data Table -->
<script src="./js/dataTabel.js"></script>
<!-- Script untuk modal -->
<script type="text/javascript" src="./js/modal.js"></script>
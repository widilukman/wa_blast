<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: ../login.php');
} else {
    $nama = $_SESSION['nama'];
}

if($_SESSION['kode'] == 'G0089'){
    header('Location: ../marcomm/index_marcomm.php');
}elseif($_SESSION['kode'] != 'G0139' && $_SESSION['kode'] != 'G0993'){
    header('Location: ../index.php');
}
?>

<?php $title = "STNK/Servis | WA Blast"; ?>
<?php include("./template_logistik/header.php"); ?>
<?php include("./template_logistik/sidebar.php"); ?>

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
                            <li class="breadcrumb-item"><a href="index_logistik.php">Home</a></li>
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
        <?php 
        if(isset($_GET['success'])){
            echo '<div class="col">';
            switch($_GET['success']){
                case '1':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data STNK berhasil di-update<br>';
                    break;
                case '-1':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data STNK gagal di-update<br>';
                    break;
                case '2':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data Servis berhasil di-update<br>';
                    break;
                case '-2':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data Servis gagal di-update<br>';
                    break;
                case '3':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data Kendaraan berhasil dihapus<br>';
                    break;
                case '-3':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data Kendaraan gagal dihapus<br>';
                    break;
                case '4':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data Kendaraan berhasil ditambahkan<br>';
                    break;
                case '-4':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data Kendaraan gagal ditambahkan. Nopol duplikat.<br>';
                    break;
                case '5':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data kendaraan berhasil di-import<br>';
                    break;
                case '-5':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data kendaraan gagal di-import<br>';
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
            <div class="col">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-tambah-data">
                        <i class="mr-3 fas fa-plus-circle" aria-hidden="true"></i>Tambah Data</button>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- column -->
            <div class="col">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-stnk-tab" data-toggle="tab" href="#nav-stnk" role="tab" aria-controls="nav-stnk" aria-selected="true">STNK</a>
                        <a class="nav-link" id="nav-servis-tab" data-toggle="tab" href="#nav-servis" role="tab" aria-controls="nav-servis" aria-selected="true">Servis</a>
                        <a class="nav-link" id="nav-STNKServis-tab" data-toggle="tab" href="#nav-STNKServis" role="tab" aria-controls="nav-STNKServis" aria-selected="true">Export STNK & Servis</a>
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#import-kendaraan" role="tab" aria-controls="nav-terkirim" aria-selected="false">Import Data</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body" id="card-stnk">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-stnk" role="tabpanel" aria-labelledby="nav-stnk-tab">
                                <h3>Jatuh Tempo STNK</h3>
                                <hr>
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
                                                <th class="border-top-0">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../../functions/tableSTNK.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-servis" role="tabpanel" aria-labelledby="nav-servis-tab">
                                <h3>Jatuh Tempo Servis</h3>
                                <hr>
                                <div class="table-responsive" id="card-servis">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-servis">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nopol</th>
                                                <th class="border-top-0">Jenis Kendaraan</th>
                                                <th class="border-top-0">Holder</th>
                                                <th class="border-top-0">KM Terbaru</th>
                                                <th class="border-top-0">KM Servis</th>
                                                <th class="border-top-0">Servis Terakhir</th>
                                                <th class="border-top-0">Servis Selanjutnya</th>
                                                <th class="border-top-0">Jatuh Hari Servis</th>
                                                <th class="border-top-0">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../../functions/tableServis.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- MODAL -->
                            <?php include('./modal/modalTambah.php'); ?>
                            <?php include('./modal/modalInfo.php'); ?>
                            <?php include('./modal/modalEditSTNK.php'); ?>
                            <?php include('./modal/modalEditServis.php'); ?>
                            <?php include('./modal/modalHapus.php'); ?>
                            <!-- MODAL -->
                            <div class="tab-pane fade" id="nav-STNKServis" role="tabpanel" aria-labelledby="nav-STNKServis-tab">
                                <h3>Export Data STNK & Servis</h3>
                                <hr>
                                <div class="table-responsive" id="card-STNKServis">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-STNKServis">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nopol</th>
                                                <th class="border-top-0">Jenis Kendaraan</th>
                                                <th class="border-top-0">Tahun Kendaraan</th>
                                                <th class="border-top-0">Holder</th>
                                                <th class="border-top-0">Wilayah</th>
                                                <th class="border-top-0">Tenggat 1 Thn</th>
                                                <th class="border-top-0">Tenggat 5 Thn</th>
                                                <th class="border-top-0">Tgl Servis Terakhir</th>
                                                <th class="border-top-0">Servis ke-</th>
                                                <th class="border-top-0">KM Terbaru</th>
                                                <th class="border-top-0">KM Servis</th>
                                                <th class="border-top-0">Tgl Servis Selanjutnya</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../../functions/tableSTNKServis.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="import-kendaraan" role="tabpanel" aria-labelledby="import-kendaraan-tab">
                                <h3>Import ke Database</h3>
                                <hr>
                                <!-- Form Upload File Excel -->
                                <?php include('./functions/importExcelKendaraan.php'); ?>
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
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <p class="mt-5">Keterangan : 
                                                    <br><b>Data kendaraan dengan nomor polisi duplikat akan otomatis tidak ter-import</b></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-secondary"><a href="../../assets/file/Template_Inventaris_Kendaraan.xlsx" style="color: whitesmoke;">
                                                    <i class="mr-3 fas fa-download" aria-hidden="true"></i>Template Excel</a></button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Form Upload File Excel -->
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

    <?php include("./template_logistik/footer.php"); ?>
</div>

<!-- Date Format -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>
<script src="https://cdn.datatables.net/plug-ins/1.10.22/sorting/datetime-moment.js"></script>

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
<script src="../js/dataTabel.js"></script>
<!-- Script untuk modal -->
<script type="text/javascript" src="../js/modal.js"></script>
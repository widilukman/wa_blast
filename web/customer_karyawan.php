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

<?php $title = "Customer/Karyawan | WA BLast"; ?>
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
                <h3 class="page-title mb-0 p-0">Customer/Karyawan</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Customer/Karyawan</li>
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
                            <strong>SUKSES!</strong> Data customer berhasil di-update<br>';
                    break;
                case '-1':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data customer gagal di-update<br>';
                    break;
                case '2':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> Data karyawan berhasil di-update<br>';
                    break;
                case '-2':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data karyawan gagal di-update<br>';
                    break;
                case '3':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> Data customer berhasil dihapus<br>';
                    break;
                case '-3':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data customer gagal dihapus<br>';
                    break;
                case '4':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> Data karyawan berhasil dihapus<br>';
                    break;
                case '-4':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data karyawan gagal dihapus<br>';
                    break;
                case '5':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> Data customer berhasil ditambahkan<br>';
                    break;
                case '-5':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data customer gagal ditambahkan<br>';
                    break;
                case '-50':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> No.telepon customer duplikat<br>';
                    break;
                case '6':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> Data karyawan berhasil ditambahkan<br>';
                    break;
                case '-6':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> Data karyawan gagal ditambahkan<br>';
                    break;
                case '-60':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data No. telepon karyawan duplikat<br>';
                    break;
                case '7':
                    echo '<div class="alert alert-success alert-dismissible fade show">
                            <strong>SUKSES!</strong> data customer berhasil di-import<br>';
                    break;
                case '-7':
                    echo '<div class="alert alert-danger alert-dismissible fade show">
                            <strong>GAGAL!</strong> data customer gagal di-import<br>';
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
        <!-- Table -->
        <!-- ============================================================== -->
        <div class="dropdown d-flex justify-content-end">
        <button class="btn btn-info btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="mr-3 fas fa-plus-circle" aria-hidden="true"></i>Tambah Data
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item btn" data-toggle="modal" data-target="#modal-tambah-customer">Data Customer</a>
            <a class="dropdown-item btn" data-toggle="modal" data-target="#modal-tambah-karyawan">Data Karyawan</a>
        </div>
        </div>
        <div class="row">
            <div class="col">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-customer-tab" data-toggle="tab" href="#nav-customer" role="tab" aria-controls="nav-customer" aria-selected="true">Customer</a>
                        <a class="nav-link" id="nav-karyawan-tab" data-toggle="tab" href="#nav-karyawan" role="tab" aria-controls="nav-karyawan" aria-selected="true">Karyawan</a>
                        <a class="nav-link" id="nav-customer-tab" data-toggle="tab" href="#import-customer" role="tab" aria-controls="nav-customer" aria-selected="false">Import Data</a>
                    </div>
                </nav>
                <div class="card">
                    <div class="card-body" id="card-customer">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-customer" role="tabpanel" aria-labelledby="nav-customer-tab">
                                <h3>Data Customer</h3>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-customer">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0">No. Telepon</th>
                                                <th class="border-top-0">Alamat</th>
                                                <th class="border-top-0">HUT</th>
                                                <th class="border-top-0" style="width: 6rem;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../functions/tableCustomer.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-karyawan" role="tabpanel" aria-labelledby="nav-karyawan-tab">
                                <h3>Data Karyawan</h3>
                                <hr>
                                <div class="table-responsive" id="card-karyawan">
                                    <table class="table user-table no-wrap table-striped table-bordered" id="tabel-karyawan">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">Nama</th>
                                                <th class="border-top-0">No. Telepon</th>
                                                <th class="border-top-0" style="width: 6rem;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php include('../functions/tableKaryawan.php'); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- MODAL -->
                            <?php include('./modal/modalEditCustomer.php'); ?>
                            <?php include('./modal/modalEditKaryawan.php'); ?>
                            <?php include('./modal/modalTambahCustomer.php'); ?>
                            <?php include('./modal/modalTambahKaryawan.php'); ?>
                            <?php include('./modal/modalHapusCustomer.php'); ?>
                            <?php include('./modal/modalHapusKaryawan.php'); ?>
                            <!-- MODAL -->
                            <div class="tab-pane fade" id="import-customer" role="tabpanel" aria-labelledby="import-customer-tab">
                                <h3>Import Data Customer</h3>
                                <hr>
                                <!-- Form Upload File Excel -->
                                <?php include('../functions/importExcelCustomer.php'); ?>
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
                                                    <button type="submit" name="importCustomer" value="import" class="btn btn-info">Import</button>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col">
                                                    <p class="mt-5">Keterangan : 
                                                    <br><b>Data customer dengan nomor telepon duplikat akan otomatis tidak ter-import</b></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-6">
                                        <div class="d-flex justify-content-end">
                                            <button class="btn btn-secondary"><a href="../assets/file/Template_Customer.xlsx" style="color: whitesmoke;">
                                                    <i class="mr-3 fas fa-download" aria-hidden="true"></i>Template Excel</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
<?php include("./templates/footer.php"); ?>
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
<script src="./js/dataTabel.js"></script>
<!-- Script untuk modal -->
<script type="text/javascript" src="./js/modal.js"></script>
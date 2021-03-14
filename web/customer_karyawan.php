<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
} else {
    $nama = $_SESSION['nama'];
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
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                        <a class="nav-link" id="nav-terkirim-tab" data-toggle="tab" href="#import-kendaraan" role="tab" aria-controls="nav-terkirim" aria-selected="false">Import Data</a>
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
                            <?php include('modalCustomer.php'); ?>
                            <?php include('modalKaryawan.php'); ?>
                            <?php include('modalTambahCustomer.php'); ?>
                            <?php include('modalTambahKaryawan.php'); ?>
                            <?php include('modalHapusCustomer.php'); ?>
                            <?php include('modalHapusKaryawan.php'); ?>
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

<!-- Script untuk modal -->
<script type="text/javascript" src="./js/modal.js"></script>
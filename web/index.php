<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
} else {
    $nama = $_SESSION['nama'];
}
?>

<?php $title = "Dashboard | WA Blast"; ?>
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
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
        <!-- ============================================================== -->
        <!-- Recent blogss -->
        <!-- ============================================================== -->
        <div class="d-flex justify-content-start">
            <div class="col">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header"><i class="fas fa-calendar-alt mr-3"></i>Tenggat STNK/Servis</div>
                    <div class="card-body">
                        <h5 class="card-title">Tenggat dalam 1 Minggu</h5>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingSTNK">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSTNK" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Tampilkan Data STNK</strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSTNK" class="collapse" aria-labelledby="headingSTNK" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Tenggat 1thn</th>
                                                    <th>Tenggat 5thn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/tenggatSemingguSTNK.php'); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-header" id="headingServis">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseServis" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Tampilkan Data Servis</strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseServis" class="collapse" aria-labelledby="headingServis" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Tenggat Servis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/tenggatSemingguServis.php'); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header"><i class="fas fa-birthday-cake mr-3"></i>HUT Customer</div>
                    <div class="card-body">
                        <h5 class="card-title">HUT dalam 1 Minggu</h5>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <strong>Tampilkan Data Customer</strong>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <table class="table user-table no-wrap table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Ulang Tahun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php include('../functions/ultahSeminggu.php'); ?>
                                                </tbody>
                                            </table>
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
        <!-- Recent blogss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

    <?php include("./templates/footer.php"); ?>
</div>
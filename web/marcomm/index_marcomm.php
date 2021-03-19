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
<?php $title = "Dashboard | WA Blast"; ?>
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
                <h3 class="page-title mb-0 p-0">Dashboard</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index_marcomm.php">Home</a></li>
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
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header"><i class="fas fa-birthday-cake mr-3"></i>Reminder HUT Customer</div>
                    <div class="card-body">
                        <h5 class="card-title">HUT dalam 1 Minggu</h5>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingHUT">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseHUT" aria-expanded="true" aria-controls="collapseHUT">
                                            <strong>Data HUT Customer
                                            <span class="badge badge-danger" id="badgeHUT" style="float: right;">0</span></strong>
                                        </button>
                                    </h2>
                                    <div id="collapseHUT" class="collapse" aria-labelledby="headingHUT" data-parent="#accordionExample">
                                        <div class="table-responsive card-body">
                                            <table class="table user-table no-wrap table-striped table-bordered" id="tableHUT">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>Tanggal Ulang Tahun</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php include('../../functions/semingguUltah.php'); ?>
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
    </div>
    <!-- ============================================================== -->
    <!-- Recent blogss -->
    <!-- ============================================================== -->
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php include("./template_marcomm/footer.php"); ?>
</div>
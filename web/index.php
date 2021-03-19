<?php
session_start(); //insisalisasi session
if (!isset($_SESSION['nama'])) {
    header('Location: login.php');
}

if($_SESSION['kode'] == 'G0089'){
    header('Location: ./marcomm/index_marcomm.php');
}elseif($_SESSION['kode'] == 'G0993' || $_SESSION['kode'] == 'G0139'){
    header('Location: ./logistik/index_logistik.php');
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
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
            <div class="col-sm">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header"><i class="fas fa-calendar-alt mr-3"></i>Reminder STNK</div>
                    <div class="card-body">
                        <h5 class="card-title">Tenggat dalam 1 Minggu</h5>
                        <div class="accordion" id="accordionSTNK">
                            <div class="card">
                                <div class="card-header" id="headingSTNK1Thn">
                                    <h2 class="mb-0">
                                        <button class="btn btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSTNK1Thn" aria-expanded="true" aria-controls="collapseSTNK1Thn">
                                            <strong>STNK 1 Tahun
                                            <span class="badge badge-danger" id="badgeSTNK1Thn" style="float: right;">0</span></strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSTNK1Thn" class="collapse" aria-labelledby="headingSTNK1Thn" data-parent="#accordionSTNK">
                                    <div class="table-responsive card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered" id="tableSTNK1Thn">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Tenggat 1thn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/semingguSTNK1Thn.php'); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-header" id="headingSTNK5Thn">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseSTNK5Thn" aria-expanded="true" aria-controls="collapseSTNK5Thn">
                                            <strong>STNK 5 Tahun
                                            <span class="badge badge-danger" id="badgeSTNK5Thn" style="float: right;">0</span></strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseSTNK5Thn" class="collapse" aria-labelledby="headingSTNK5Thn" data-parent="#accordionSTNK">
                                    <div class="table-responsive card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered" id="tableSTNK5Thn">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Tenggat 5thn</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/semingguSTNK5Thn.php'); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header"><i class="fas fa-wrench mr-3"></i>Reminder Servis</div>
                    <div class="card-body">
                        <h5 class="card-title">Tenggat dalam 1 Minggu & KM Servis</h5>
                        <div class="accordion" id="accordionServis">
                            <div class="card">
                                <div class="card-header" id="headingTglServis">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseTglServis" aria-expanded="true" aria-controls="collapseTglServis">
                                            <strong>Tenggat Servis
                                            <span class="badge badge-danger" id="badgeTglServis" style="float: right;">0</span></strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseTglServis" class="collapse" aria-labelledby="headingTglServis" data-parent="#accordionServis">
                                    <div class="table-responsive card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered" id="tableTglServis">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Tenggat Servis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/semingguServis.php'); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-header" id="headingKmServis">
                                    <h2 class="mb-0">
                                        <button class="btn  btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseKmServis" aria-expanded="true" aria-controls="collapseKmServis">
                                            <strong>Km Servis
                                            <span class="badge badge-danger" id="badgeKmServis" style="float: right;">0</span></strong>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseKmServis" class="collapse" aria-labelledby="headingKmServis" data-parent="#accordionServis">
                                    <div class="table-responsive card-body">
                                        <table class="table user-table no-wrap table-striped table-bordered" id="tableKmServis">
                                            <thead>
                                                <tr>
                                                    <th>Nopol</th>
                                                    <th>Holder</th>
                                                    <th>Km Terbaru</th>
                                                    <th>Km Servis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php include('../functions/kmServis.php'); ?>
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
                                                    <?php include('../functions/semingguUltah.php'); ?>
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
<!-- End Container fluid  -->
<!-- ============================================================== -->

<?php include("./templates/footer.php"); ?>
</div>
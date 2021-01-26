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
                    <!-- column -->
                    <div class="col">
                        <h3>Jatuh Tempo STNK</h3>
                        <div class="card">
                            <div class="card-body" id="cardSTNK">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped" id="TableSTNK">
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
                            <div class="card-body" id="cardServis">
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap table-striped" id="tabelServis">
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
                        <?php include('../functions/modalServis.php'); ?>
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

<!-- Script untuk modal -->
<?php include("js/modal.js"); ?>
            
<?php include("templates/footer.php"); ?>
<?php include("templates/scriptTable.php"); ?>
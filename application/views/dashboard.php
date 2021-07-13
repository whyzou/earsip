<title><?= $title; ?></title>
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <strong class="card-title text-primary">Dashboard</strong>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('edit'); ?>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="dashSM">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <a href="<?= base_url('surat_masuk') ?>" class="stretched-link" style="text-decoration:none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Data Surat Masuk</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['surat_masuk'] ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="dashSK">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <a href="<?= base_url('surat_keluar') ?>" class="stretched-link" style="text-decoration:none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Data Surat Keluar</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['surat_keluar'] ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-paper-plane fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="dashPerusahaan">
                    <div class="card border-left-success shadow h-100 py-2">
                        <a href="<?= base_url('perusahaan') ?>" class="stretched-link" style="text-decoration:none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Data Perusahaan</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['perusahaan'] ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-building fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>



                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4" id="dashPengelola">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <a href="<?= base_url('user') ?>" class="stretched-link" style="text-decoration:none">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Data Pengelola</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dashboard['user'] - 1 ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
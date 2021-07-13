<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="z-index:1031" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
                <div class="sidebar-brand-icon w-25">
                    <span style="display: inline-block;">
                        <img class="w-100" src="<?= base_url() ?>assets/img/logo.svg" alt="judul">
                    </span>
                </div>
                <div class="sidebar-brand-text mx-3">E-Arsip</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Page Dashboard-->
            <li class="nav-item <?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>" id="menuDashboard">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Nav Item - Page Surat-->
            <li class="nav-item <?= $this->uri->segment(1) == 'surat' ? 'active' : '' ?>" id="menuSurat">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat</span>
                </a>
                <div id="collapseSurat" class="collapse collapse <?= $this->uri->segment(1) == 'surat_masuk' || $this->uri->segment(1) == 'surat_keluar'  ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $this->uri->segment(1) == 'surat_masuk' ? 'active' : '' ?>" href="<?= base_url('surat_masuk') ?>">Surat Masuk</a>
                        <a class="collapse-item <?= $this->uri->segment(1) == 'surat_keluar' ? 'active' : '' ?>" href="<?= base_url('surat_keluar') ?>">Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Page Rekap -->
            <li class="nav-item" id="menuAdmin">
                <a class="nav-link collapsed <?= $this->uri->segment(1) == 'admin' ? 'active' : '' ?>" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Admin</span>
                </a>
                <div id="collapseAdmin" class="collapse <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'perusahaan'  ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>" href="<?= base_url('user') ?>">User</a>
                        <a class="collapse-item <?= $this->uri->segment(1) == 'perusahaan' ? 'active' : '' ?>" href="<?= base_url('perusahaan') ?>">Perusahaan</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav mr-auto">
                        <h2><?= $this->session->userdata('perusahaan') ?></h2>
                    </ul>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>upload/user/<?php echo $this->session->userdata('profil') ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('user/profil') ?>" data-toggle="modal" data-target="#profilModal">
                                    <i class=" fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="<?= base_url('') ?>" data-toggle="modal" data-target="#settingsModal">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Setting Profil
                                </a>
                                <a class="dropdown-item" href="<?= base_url('') ?>" data-toggle="" data-target="#" target="_blank">
                                <i class="fas fa-file-invoice fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Documentation
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('auth/getLogin') ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() . 'dashboard' ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">LCC</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php if ($this->uri->segment(1) == "dashboard") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Transaksi
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(1) == "pemesanan") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>pemesanan">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Pemesanan</span></a>
        </li>
        <li class="nav-item <?php if ($this->uri->segment(1) == "transaksi") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href=" <?= base_url() ?>transaksi">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Transaksi</span></a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Master
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php if ($this->uri->segment(1) === "barang") {
                                echo "active";
                            } else if ($this->uri->segment(1) === "kategori") {
                                echo "active";
                            } else if ($this->uri->segment(1) === "merk") {
                                echo "active";
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Barang</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Login Screens:</h6>
                    <a class="collapse-item" href="<?= base_url() ?>kategori">Kategori Barang</a>
                    <a class=" collapse-item" href="<?= base_url() ?>merk">Merk Barang</a>
                    <a class=" collapse-item" href="<?= base_url() ?>barang"">Daftar Barang</a>
                </div>
            </div>
        </li>
        <li class=" nav-item <?php if ($this->uri->segment(1) === "jabatan") {
                                    echo "active";
                                } else if ($this->uri->segment(1) === "pegawai") {
                                    echo "active";
                                } ?>">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fas fa-fw fa-folder"></i>
                            <span>Pegawai</span>
                        </a>
                        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Login Screens:</h6>
                                <a class="collapse-item" href="<?= base_url() ?>jabatan">Daftar Jabatan</a>
                                <a class=" collapse-item" href="<?= base_url() ?>pegawai">Daftar Pegawai</a>
                            </div>
                        </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item <?php if ($this->uri->segment(1) == "pelanggan") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>pelanggan">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Pelanggan</span></a>
        </li>
        <li class="nav-item <?php if ($this->uri->segment(1) == "akun") {
                                echo "active";
                            } ?>">
            <a class="nav-link" href="<?= base_url() ?>akun ">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Akun</span></a>
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

            <!-- Content -->

            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata("nama"); ?></span>
                            <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                            <a class="dropdown-item" href="<?php echo base_url() . 'welcome/logout'; ?>">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
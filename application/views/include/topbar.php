<!-- topbar -->
<header class="mb-5 shadow">
    <div class="header-top">
        <div class="container">
            <!-- logo website -->
            <div class="logo">
                <a href=""><img src="<?php echo base_url() ?>assets/images/logo/logo.svg" alt="Logo"></a>
            </div>

            <div class="header-top-right">
                <!-- burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none mx-3 ">
                    <i class="bi bi-justify fs-3"></i>
                </a>
                <!-- dropdown menu -->
                <div class="dropdown">
                    <a href="#" id="topbarUserDropdown" class="user-dropdown d-flex align-items-center dropend dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2">
                            <!-- Logo profile account -->
                            <img src="<?php echo base_url() ?>assets/images/faces/1.jpg" alt="Avatar">
                        </div>
                        <div class="text">
                            <!-- GET name profile  -->
                            <h6 class="user-dropdown-name d-none d-xl-block d-xxl-none"><?php echo $this->session->userdata('name'); ?></h6>
                            <!-- GET access user -->
                            <p class="user-dropdown-status text-sm text-muted d-none d-xl-block d-xxl-none "><?php echo $this->session->userdata('access'); ?></p>

                        </div>
                    </a>
                    <!-- toggle theme dark/light -->
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="topbarUserDropdown">
                        <li>
                            <div class="theme-toggle d-flex gap-2  align-items-center  dropdown-item ">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                    <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                        <g transform="translate(-210 -1)">
                                            <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                            <circle cx="220.5" cy="11.5" r="4"></circle>
                                            <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2"></path>
                                        </g>
                                    </g>
                                </svg>
                                <div class="form-check form-switch fs-6">
                                    <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                    <label class="form-check-label"></label>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z"></path>
                                </svg>
                            </div>
                        </li>
                        <li>
                            <!-- profile dropdown-menu -->
                            <a class="dropdown-item" href="#">Profile</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <!-- button logout -->
                            <button data-toggle="modal" data-target="#logout" class="dropdown-item">Logout</button>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>

    <!-- navbar -->
    <nav class="main-navbar">
        <div class="container">
            <!-- access menu admin -->
            <?php if ($this->session->userdata('access') == 'Admin') : ?>
                <ul>
                    <!-- Dashboard menu admin -->
                    <li class="menu-item">
                        <a href="<?php echo base_url() ?>dashboard" class='menu-link'>
                            <i class="bi bi-house-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <!-- transaksi menu admin -->
                    <li class="menu-item  has-sub">
                        <a class='menu-link'>
                            <i class="bi bi-basket2-fill"></i>
                            <span>Transaksi</span>
                        </a>
                        <div class="submenu ">
                            <!-- sub-menu -->
                            <div class="submenu-group-wrapper">
                                <ul class="submenu-group">
                                    <!-- sub-menu peminjaman-->
                                    <li class="submenu-item">
                                        <a href="<?php echo base_url() ?>peminjaman" class='submenu-link'> Peminjaman</a>
                                    </li>
                                    <!-- sub-menu pengembalian-->
                                    <li class="submenu-item">
                                        <a href="<?php echo base_url() ?>pengembalian" class='submenu-link'>Pengembalian</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- Data Master menu admin-->
                    <li class="menu-item  has-sub">
                        <a class='menu-link'>
                            <i class="bi bi-bookmark-star-fill"></i>
                            <span>Data Master</span>
                        </a>
                        <div class="submenu ">
                            <!-- sub-menu -->
                            <div class="submenu-group-wrapper">
                                <ul class="submenu-group">
                                    <!-- sub-menu data-member -->
                                    <li class="submenu-item  ">
                                        <a href="<?php echo base_url() ?>member" class='submenu-link'>Data Member</a>
                                    </li>
                                    <!-- sub-menu data-buku -->
                                    <li class="submenu-item  ">
                                        <a href="<?php echo base_url() ?>buku" class='submenu-link'>Data Buku</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </li>

                    <!-- Laporan menu admin-->
                    <li class="menu-item  has-sub">
                        <a class='menu-link'>
                            <i class="bi bi-clipboard2-data-fill"></i>
                            <span>Laporan</span>
                        </a>
                        <div class="submenu ">
                            <!-- sub-menu -->
                            <div class="submenu-group-wrapper">
                                <ul class="submenu-group">
                                    <!-- sub-menu laporan-peminjaman -->
                                    <li class="submenu-item  ">
                                        <a href="<?php echo base_url() ?>laporan/peminjaman" class='submenu-link'>Peminjaman</a>
                                    </li>
                                    <!-- sub-menu laporan-pengembalian -->
                                    <li class="submenu-item  ">
                                        <a href="<?php echo base_url() ?>laporan/pengembalian" class='submenu-link'>Pengembalian</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- access menu member -->
            <?php else : ?>
                <ul>
                    <!-- Dashboard menu member -->
                    <li class="menu-item  ">
                        <a href="<?php echo base_url() ?>dashboard" class='menu-link'>
                            <i class="bi bi-house-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                <?php endif; ?>
                </ul>
        </div>
    </nav>
</header>

<!-- Logout Modal-->
<div class="modal modal-fade py-5" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body p-4">
                <h5 class="mb-0">Apakah kamu yakin ingin keluar?</h5>
            </div>
            <div class="modal-footer flex-nowrap p-0">
                <a class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-dismiss="modal">
                    TIDAK
                </a>
                <a href="<?php echo base_url() ?>login/logout" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">
                    <span>YA</span>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
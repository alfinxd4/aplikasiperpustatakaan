<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rekayasatu</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/app-theme.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main/app-dark-theme.css">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/pages/simple-datatables.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/vendor/fontawesome/css/all.min.css">
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <!-- include topbar menu -->
            <?php $this->load->view('include/topbar'); ?>
            <!-- Main Page Dashboard  -->
            <div class="content-wrapper container">
                <!-- Page Heading -->
                <div class="page-heading ">
                    <div class="page-title mb-4">
                        <div class="row">
                            <!-- title page -->
                            <div class="col-12 col-md-6 order-md-1 order-last">
                                <h3>Peminjaman Buku</h3>
                            </div>
                            <!-- breadcumb page -->
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Transaksi</li>
                                        <li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- main content -->
                <div class="page-content ">
                    <!-- alert success add data -->
                    <?php echo $this->session->flashdata('success') ?>
                    <!-- alert success update data -->
                    <!-- section data transaksi -->
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <!-- title div -->
                                    <div class="card-header">
                                        <h4 class="card-title">Data Transaksi</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <span class="text-danger">*Waktu Peminjaman Buku Maksimal 7 Hari</span>
                                            </div>
                                            <!-- form add  [connect to controller peminjaman function simpan]-->
                                            <form class="form-horizontal" action="<?php echo site_url('peminjaman/add'); ?>" method="post">
                                                <div class="row">
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <!-- field input kode_transaksi -->
                                                            <label for="kode_transaksi" class="form-label">ID Transaksi :</label>
                                                            <input type="text" id="kode_transaksi" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="kode_transaksi" value="<?php echo $autonumber ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <!--  field input tgl_pinjam -->
                                                            <label for="tgl_pinjam" class="form-label">Tanggal Pinjam :</label>
                                                            <input type="date" id="tgl_pinjam" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="tgl_pinjam" value="<?php echo $tglpinjam; ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <!-- field input tgl_kembali -->
                                                            <label for="tgl_kembali" class="form-label">Tanggal Kembali :</label>
                                                            <input type="date" id="tgl_kembali" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="tgl_kembali" value="<?php echo $tglkembali; ?>" readonly="readonly">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <!-- selection field kode_member -->
                                                            <label for="kode_member" class="form-label">ID Member :</label>
                                                            <select class="form-control" name="kode_member" id="kode_member">
                                                                <!-- get data array from db member tb kode_member -->
                                                                <option selected>-- Pilih ID Member --</option>
                                                                <?php
                                                                foreach ($member->result() as $row) :
                                                                ?>
                                                                    <option value="<?php echo $row->kode_member; ?>">
                                                                        <?php echo $row->kode_member; ?>
                                                                    </option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-12">
                                                        <div class="form-group">
                                                            <!-- field input nama_member -->
                                                            <label for="nama" class="form-label">Nama Member :</label>
                                                            <input type="text" id="nama" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="nama" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- section data buku -->
                    <section id="multiple-column-form">
                        <div class="row match-height">
                            <div class="col-12">
                                <div class="card">
                                    <!-- title div -->
                                    <div class="card-header">
                                        <h4 class="card-title">Data Buku</h4>
                                    </div>
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <!-- selection field kode_buku -->
                                                        <label for="kode_buku" class="form-label">ID Buku :</label>
                                                        <select class="form-control" name="kode_buku" id="kode_buku">
                                                            <!-- get data array from db buku tb kode_buku-->
                                                            <option selected>-- Pilih ID Buku --</option>
                                                            <?php
                                                            foreach ($buku->result() as $row) :
                                                            ?>
                                                                <option value="<?php echo $row->kode_buku; ?>">
                                                                    <?php echo $row->kode_buku; ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <!-- automatic selection judul_buku -->
                                                        <label for="judul" class="form-label">Judul Buku :</label>
                                                        <input type="text" id="judul" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="judul" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-12">
                                                    <div class="form-group">
                                                        <!-- automatic selection pengarang -->
                                                        <label for="pengarang" class="form-label">Pengarang :</label>
                                                        <input type="text" id="pengarang" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="pengarang" disabled>
                                                    </div>
                                                </div>
                                                <input type="text" id="status" class="form-control" name="status" value="N" hidden>
                                                <div class="col-12 d-flex justify-content-end mt-4">
                                                    <!-- button submit -->
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">SIMPAN</button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- include footer  -->
            <?php $this->load->view('include/footer'); ?>
        </div>
        <!-- Bootstrap main page Javascript -->
        <script src="assets/js/bootstrap.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="assets/js/pages/horizontal-layout.js"></script>
        <!--  Datatables Javascript -->
        <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
        <script src="assets/js/pages/simple-datatables.js"></script>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
        <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
        <!-- custom script -->
        <script>
            // auto close alert
            $(document).ready(function() {

                window.setTimeout(function() {
                    $(".alert").fadeTo(150, 0).slideUp(150, function() {
                        $(this).remove();
                    });
                }, 5000);

                //get data member by kode member
                $("#kode_member").change(function() {
                    var kode_member = $("#kode_member").val();

                    $.ajax({
                        url: "<?php echo site_url('peminjaman/search_member'); ?>",
                        type: "POST",
                        data: "kode_member=" + kode_member,
                        cache: false,
                        success: function(html) {
                            $("#nama").val(html);

                        }
                    })
                });

                //get data buku by kode buku
                $("#kode_buku").change(function() {
                    var kode_buku = $("#kode_buku").val();

                    $.ajax({
                        url: "<?php echo site_url('peminjaman/search_book'); ?>",
                        type: "POST",
                        data: "kode_buku=" + kode_buku,
                        cache: false,
                        success: function(data) {
                            var json = data,
                                obj = JSON.parse(json);
                            $('#judul').val(obj.judul);
                            $('#pengarang').val(obj.pengarang);

                        }
                    })
                });
            });
        </script>
</body>

</html>
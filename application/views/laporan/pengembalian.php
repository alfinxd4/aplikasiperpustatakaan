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
                                <h3>Laporan Pengembalian Buku</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Laporan</li>
                                        <li class="breadcrumb-item active" aria-current="page">Pengembalian</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="page-content ">
                        <!--Data Table-->
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label class="form-label">Tanggal Awal :</label>
                                            <input type="date" id="tanggal1" class="form-control">
                                        </div>

                                        <div class="col-md-6  mt-3 mt-md-0">
                                            <label class="form-label">Tanggal Akhir :</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <input type="date" id="tanggal2" class="form-control">
                                                </div>
                                                <div class="col-md-2 mt-3 mt-md-0">
                                                    <button id="tampilkan" class="btn btn-primary">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-body" id="tampil">

                                </div>


                            </div>
                    </div>
                    </section>
                </div>

            </div>

        </div>
        <!-- include footer  -->
        <?php $this->load->view('include/footer'); ?>
    </div>

    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/horizontal-layout.js"></script>



    <!-- Bootstrap core JavaScript-->
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>


    <script>
        $(document).ready(function() {

            $("#tampilkan").click(function() {
                var tanggal1 = $("#tanggal1").val();
                var tanggal2 = $("#tanggal2").val();

                if (tanggal1 == "") {
                    alert("Silahkan isi periode tanggal awal")
                    $("#tanggal1").focus();
                    return false;
                } else if (tanggal2 == "") {
                    alert("Silahkan isi periode tanggal akhir")
                    $("#tanggal2").focus();
                    return false;
                } else {
                    $.ajax({
                        url: "<?php echo site_url('laporan/data_pengembalian'); ?>",
                        type: "POST",
                        data: "tanggal1=" + tanggal1 + "&tanggal2=" + tanggal2,
                        cache: false,
                        success: function(html) {
                            $("#tampil").html(html);
                        }
                    })
                }
            });
        });
    </script>

</body>

</html>
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
                                <h3>Data Buku</h3>
                            </div>
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Data Master</li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="page-content ">
                        <?php echo $this->session->flashdata('success') ?>
                        <!--Data Table-->
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatables master data buku -->
                                    <table class="table table-bordered " id="table1">
                                        <!-- if user == member -->
                                        <?php if ($this->session->userdata('access') == 'Admin') : ?>
                                            <div class="d-flex flex-row">
                                                <div class="p-2">
                                                    <div class="col">
                                                        <!-- Button add -->
                                                        <button type=" button" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#addBk">
                                                            <span class="icon text-white-50">
                                                                <i class="fa-solid fa-file-circle-plus"></i>
                                                            </span>
                                                            <span class="text">Tambah Buku </span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="p-2">
                                                    <div class="col">
                                                        <!-- Button Export PDF -->
                                                        <a class="btn btn-danger btn-icon-split mb-3 " href="<?php echo base_url("buku/exportpdf"); ?>">
                                                            <span class="icon text-white-50">
                                                                <i class="fa-solid fa-file-circle-plus"></i>
                                                            </span>
                                                            <span class="text">Export PDF </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="p-2">
                                                    <div class="col">
                                                        <!-- Button Export Excel -->
                                                        <a class="btn btn-success btn-icon-split mb-3" href="<?php echo base_url("buku/exportexcel"); ?>">
                                                            <span class="icon text-white-50">
                                                                <i class="fa-solid fa-file-circle-plus"></i>
                                                            </span>
                                                            <span class="text">Export Excel </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle text-center">No.</th>
                                                <th rowspan="2" class="align-middle text-center">Foto </th>
                                                <th rowspan="2" class="align-middle text-center">ID </th>
                                                <th rowspan="2" class="align-middle text-center">Judul Buku </th>
                                                <th rowspan="2" class="align-middle text-center">Pengarang</th>
                                                <th colspan="3" class="align-middle text-center ">Kelola</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">Detail</th>
                                                <th class="text-center">Update</th>
                                                <th class="text-center">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            // get data from tb buku, connect to controller buku
                                            foreach ($buku->result() as $row) :
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo $count; ?></td>
                                                    <td class="text-center align-middle"><img src="<?= base_url() . 'upload/' . $row->foto_buku; ?>" width="70"></td>
                                                    <td class="text-center align-middle"><?php echo $row->kode_buku; ?></td>
                                                    <td class="align-middle"><?php echo $row->judul; ?></td>
                                                    <td class="text-center align-middle"><?php echo $row->pengarang; ?></td>
                                                    <!-- button printview -->
                                                    <td class="text-center align-middle">
                                                        <a class="btn" class="btn btn-danger" data-toggle="modal" data-target="#printBk<?php echo $row->kode_buku; ?>">
                                                            <i class="fa-solid fa-eye text-primary"></i>
                                                        </a>
                                                    </td>
                                                    <!-- button edit -->
                                                    <td class="text-center align-middle">
                                                        <a class="btn" data-toggle="modal" data-target="#editBk<?php echo $row->kode_buku; ?>">
                                                            <i class="fa-solid fa-pen-nib text-warning"></i>
                                                        </a>
                                                    </td>

                                                    <!-- button delete -->
                                                    <td class="text-center align-middle">
                                                        <a class="btn" data-toggle="modal" data-target="#delBk<?php echo $row->kode_buku; ?>">
                                                            <i class="fa-solid fa-trash text-danger"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <!-- include footer  -->
            <?php $this->load->view('include/footer'); ?>
        </div>

        <!-- Print Modal-->
        <?php
        foreach ($buku->result() as $row) :
        ?>
            <div class="modal fade" id="printBk<?php echo $row->kode_buku ?>" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Buku <?php echo $row->judul; ?> </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 text-center">
                                <a href="<?= base_url() . 'upload/' . $row->foto_buku; ?>" target="_self"> <img src="<?= base_url() . 'upload/' . $row->foto_buku; ?>" width="120"></a>
                            </div>
                            <div class="mb-3">
                                <label for="kode_buku" class="form-label">ID Buku :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_buku" name="kode_buku" value="<?php echo $row->kode_buku; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="judul" name="judul" value="<?php echo $row->judul; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="pengarang" class="form-label">Pengarang :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="pengarang" name="pengarang" value="<?php echo $row->pengarang; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Buku :</label>
                                <textarea class="form-control" id="deskripsi" style="background-color: #e6eef5; color : #6d7c8b" name="deskripsi" rows="6" disabled><?php echo $row->deskripsi; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Add Modal-->
    <div class="modal fade" id="addBk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Buku</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open_multipart('buku/add') ?>
                    <div class="mb-3">
                        <label for="foto_buku" class="form-label"><span class="text-danger">* </span>Foto Buku :</label>
                        <input type="file" class="form-control" id="foto_buku" name="foto_buku" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_buku" class="form-label"><span class="text-primary">* </span>ID Buku :</label>
                        <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_buku" name="kode_buku" autocomplete="off" value="BK<?php echo sprintf("%04s", $kode_buku) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label"><span class="text-danger">* </span>Judul Buku :</label>
                        <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="<?= set_value('judul'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="pengarang" class="form-label"><span class="text-danger">* </span>Pengarang :</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" autocomplete="off" value="<?= set_value('pengarang'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label"><span class="text-danger">* </span>Deskripsi Buku :</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6" required> <?= set_value('deskripsi'); ?></textarea>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">KEMBALI</button>
                        <button type="submit" class="btn btn-primary">SIMPAN</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Edit Modal-->
    <?php
    foreach ($buku->result() as $row) :
    ?>
        <div class="modal fade" id="editBk<?php echo $row->kode_buku ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Buku <?php echo $row->judul; ?> </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('buku/update') ?>
                        <div class="mb-3">
                            <label for="foto_buku" class="form-label"><span class="text-danger">* </span>Foto Buku :</label>
                            <input type="file" class="form-control" id="foto_buku" name="foto_buku" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_buku" class="form-label"><span class="text-primary">* </span>ID Buku :</label>
                            <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_buku" name="kode_buku" autocomplete="off" value="<?php echo $row->kode_buku; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="judul" class="form-label"><span class="text-danger">* </span>Judul Buku :</label>
                            <input type="text" class="form-control" id="judul" name="judul" autocomplete="off" value="<?php echo $row->judul; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="pengarang" class="form-label"><span class="text-danger">* </span>Pengarang :</label>
                            <input type="text" class="form-control" id="pengarang" name="pengarang" autocomplete="off" value="<?php echo $row->pengarang; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label"><span class="text-danger">* </span>Deskripsi Buku :</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6"><?php echo $row->deskripsi; ?></textarea>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="button" data-dismiss="modal">KEMBALI</button>
                            <button type="submit" class="btn btn-primary">SIMPAN</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <!-- Hapus Modal-->
    <?php
    foreach ($buku->result() as $row) :
    ?>
        <div class="modal modal-fade py-5" id="delBk<?php echo $row->kode_buku ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content rounded-3 shadow">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body p-4">
                        <h5 class="mb-0">Apakah kamu yakin?</h5>
                        <p class="mb-0">Data yang kamu hapus tidak akan bisa dikembalikan</p>

                    </div>
                    <div class="modal-footer flex-nowrap p-0">
                        <a class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0 border-end" data-dismiss="modal">
                            TIDAK
                        </a>
                        <a href="<?php echo site_url('buku/delete/' . $row->kode_buku); ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">
                            <span>YA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    <!-- Main Page Javascript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/horizontal-layout.js"></script>
    <!-- Datatables Javascript -->
    <script src="<?php echo base_url() ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/simple-datatables.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script>
        // auto close alert
        $(document).ready(function() {

            window.setTimeout(function() {
                $(".alert").fadeTo(150, 0).slideUp(150, function() {
                    $(this).remove();
                });
            }, 5000);

        });
    </script>
</body>

</html>
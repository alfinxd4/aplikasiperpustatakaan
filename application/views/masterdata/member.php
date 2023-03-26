<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Rekayasatu</title>
    <link rel="stylesheet" href=" <?php echo base_url() ?>assets/css/main/app-theme.css">
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
                                <h3>Data Member</h3>
                            </div>
                            <!-- breadcumb -->
                            <div class="col-12 col-md-6 order-md-2 order-first">
                                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">Data Master</li>
                                        <li class="breadcrumb-item active" aria-current="page">Data Member</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>

                    <div class="page-content ">
                        <!-- alert success add data -->
                        <?php echo $this->session->flashdata('success') ?>

                        <!--Data Table-->
                        <section class="section">
                            <div class="card">
                                <div class="card-body">
                                    <!-- datatables master data member -->
                                    <table class="table table-bordered " id="table1">
                                        <div class="d-flex flex-row">
                                            <div class="p-2">
                                                <div class="col">
                                                    <!-- Button add -->
                                                    <button type=" button" class="btn btn-primary btn-icon-split mb-3" data-toggle="modal" data-target="#addMb">
                                                        <span class="icon text-white-50">
                                                            <i class="fa-solid fa-file-circle-plus"></i>
                                                        </span>
                                                        <span class="text">Tambah Member </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="col">
                                                    <!-- Button Export PDF -->
                                                    <a class="btn btn-danger btn-icon-split mb-3 " href="<?php echo base_url("member/exportpdf"); ?>">
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
                                                    <a class="btn btn-success btn-icon-split mb-3" href="<?php echo base_url("member/exportexcel"); ?>">
                                                        <span class="icon text-white-50">
                                                            <i class="fa-solid fa-file-circle-plus"></i>
                                                        </span>
                                                        <span class="text">Export Excel </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="align-middle text-center">No.</th>
                                                <th rowspan="2" class="align-middle text-center">Foto </th>
                                                <th rowspan="2" class="align-middle text-center">ID </th>
                                                <th rowspan="2" class="align-middle text-center">Nama Lengkap</th>
                                                <th rowspan="2" class="align-middle text-center">Jenis Kelamin</th>
                                                <th rowspan="2" class="align-middle text-center">Tanggal Lahir</th>
                                                <th rowspan="2" class="align-middle text-center">Alamat</th>
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
                                            // get data from tb member, connect to controller member
                                            foreach ($member->result() as $row) :
                                                $count++;
                                            ?>
                                                <tr>
                                                    <td class="text-center align-middle"><?php echo $count; ?></td>
                                                    <td class="text-center align-middle"><img src="<?= base_url() . 'upload/' . $row->foto_member; ?>" width="70" height="70"></td>
                                                    <td class="text-center align-middle"><?php echo $row->kode_member; ?></td>
                                                    <td class="align-middle"><?php echo $row->nama; ?></td>
                                                    <td class="text-center align-middle"><?php echo $row->jk; ?></td>
                                                    <td class="text-center align-middle"><?php echo $row->ttl; ?></td>
                                                    <td class="text-center align-middle"><?php echo $row->alamat; ?></td>
                                                    <!-- button printview -->
                                                    <td class="text-center align-middle">
                                                        <a class="btn" class="btn btn-danger" data-toggle="modal" data-target="#printMb<?php echo $row->kode_member; ?>">
                                                            <i class="fa-solid fa-eye text-primary"></i>
                                                        </a>
                                                    </td>
                                                    <!-- button edit -->
                                                    <td class="text-center align-middle">
                                                        <a class="btn" data-toggle="modal" data-target="#editMb<?php echo $row->kode_member; ?>">
                                                            <i class="fa-solid fa-pen-nib text-warning"></i>
                                                        </a>
                                                    </td>
                                                    <!-- button delete -->
                                                    <td class="text-center  align-middle">
                                                        <a class="btn" data-toggle="modal" data-target="#delMb<?php echo $row->kode_member; ?>">
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
        foreach ($member->result() as $row) :
        ?>
            <div class="modal fade" id="printMb<?php echo $row->kode_member ?>"" tabindex=" -1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Data <?php echo $row->nama; ?> </h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3 text-center">
                                <a href="<?= base_url() . 'upload/' . $row->foto_member; ?>" target="_self"> <img src="<?= base_url() . 'upload/' . $row->foto_member; ?>" width="120" height="120"></a>
                            </div>
                            <div class="mb-3">
                                <label for="kode_member" class="form-label">ID Member :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_member" name="kode_member" value="<?php echo $row->kode_member; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="nama" name="nama" value="<?php echo $row->nama; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="jk" class="form-label">Jenis Kelamin :</label>
                                <select class="form-control" style="background-color: #e6eef5; color : #6d7c8b" name="jk" id="jk" disabled>
                                    <option selected disabled value=""><?php echo $row->jk; ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ttl" class="form-label">Tanggal Lahir :</label>
                                <input type="date" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="ttl" name="ttl" value="<?php echo $row->ttl; ?>" disabled>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat :</label>
                                <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="alamat" name="alamat" value="<?php echo $row->alamat; ?>" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Add Modal-->
    <div class="modal fade" id="addMb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Member</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('member/add') ?>
                    <div class="mb-3">
                        <label for="foto_member" class="form-label"><span class="text-danger">* </span>Foto Member :</label>
                        <input type="file" class="form-control" id="foto_member" name="foto_member" required>
                    </div>
                    <div class="mb-3">
                        <label for="kode_member" class="form-label"><span class="text-primary">* </span>ID Member :</label>
                        <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_member" name="kode_member" autocomplete="off" value="MB<?php echo sprintf("%04s", $kode_member) ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label"><span class="text-danger">* </span>Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= set_value('nama'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="jk" class="form-label"><span class="text-danger">* </span>Jenis Kelamin :</label>
                        <select class="form-control" name="jk" id="jk" value="<?= set_value('jk'); ?>" required>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ttl" class="form-label"><span class="text-danger">* </span>Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="ttl" name="ttl" autocomplete="off" value="<?= set_value('ttl'); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label"><span class="text-danger">* </span>Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" value="<?= set_value('alamat'); ?>" required>
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
    foreach ($member->result() as $row) :
    ?>
        <div class="modal fade" id="editMb<?php echo $row->kode_member ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Data <?php echo $row->nama; ?> </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('member/update') ?>
                        <div class="mb-3">
                            <label for="foto_member" class="form-label"><span class="text-danger">* </span>Foto Member :</label>
                            <input type="file" class="form-control" id="foto_member" name="foto_member" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode_member" class="form-label"><span class="text-primary">* </span>ID Member :</label>
                            <input type="text" class="form-control" style="background-color: #e6eef5; color : #6d7c8b" id="kode_member" name="kode_member" autocomplete="off" value="<?php echo $row->kode_member; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label"><span class="text-danger">* </span>Nama Lengkap :</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?php echo $row->nama; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="jk" class="form-label"><span class="text-danger">* </span>Jenis Kelamin :</label>
                            <select class="form-control" name="jk" id="jk" required>
                                <option disabled><?php echo $row->jk; ?></option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ttl" class="form-label"><span class="text-danger">* </span>Tanggal Lahir :</label>
                            <input type="date" class="form-control" id="ttl" name="ttl" autocomplete="off" value="<?php echo $row->ttl; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label"><span class="text-danger">* </span>Alamat :</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="off" value="<?php echo $row->alamat; ?>" required>
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
    foreach ($member->result() as $row) :
    ?>
        <div class="modal modal-fade py-5" id="delMb<?php echo $row->kode_member ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <a href="<?php echo site_url('Member/delete/' . $row->kode_member); ?>" class="btn btn-lg btn-link fs-6 text-decoration-none col-6 m-0 rounded-0">
                            <span>YA</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>

    <!-- Bootstrap Main Page Javascript -->
    <script src="<?php echo base_url() ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url() ?>assets/js/app.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/horizontal-layout.js"></script>
    <!-- Datatables Javascript -->
    <script src="<?php echo base_url() ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="<?php echo base_url() ?>assets/js/pages/simple-datatables.js"></script>
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

        });
    </script>
</body>

</html>
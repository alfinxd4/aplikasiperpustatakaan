<script src="<?php echo base_url() ?>assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/simple-datatables.js"></script>


<!-- datatables master data member -->

<table class="table table-bordered " id="table1">
    <div class="d-flex flex-row">
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
            <th class="text-center">No.</th>
            <th class="text-center">ID Transaksi</th>
            <th class="text-center">Tanggal Pinjam</th>
            <th class="text-center">Tanggal Kembali</th>
            <th class="text-center">Kode Member</th>
            <th class="text-center">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 0;
        foreach ($laporan as $row) : $no++; ?>
            <tr class="text-center align-middle">
                <td class="align-middle"><?php echo $no; ?></td>
                <td class="align-middle"><?php echo $row->kode_transaksi; ?></td>
                <td class="align-middle"><?php echo $row->tgl_pinjam; ?></td>
                <td class="align-middle"><?php echo $row->tgl_kembali; ?></td>
                <td class="align-middle"><?php echo $row->kode_member; ?></td>
                <td class=""><?php echo $row->status_pinjam; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
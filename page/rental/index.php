<?php
$no = 1;
$rentals = query("SELECT a.*, b.nama_gian_sonia as pelanggan, c.nama_mobil_gian_sonia as mobil FROM tbl_rental_gian_sonia as a INNER JOIN tbl_pelanggan_gian_sonia as b ON a.nik_ktp_gian_sonia = b.nik_ktp_gian_sonia INNER JOIN tbl_mobil_gian_sonia as c ON a.no_plat_gian_sonia = c.no_plat_gian_sonia");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="?page=rental&action=add" class="btn btn-primary">Tambah Data</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="overflow-x: scroll;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Trx</th>
                            <th>Nama Pelanggan</th>
                            <th>Mobil</th>
                            <th>Tanggal Rental</th>
                            <th>Jam Rantal</th>
                            <th>Harga</th>
                            <th>Lama</th>
                            <th>Tolal Bayar</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($rentals as $rental) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $rental['no_trx_gian_sonia']; ?></td>
                                <td><?= $rental['pelanggan']; ?></td>
                                <td><?= $rental['mobil']; ?></td>
                                <td><?= tanggal_hari($rental['tgl_rental_gian_sonia']); ?></td>
                                <td><?= $rental['jam_rental_gian_sonia']; ?></td>
                                <td><?= rupiah($rental['harga_gian_sonia']); ?></td>
                                <td><?= $rental['lama_gian_sonia']; ?></td>
                                <td><?= rupiah($rental['total_bayar_gian_sonia']); ?></td>
                                <td class="text-center">
                                    <a href="?page=rental&action=edit&no_trx=<?= $rental['no_trx_gian_sonia']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <button data-trx="<?= $rental['no_trx_gian_sonia']; ?>" class="hapus-rental btn btn-danger btn-sm text-white">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
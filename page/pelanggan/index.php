<?php
$no = 1;
$pelanggans = query("SELECT * FROM tbl_pelanggan_gian_sonia");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="?page=pelanggan&action=add" class="btn btn-primary">Tambah Data</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Pelanggan</th>
                            <th>Nomor HP</th>
                            <th>Alamat</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pelanggans as $pelanggan) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $pelanggan['nik_ktp_gian_sonia']; ?></td>
                                <td><?= $pelanggan['nama_gian_sonia']; ?></td>
                                <td><?= $pelanggan['no_hp_gian_sonia']; ?></td>
                                <td><?= $pelanggan['alamat_gian_sonia']; ?></td>
                                <td class="text-center">
                                    <a href="?page=pelanggan&action=edit&no_pelanggan=<?= $pelanggan['nik_ktp_gian_sonia']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <button data-nik="<?= $pelanggan['nik_ktp_gian_sonia']; ?>" class="hapus-pelanggan btn btn-danger btn-sm text-white">Hapus</button>
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
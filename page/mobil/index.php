<?php
$no = 1;
$mobils = query("SELECT * FROM tbl_mobil_gian_sonia");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <a href="?page=mobil&action=add" class="btn btn-primary">Tambah Data</a>
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Plat</th>
                            <th>Nama Mobil</th>
                            <th>Brand Mobil</th>
                            <th>Type Transmisi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mobils as $mobil) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $mobil['no_plat_gian_sonia']; ?></td>
                                <td><?= $mobil['nama_mobil_gian_sonia']; ?></td>
                                <td><?= $mobil['brand_mobil_gian_sonia']; ?></td>
                                <td><?= $mobil['tipe_transmisi_gian_sonia']; ?></td>
                                <td class="text-center">
                                    <a href="?page=mobil&action=edit&no_plat=<?= $mobil['no_plat_gian_sonia']; ?>" class="btn btn-warning btn-sm text-white">Edit</a>
                                    <button data-plat="<?= $mobil['no_plat_gian_sonia']; ?>" class="hapus-mobil btn btn-danger btn-sm text-white">Hapus</button>
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
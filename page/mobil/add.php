<?php
if (isset($_POST['submit'])) {
    $result = mobil_store($_POST);
    if ($result == false) {
        $error = true;
    } else {
        echo "
        <script>
            document.location.href = '?page=mobil&pesan=Data Berhasil Ditambahkan!';
        </script>
        ";
    }
}
if (isset($_POST['tipe_transmisi_gian_sonia'])) {
    $transmisi = $_POST['tipe_transmisi_gian_sonia'];
} else {
    $transmisi = '';
}
?>
<div class="row">
    <div class="col">
        <?php if (isset($error)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <small class="text-white">No Plat Sudah Terdaftar</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card text-start">
            <div class="card-body">
                <form action="?page=mobil&action=add" method="POST">
                    <div class="mb-3">
                        <label for="no_plat_gian_sonia" class="form-label">No Plat</label>
                        <input type="text" name="no_plat_gian_sonia" id="no_plat_gian_sonia" class="form-control" placeholder="Masukan Nomor Plat" value="<?= (isset($_POST['no_plat_gian_sonia'])) ? $_POST['no_plat_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_mobil_gian_sonia" class="form-label">Nama Mobil</label>
                        <input type="text" name="nama_mobil_gian_sonia" id="nama_mobil_gian_sonia" class="form-control" placeholder="Masukan Nama Mobil" value="<?= (isset($_POST['nama_mobil_gian_sonia'])) ? $_POST['nama_mobil_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="brand_mobil_gian_sonia" class="form-label">Nama Brand</label>
                        <input type="text" name="brand_mobil_gian_sonia" id="brand_mobil_gian_sonia" class="form-control" placeholder="Masukan Nama Brand" value="<?= (isset($_POST['brand_mobil_gian_sonia'])) ? $_POST['brand_mobil_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipe_transmisi_gian_sonia" class="form-label">Tipe Transmisi</label>
                        <select class="form-control" name="tipe_transmisi_gian_sonia" id="tipe_transmisi_gian_sonia" required>
                            <option value="">Pilih Jenis</option>
                            <option value="Manual" <?= ($transmisi == 'Manual') ? 'selected' : ''; ?>>Manual</option>
                            <option value="Otomatis Konvnsional" <?= ($transmisi == 'Otomatis Konvnsional') ? 'selected' : ''; ?>>Otomatis Konvnsional</option>
                            <option value="Otomatis CVT" <?= ($transmisi == 'Otomatis CVT') ? 'selected' : ''; ?>>Otomatis CVT</option>
                            <option value="AMT" <?= ($transmisi == 'AMT') ? 'selected' : ''; ?>>AMT</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <a href="?page=mobil" class="btn btn-warning text-white">Kembali</a>
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    $result = pelanggan_store($_POST);
    if ($result == false) {
        $error = true;
    } else {
        echo "
        <script>
            document.location.href = '?page=pelanggan&pesan=Data Berhasil Ditambahkan!';
        </script>
        ";
    }
}
?>
<div class="row">
    <div class="col">
        <?php if (isset($error)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <small class="text-white">NIK Pelanggan Sudah Terdaftar</small>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <div class="card text-start">
            <div class="card-body">
                <form action="?page=pelanggan&action=add" method="POST">
                    <div class="mb-3">
                        <label for="nik_ktp_gian_sonia" class="form-label">NIK KTP</label>
                        <input type="text" name="nik_ktp_gian_sonia" id="nik_ktp_gian_sonia" class="form-control" placeholder="Masukan NIK" value="<?= (isset($_POST['nik_ktp_gian_sonia'])) ? $_POST['nik_ktp_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_gian_sonia" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_gian_sonia" id="nama_gian_sonia" class="form-control" placeholder="Masukan Nama" value="<?= (isset($_POST['nama_gian_sonia'])) ? $_POST['nama_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp_gian_sonia" class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp_gian_sonia" id="no_hp_gian_sonia" class="form-control" placeholder="Masukan Nomor HP" value="<?= (isset($_POST['no_hp_gian_sonia'])) ? $_POST['no_hp_gian_sonia'] : ''; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_gian_sonia" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_gian_sonia" id="alamat_gian_sonia" class="form-control" placeholder="Masukan Alamat" required><?= (isset($_POST['alamat_gian_sonia'])) ? $_POST['alamat_gian_sonia'] : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <a href="?page=pelanggan" class="btn btn-warning text-white">Kembali</a>
                        <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
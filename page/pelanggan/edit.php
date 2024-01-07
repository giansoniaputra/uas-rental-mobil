<?php
$data = query("SELECT * FROM tbl_pelanggan_gian_sonia WHERE nik_ktp_gian_sonia = '$_GET[no_pelanggan]'")[0];
if (isset($_POST['submit'])) {
    $result = pelanggan_update($_POST);
    if ($result == false) {
        $error = true;
    } else {
        echo "
        <script>
            document.location.href = '?page=pelanggan&pesan=Data Berhasil Diubah!';
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
                <form action="?page=pelanggan&action=edit&no_pelanggan=<?= $_GET['no_pelanggan']; ?>" method="POST">
                    <input type="hidden" name="current_nik_ktp_gian_sonia" value="<?= $data['nik_ktp_gian_sonia']; ?>">
                    <div class="mb-3">
                        <label for="nik_ktp_gian_sonia" class="form-label">NIK KTP</label>
                        <input type="text" name="nik_ktp_gian_sonia" id="nik_ktp_gian_sonia" class="form-control" placeholder="Masukan NIK" value="<?= $data['nik_ktp_gian_sonia']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_gian_sonia" class="form-label">Nama Pelanggan</label>
                        <input type="text" name="nama_gian_sonia" id="nama_gian_sonia" class="form-control" placeholder="Masukan Nama" value="<?= $data['nama_gian_sonia']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="no_hp_gian_sonia" class="form-label">Nomor HP</label>
                        <input type="text" name="no_hp_gian_sonia" id="no_hp_gian_sonia" class="form-control" placeholder="Masukan Nomor HP" value="<?= $data['no_hp_gian_sonia']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_gian_sonia" class="form-label">Alamat</label>
                        <textarea type="text" name="alamat_gian_sonia" id="alamat_gian_sonia" class="form-control" placeholder="Masukan Alamat" required><?= $data['alamat_gian_sonia']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <a href="?page=pelanggan" class="btn btn-warning text-white">Kembali</a>
                        <button type="submit" class="btn btn-primary" name="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<?php
$data = query("SELECT * FROM tbl_rental_gian_sonia WHERE no_trx_gian_sonia = '$_GET[no_trx]'")[0];
$mobils = query("SELECT * FROM tbl_mobil_gian_sonia");
$pelanggans = query("SELECT * FROM tbl_pelanggan_gian_sonia");

if (isset($_POST['submit'])) {
    rental_update($_POST);
    echo "
        <script>
            document.location.href = '?page=rental&pesan=Data Berhasil Diubah!';
        </script>
        ";
}
?>
<form action="?page=rental&action=edit&no_trx=<?= $_GET['no_trx']; ?>" method="POST">
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden" name="no_trx_gian_sonia" id="no_trx_gian_sonia" value="<?= $data['no_trx_gian_sonia']; ?>">
            <div class="mb-3">
                <label for="nik_ktp_gian_sonia" class="form-label">Pilih Pelanggan</label>
                <select class="form-control" name="nik_ktp_gian_sonia" id="nik_ktp_gian_sonia" required>
                    <option value="">Pilih Pelanggan</option>
                    <?php foreach ($pelanggans as $pelanggan) : ?>
                        <option value="<?= $pelanggan['nik_ktp_gian_sonia']; ?>" <?= ($data['nik_ktp_gian_sonia'] == $pelanggan['nik_ktp_gian_sonia']) ? 'selected' : '' ?>><?= $pelanggan['nik_ktp_gian_sonia'] . ' - ' . $pelanggan['nama_gian_sonia']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="no_plat_gian_sonia" class="form-label">Pilih Mobil</label>
                <select class="form-control" name="no_plat_gian_sonia" id="no_plat_gian_sonia" required>
                    <option value="">Pilih Mobil</option>
                    <?php foreach ($mobils as $mobil) : ?>
                        <option value="<?= $mobil['no_plat_gian_sonia']; ?>" <?= ($data['no_plat_gian_sonia'] ==  $mobil['no_plat_gian_sonia']) ? 'selected' : '' ?>><?= $mobil['no_plat_gian_sonia'] . ' - ' . $mobil['nama_mobil_gian_sonia']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="mb-3">
                <label for="tanggal_rental_gian_sonia" class="form-label">Tanggal Ambil</label>
                <input type="date" name="tanggal_rental_gian_sonia" id="tanggal_rental_gian_sonia" value="<?= $data['tgl_rental_gian_sonia']; ?>" class="form-control" required>
            </div>
            <div class=" mb-3">
                <label for="jam_rental_gian_sonia" class="form-label">Jam Ambil</label>
                <input type="time" name="jam_rental_gian_sonia" id="jam_rental_gian_sonia" class="form-control" value="<?= $data['jam_rental_gian_sonia']; ?>" required>
            </div>
            <div class=" mb-3">
                <label for="lama_gian_sonia" class="form-label">Lama Rental</label>
                <input type="number" name="lama_gian_sonia" id="lama_gian_sonia" class="form-control" value="<?= $data['lama_gian_sonia']; ?>" required>
            </div>
            <div class=" mb-3">
                <label for="harga_gian_sonia" class="form-label">Harga Rental</label>
                <input type="text" name="harga_gian_sonia" id="harga_gian_sonia" class="form-control money" value="<?= $data['harga_gian_sonia']; ?>" required>
            </div>
            <div class=" mb-3">
                <label for="total_bayar_gian_sonia" class="form-label">Total Bayar</label>
                <input type="text" name="total_bayar_gian_sonia" id="total_bayar_gian_sonia" value="<?= $data['total_bayar_gian_sonia']; ?>" readonly class="form-control money" required>
            </div>
            <div class=" mb-3">
                <a href="?page=rental" class="btn btn-warning text-white">Kembali</a>
                <button type="submit" name="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#harga_gian_sonia").on("keyup", function() {
            let lama = parseInt($("#lama_gian_sonia").val());
            let harga = parseInt($(this).val().replace(/\,/g, ""));
            let total = $("#total_bayar_gian_sonia");
            let hasil = lama * harga;
            if (isNaN(hasil)) {
                total.val(0)
            } else {
                total.val(hasil)
                $("input.money").simpleMoneyFormat({
                    currencySymbol: "Rp",
                    decimalPlaces: 0,
                    thousandsSeparator: ".",
                });
            }

        })
        $("#lama_gian_sonia").on("keyup", function() {
            let lama = parseInt($(this).val());
            let harga = parseInt($("#harga_gian_sonia").val().replace(/\,/g, ""));
            let total = $("#total_bayar_gian_sonia");
            let hasil = lama * harga;
            if (isNaN(hasil)) {
                total.val(0)
            } else {
                total.val(hasil)
                $("input.money").simpleMoneyFormat({
                    currencySymbol: "Rp",
                    decimalPlaces: 0,
                    thousandsSeparator: ".",
                });
            }

        })
    })
</script>
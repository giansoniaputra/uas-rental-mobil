<?php
function pelanggan_store($request)
{
    global $conn;
    $nik_ktp = htmlspecialchars($request['nik_ktp_gian_sonia']);
    $nama = htmlspecialchars($request['nama_gian_sonia']);
    $no_hp = htmlspecialchars($request['no_hp_gian_sonia']);
    $alamat = htmlspecialchars($request['alamat_gian_sonia']);
    $cek = mysqli_query($conn, "SELECT * FROM tbl_pelanggan_gian_sonia WHERE nik_ktp_gian_sonia = '$nik_ktp'");
    // return $cek;
    if (mysqli_num_rows($cek) > 0) {
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO tbl_pelanggan_gian_sonia VALUES ('$nik_ktp','$nama', '$no_hp', '$alamat')");
        return true;
    }
}

function pelanggan_update($request)
{
    global $conn;
    $query = query("SELECT * FROM tbl_pelanggan_gian_sonia WHERE nik_ktp_gian_sonia = '$request[current_nik_ktp_gian_sonia]'")[0];
    $nik_ktp = htmlspecialchars($request['nik_ktp_gian_sonia']);
    $nama = htmlspecialchars($request['nama_gian_sonia']);
    $no_hp = htmlspecialchars($request['no_hp_gian_sonia']);
    $alamat = htmlspecialchars($request['alamat_gian_sonia']);
    $cek = mysqli_query($conn, "SELECT * FROM tbl_pelanggan_gian_sonia WHERE nik_ktp_gian_sonia = '$nik_ktp'");
    $cek2 = mysqli_fetch_array($cek);
    // return $cek;
    if (mysqli_num_rows($cek) > 0 && $query['nik_ktp_gian_sonia'] != $cek2['nik_ktp_gian_sonia']) {
        return false;
    } else {
        mysqli_query($conn, "UPDATE tbl_pelanggan_gian_sonia SET nik_ktp_gian_sonia = '$nik_ktp', nama_gian_sonia = '$nama', no_hp_gian_sonia = '$no_hp', alamat_gian_sonia = '$alamat' WHERE nik_ktp_gian_sonia = '$request[current_nik_ktp_gian_sonia]'");
        return true;
    }
}

function pelanggan_destroy($request)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tbl_pelanggan_gian_sonia WHERE nik_ktp_gian_sonia = '$request'");
    return true;
}

<?php
function mobil_store($request)
{
    global $conn;
    $no_plat = htmlspecialchars($request['no_plat_gian_sonia']);
    $nama_mobil = htmlspecialchars($request['nama_mobil_gian_sonia']);
    $brand = htmlspecialchars($request['brand_mobil_gian_sonia']);
    $tipe_transmisi = htmlspecialchars($request['tipe_transmisi_gian_sonia']);
    $cek = mysqli_query($conn, "SELECT * FROM tbl_mobil_gian_sonia WHERE no_plat_gian_sonia = '$no_plat'");
    // return $cek;
    if (mysqli_num_rows($cek) > 0) {
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO tbl_mobil_gian_sonia VALUES ('$no_plat','$nama_mobil', '$brand', '$tipe_transmisi')");
        return true;
    }
}

function mobil_update($request)
{
    global $conn;
    $query = query("SELECT * FROM tbl_mobil_gian_sonia WHERE no_plat_gian_sonia = '$request[current_no_plat_gian_sonia]'")[0];
    $no_plat = htmlspecialchars($request['no_plat_gian_sonia']);
    $nama_mobil = htmlspecialchars($request['nama_mobil_gian_sonia']);
    $brand = htmlspecialchars($request['brand_mobil_gian_sonia']);
    $tipe_transmisi = htmlspecialchars($request['tipe_transmisi_gian_sonia']);
    $cek = mysqli_query($conn, "SELECT * FROM tbl_mobil_gian_sonia WHERE no_plat_gian_sonia = '$no_plat'");
    $cek2 = mysqli_fetch_array($cek);
    // return $cek;
    if (mysqli_num_rows($cek) > 0 && $query['no_plat_gian_sonia'] != $cek2['no_plat_gian_sonia']) {
        return false;
    } else {
        mysqli_query($conn, "UPDATE tbl_mobil_gian_sonia SET no_plat_gian_sonia = '$no_plat', nama_mobil_gian_sonia = '$nama_mobil', brand_mobil_gian_sonia = '$brand', tipe_transmisi_gian_sonia = '$tipe_transmisi' WHERE no_plat_gian_sonia = '$request[current_no_plat_gian_sonia]'");
        return true;
    }
}

function mobil_destroy($request)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tbl_mobil_gian_sonia WHERE no_plat_gian_sonia = '$request'");
    return true;
}

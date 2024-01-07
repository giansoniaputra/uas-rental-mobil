<?php
function rental_store($request)
{
    global $conn;
    $no_trx = htmlspecialchars($request['no_trx_gian_sonia']);
    $nik_ktp = htmlspecialchars($request['nik_ktp_gian_sonia']);
    $no_plat = htmlspecialchars($request['no_plat_gian_sonia']);
    $tanggal_rental = htmlspecialchars($request['tanggal_rental_gian_sonia']);
    $jam_rental = htmlspecialchars($request['jam_rental_gian_sonia']);
    $lama = htmlspecialchars($request['lama_gian_sonia']);
    $harga = htmlspecialchars(preg_replace('/[,]/', '', $request['harga_gian_sonia']));
    $total_bayar = htmlspecialchars(preg_replace('/[,]/', '', $request['total_bayar_gian_sonia']));

    // var_dump($total_bayar);
    // die;

    mysqli_query($conn, "INSERT INTO tbl_rental_gian_sonia VALUES('$no_trx','$nik_ktp', '$no_plat', '$tanggal_rental', '$jam_rental', '$harga', '$lama', '$total_bayar')");
    return true;
}

function rental_update($request)
{
    global $conn;
    $no_trx = htmlspecialchars($request['no_trx_gian_sonia']);
    $nik_ktp = htmlspecialchars($request['nik_ktp_gian_sonia']);
    $no_plat = htmlspecialchars($request['no_plat_gian_sonia']);
    $tanggal_rental = htmlspecialchars($request['tanggal_rental_gian_sonia']);
    $jam_rental = htmlspecialchars($request['jam_rental_gian_sonia']);
    $lama = htmlspecialchars($request['lama_gian_sonia']);
    $harga = htmlspecialchars(preg_replace('/[,]/', '', $request['harga_gian_sonia']));
    $total_bayar = htmlspecialchars(preg_replace('/[,]/', '', $request['total_bayar_gian_sonia']));

    // var_dump($total_bayar);
    // die;

    mysqli_query($conn, "UPDATE tbl_rental_gian_sonia SET nik_ktp_gian_sonia = '$nik_ktp', no_plat_gian_sonia = '$no_plat', tgl_rental_gian_sonia='$tanggal_rental', jam_rental_gian_sonia = '$jam_rental', lama_gian_sonia = '$lama', harga_gian_sonia = '$harga', total_bayar_gian_sonia = '$total_bayar' WHERE no_trx_gian_sonia = '$no_trx'");
    return true;
}

function rental_destroy($request)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM tbl_rental_gian_sonia WHERE no_trx_gian_sonia = '$request'");
    return true;
}

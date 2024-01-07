<?php
$conn = mysqli_connect('localhost', 'root', '', 'rental_mobil_gian_sonia');


function query($data)
{
    global $conn;
    $query = mysqli_query($conn, $data);
    $rows = [];
    while ($row = mysqli_fetch_array($query)) {
        $rows[] = $row;
    }
    return $rows;
}

<?php
function getConnection() {
    $koneksi = new mysqli("localhost", "root", "itsme", "projek_akhir");

    if ($koneksi->connect_error) {
        die("Connection failed: " . $koneksi->connect_error);
    }

    return $koneksi;
}

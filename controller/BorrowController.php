<?php

class BorrowController {
    public function index() {
        session_start();
        // Code to handle the form submission and process the data
        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        if (isset($_POST['submit'])) {
            require_once "config/koneksi.php";
            $conn = getConnection();
            $namaAnggota = $_POST['nama_anggota'];
            $judulBuku = $_POST['judul_buku'];
            $tanggalPeminjaman = $_POST['tanggal_peminjaman'];
            $kondisiBuku = $_POST['kondisi_buku'];

            $sql = "INSERT INTO peminjaman (nama_anggota, judul_buku, tanggal_pinjam, kondisi_buku)
            VALUES ('$namaAnggota', '$judulBuku', '$tanggalPeminjaman', '$kondisiBuku')";
            $conn->query($sql);
        }

        // Load the view file
        include "Page/navbar/navigation_bar.php";
        include "Page/pengguna/form/peminjaman.php";
    }
}

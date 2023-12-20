<?php

class ReturnController {
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
            $tanggalKembali = $_POST['tanggal_Pengembalian'];
            $kondisiBuku = $_POST['kondisi_buku'];
            $denda = 0;
            if ($kondisiBuku === "buruk") {
                $denda = 50000;
            }
        
            // Retrieve data from peminjaman table
            $sql = "SELECT * FROM peminjaman WHERE nama_anggota = '$namaAnggota' AND judul_buku = '$judulBuku'";
            $result = $conn->query($sql);
        
            if ($result->num_rows > 0) {
                // Fetch the data from the peminjaman table
                $row = $result->fetch_assoc();
                $tanggalPinjam = $row['tanggal_pinjam'];
                $kondisiAwal = $row['kondisi_buku'];
        
                // Insert the data into the pengembalian table
                $sql = "INSERT INTO pengembalian (nama_anggota, judul_buku, tanggal_pinjam, tanggal_kembali, kondisi, kondisi_akhir, denda)
                        VALUES ('$namaAnggota', '$judulBuku', '$tanggalPinjam', '$tanggalKembali', '$kondisiAwal', '$kondisiBuku', '$denda')";
                $conn->query($sql);
            } else {
                echo "No matching data found in the peminjaman table.";
            }

            $sql = "DELETE FROM peminjaman WHERE nama_anggota = '$namaAnggota' AND judul_buku = '$judulBuku'";
            $conn->query($sql);
        
            $conn->close();
        }
        

        // Load the view file
        include "Page/navbar/navigation_bar.php";
        include "Page/pengguna/form/pengembalian.php";
    }
}

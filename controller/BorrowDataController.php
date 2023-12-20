<?php

class BorrowDataController {
    public function index() {
        require_once "config/koneksi.php";

        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        include "Page/navbar/navigation_bar.php";
        include_once "Page/admin/data/data_peminjaman.php";
    }

    public function tambahPeminjaman(){
        $nama_anggota = $_POST['nama_anggota'];
        $judul_buku = $_POST['judul_buku'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
        $kondisi_dipinjam = $_POST['kondisi_dipinjam'];
        $kondisi_dikembalikan = $_POST['kondisi_dikembalikan'];
        if($kondisi_dikembalikan === "buruk"){
            $denda = 50000;
        }else{
            $denda = 0;
        }

        require_once "config/koneksi.php";
        $conn = getConnection();
        $query = "INSERT INTO pengembalian (nama_anggota, judul_buku, tanggal_pinjam, tanggal_kembali, kondisi, kondisi_akhir, denda) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

            // Bind the parameters
        $stmt->bind_param("sssssss", $nama_anggota, $judul_buku, $tanggal_peminjaman ,$tanggal_pengembalian,$kondisi_dipinjam,$kondisi_dikembalikan,$denda);

            // Execute the query
        $stmt->execute();
        header("Location: index.php?page=data_peminjaman");
    }

    public function updatePeminjaman(){
        $nama_anggota = $_POST['nama_anggota'];
        $judul_buku = $_POST['judul_buku'];
        $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
        $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
        $kondisi_dipinjam = $_POST['kondisi_dipinjam'];
        $kondisi_dikembalikan = $_POST['kondisi_dikembalikan'];
        if($kondisi_dikembalikan === "buruk"){
            $denda = 50000;
        }else{
            $denda = 0;
        }
       
        require_once "config/koneksi.php";
        $conn = getConnection();

        // Prepare the update query
        $sql = "UPDATE pengembalian SET nama_anggota='$nama_anggota', judul_buku='$judul_buku', tanggal_pinjam='$tanggal_peminjaman', tanggal_kembali='$tanggal_pengembalian', kondisi='$kondisi_dipinjam', kondisi_akhir='$kondisi_dikembalikan', denda='$denda' WHERE nama_anggota='$nama_anggota' AND judul_buku='$judul_buku'";

        if ($conn->query($sql) === TRUE) {
            // Update successful
            echo "Data updated successfully.";
        } else {
            // Update failed
            echo "Error updating data: " . $conn->error;
        }

        $conn->close();
        header("Location: index.php?page=data_peminjaman");
    }

    public function delete($id_user){
        require_once "config/koneksi.php";
        $koneksi = getConnection();

        $query = "DELETE FROM pengembalian WHERE no = $id_user";

        if ($koneksi->query($query)) {
            header("Location: index.php?page=data_peminjaman");
            exit();
        }
    }
}

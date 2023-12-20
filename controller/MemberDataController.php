<?php

class MemberDataController {
    public function index() {
        require_once "config/koneksi.php";

        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        require_once "models/UserModel.php";
        $model = new UserModel();

        $data = $model->getAllData();

        include "Page/navbar/navigation_bar.php";
        include_once "Page/admin/data/data_anggota.php";
    }

    public function tambah_anggota(){
        $kode = $_POST['kode_anggota'];
        $nim = $_POST['nim'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
        $role = "Pengguna";

        require_once "config/koneksi.php";
        $conn = getConnection();
        $query = "INSERT INTO user (kode_anggota, nim, fullname, email, password,role, alamat) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);

            // Bind the parameters
        $stmt->bind_param("sssssss", $kode, $nim, $fullname,$email,$password,$role,$alamat);

            // Execute the query
        $stmt->execute();
        header("Location: index.php?page=data_anggota");
    }

    public function updateAnggota(){
        $kode_anggota = $_POST['kode_anggota'];
        $nim = $_POST['nim'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $alamat = $_POST['alamat'];
       
        require_once "config/koneksi.php";
        $conn = getConnection();

        // Prepare the update query
        $sql = "UPDATE user SET kode_anggota='$kode_anggota', nim='$nim', fullname='$fullname', email='$email', password='$password', alamat='$alamat' WHERE nim='$nim'";

        if ($conn->query($sql) === TRUE) {
            // Update successful
            echo "Data updated successfully.";
        } else {
            // Update failed
            echo "Error updating data: " . $conn->error;
        }

        $conn->close();
        header("Location: index.php?page=data_anggota");
    }

    public function delete($id_user){
        require_once "config/koneksi.php";
        $koneksi = getConnection();

        $query = "DELETE FROM user WHERE id_user = $id_user";

        if ($koneksi->query($query)) {
            header("Location: index.php?page=data_anggota");
            exit();
        }
    }
}

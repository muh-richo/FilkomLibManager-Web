<?php
class UserModel {
    private $conn;

    public function __construct() {
        // Leave the constructor empty for now
    }

    private function connectToDatabase() {
        require_once "config/koneksi.php";
        $this->conn = getConnection();
    }

    public function getUserByEmailAndPassword($email, $password) {
        $this->connectToDatabase();

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $this->conn->query($query);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return null;
        }
    }

    public function getAllData() {
        $this->connectToDatabase();
        $sql = "SELECT * FROM user WHERE role='Pengguna'";
        $result = $this->conn->query($sql);

        $data = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        $this->closeConnection();

        return $data;
    }

    public function createUser($fullname, $nim, $email, $password, $alamat) {
        $this->connectToDatabase();

        $query = "INSERT INTO user (fullname, nim, email, password, role, alamat) VALUES ('$fullname', '$nim', '$email', '$password', 'Pengguna', '$alamat')";
        mysqli_query($this->conn, $query);
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

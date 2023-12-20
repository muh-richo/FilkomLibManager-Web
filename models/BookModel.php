<?php

require_once "config/koneksi.php";

class BookModel {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function getAllBooks() {
        $sql = "SELECT image_path FROM books";
        $result = $this->conn->query($sql);

        $books = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imagePath = $row["image_path"];
                $books[] = $imagePath;
            }
        }

        return $books;
    }

    public function getBooks() {
        $sql = "SELECT * FROM books";
        $result = $this->conn->query($sql);

        $books = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $books[] = $row;
            }
        }

        return $books;
    }

    public function insertBook($book)
    {
        try {
            $judul = $book['judul'];
            $pengarang = $book['pengarang'];
            $penerbit = $book['penerbit'];
            $buku_baik = $book['buku_baik'];
            $buku_rusak = $book['buku_rusak'];
            $jumlah_buku = $book['jumlah_buku'];
            $gambar_buku = $book['gambar_buku'];

            // Prepare the INSERT query
            $query = "INSERT INTO books (judul_buku, pengarang, penerbit, buku_baik, buku_rusak, jumlah_buku, image_path) 
                    VALUES (?, ?, ?, ?, ?, ?,?)";
            $stmt = $this->conn->prepare($query);

            // Bind the parameters
            $stmt->bind_param("ssssiis", $judul, $pengarang, $penerbit, $buku_baik, $buku_rusak, $jumlah_buku, $gambar_buku);

            // Execute the query
            $stmt->execute();

            // Check if the query was successful
            if ($stmt->affected_rows > 0) {
                return true; // Insertion successful
            } else {
                return false; // Insertion failed
            }
        } catch (PDOException $e) {
            // Handle any errors
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

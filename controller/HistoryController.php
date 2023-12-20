<?php

class HistoryController {
    public function index() {
        session_start();
        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }
        
        require_once "config/koneksi.php"; 
        $conn = getConnection();
        $sql = "SELECT * FROM pengembalian";
        $result = $conn->query($sql);
        
        // Check if there are any rows returned
        if ($result->num_rows > 0) {
            // Create an empty array to store the fetched data
            $pengembalianData = array();
            
            // Loop through each row of the result set and store the data in the array
            while ($row = $result->fetch_assoc()) {
                $pengembalianData[] = $row;
            }
        }
        
        // Close the database connection
        $conn->close();

        // Load the view file
        include "Page/navbar/navigation_bar.php";
        include "Page/pengguna/riwayat/riwayat.php";
    }
}

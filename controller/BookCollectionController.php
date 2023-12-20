<?php
require_once "models/BookModel.php";

class BookCollectionController {
    public function index() {
        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        $bookModel = new BookModel();
        $books = $bookModel->getBooks();
        $bookModel->closeConnection();
        include "Page/navbar/navigation_bar.php";
        include "Page/pengguna/koleksi/koleksi.php";
    }
}

?>

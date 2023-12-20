<?php

require_once "models/BookModel.php";

class HomeController {
    public function index() {
        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        include "Page/pengguna/home/homepage.php";
    }
}

class HomeAdminController {
    public function index() {
        session_start();

        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        $bookModel = new BookModel();
        $books = $bookModel->getAllBooks();

        include "Page/admin/dashboard/dashboard.php";
    }
}

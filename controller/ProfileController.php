<?php

class ProfileAdminController {
    public function index() {
        session_start();
        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        if (isset($_POST['logout'])) {
            header("Location: index.php?page=sign_out");
            exit();
        }

        include "models/UserModel.php";
        $userModel = new UserModel();
        $user = $userModel->getUserByEmailAndPassword($_SESSION['email'], $_SESSION['password']);
        $userModel->closeConnection();

        // Load the view file
        include "Page/navbar/navigation_bar.php";
        include "Page/admin/profil/profil.php";
    }
}

class ProfileController {
    public function index() {
        session_start();
        if (!isset($_SESSION['role'])) {
            header("Location: index.php?page=sign_in");
            exit();
        }

        if (isset($_POST['logout'])) {
            header("Location: index.php?page=sign_out");
            exit();
        }

        include "models/UserModel.php";
        $userModel = new UserModel();
        $user = $userModel->getUserByEmailAndPassword($_SESSION['email'], $_SESSION['password']);
        $userModel->closeConnection();

        // Load the view file
        include "Page/navbar/navigation_bar.php";
        include "Page/pengguna/profil/profil.php";
    }
}

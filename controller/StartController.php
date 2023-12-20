<?php

class StartController {
    public function login() {
        require_once "config/koneksi.php";
        
        session_start();
        
        if (isset($_POST['sign_in'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            require_once "models/UserModel.php";
            $userModel = new UserModel();
            $user = $userModel->getUserByEmailAndPassword($email, $password);

            if ($user) {
                $_SESSION['role'] = $user['role'];
                $_SESSION['nim'] = $user['nim'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['alamat'] = $user['alamat'];
                if ($_SESSION['role'] === 'Pengguna'){
                    header("Location: index.php?page=home");
                }else if ($_SESSION['role'] === 'Admin'){
                    header("Location: index.php?page=home_admin");
                }
                exit();
            } else {
                $error_message = "Username atau Password Salah";
            }
        }

        if (isset($_POST['sign_up'])) {
            header("Location: index.php?page=sign_up");
        }

        include "Page/Start/sign_in.php";
    }

    public function signUp() {
        require_once "config/koneksi.php";

        session_start();

        if (isset($_POST['sign_up'])) {
            $fullname = $_POST['fullname'];
            $nim = $_POST['nim'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $alamat = $_POST['alamat'];
            
            if (empty($fullname) || empty($nim) || empty($email) || empty($password) || empty($alamat)) {
                $error_message = "Isi data kosong terlebih dahulu";
            } else {
                require_once "models/UserModel.php";
                $userModel = new UserModel();
                $userModel->createUser($fullname, $nim, $email, $password, $alamat);

                header("Location: index.php?page=sign_in");
                exit();
            }
        }

        if (isset($_POST['sign_in'])) {
            header("Location: index.php?page=sign_in");
        }

        include "Page/Start/sign_up.php";
    }
}

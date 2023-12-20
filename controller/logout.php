<?php

class LogoutController {
    public function index() {
        session_start();
        session_destroy();

        header("Location: index.php?page=sign_in");
        exit();
    }
}

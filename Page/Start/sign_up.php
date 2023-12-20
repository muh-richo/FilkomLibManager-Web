<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/Start/start.css">
    <title>Login Page</title>
</head>
<body>
    <div class="container">
        <h1>PERPUSTAKAAN</h1>
        <div class="login-box">
            <form method="POST">
                <img src="asset/logo_perpus.svg" alt="logo" class="logo">
                <input name="fullname" type="text" placeholder="Nama Lengkap">
                <input name="nim" type="int" placeholder="NIM">
                <input name="email" type="email" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <input name="alamat" type="text" placeholder="Alamat">
                <?php
                    if (isset($error_message)) {
                        echo '<p class="error">' . $error_message . '</p>';
                    }
                ?>
                <div class="button-group">
                    <button type="submit" name="sign_up" class="button1">Sign Up</button>
                    <button type="submit" name="sign_in" class="button2">Sudah Mempunyai Akun? Sign In</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/admin/profil/profil.css">
    <title>Home Page</title>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <form method="POST">
                <img src="asset/profil.svg" alt="profil" class="profil">
                <h2>Profil Saya</h2>
                <p>Nama Lengkap : <?php echo $user['fullname']; ?></p>
                <p>Email : <?php echo $user['email']; ?></p>
                <p>Password : <?php echo $user['password']; ?></p>
                <button type="submit" name="logout" class="logout">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
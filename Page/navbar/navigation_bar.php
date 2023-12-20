<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Page/navbar/navigation_bar.css">
    <title>Navigation Bar</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="asset/logo_perpus.svg" alt="Logo Perpustakaan" class="logo">
        </div>
        <p class="perpus">Perpustakaan</p>
        <div class="nav_links">
            <?php if ($_SESSION['role'] === 'Admin') { ?>
                <a href="index.php?page=home_admin">Beranda</a>
                <a href="index.php?page=data_buku">Data Buku</a>
                <a href="index.php?page=data_anggota">Data Anggota</a>
                <a href="index.php?page=data_peminjaman">Data Peminjaman</a>
            <?php } ?>
            <?php if ($_SESSION['role'] === 'Pengguna') { ?>
                <a href="index.php?page=home">Beranda</a>
                <a href="index.php?page=koleksi_buku">Koleksi Buku</a>
                <a href="index.php?page=peminjaman_buku">Peminjaman Buku</a>
                <a href="index.php?page=pengembalian_buku">Pengembalian Buku</a>
                <a href="index.php?page=riwayat">Riwayat</a>
            <?php } ?>
        </div>
        <?php if ($_SESSION['role'] === 'Admin') { ?>
            <div class="user_profile">
                <a href="index.php?page=profil_admin"><img src="asset/profil.svg" alt="Profil" class="user_profile"></a>
            </div>
        <?php } ?>
        <?php if ($_SESSION['role'] === 'Pengguna') { ?>
            <div class="user_profile">
                <a href="index.php?page=profil_pengguna"><img src="asset/profil.svg" alt="Profil" class="user_profile"></a>
            </div>
        <?php } ?>
    </div>
</body>
</html>
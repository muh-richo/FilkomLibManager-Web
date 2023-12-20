<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/admin/dashboard/dashboard.css">
    <title>Dashboard Admin</title>
</head>
<body>
    <?php include "Page/navbar/navigation_bar.php"; ?>
    <div class="container">
        <a href="index.php?page=data_buku" class="btn btn-buku">
            <img src="asset/dashboard-logo/buku.svg" alt="logo-buku" class="logo-buku">
            <div style="margin-top: 24px;">Buku</div>
        </a>
        <a href="index.php?page=data_anggota" class="btn btn-anggota">
            <img src="asset/dashboard-logo/anggota.svg" alt="logo-anggota" class="logo-anggota">
            <div>Anggota</div>
        </a>
        <a href="index.php?page=data_peminjaman" class="btn btn-peminjaman">
            <img src="asset/dashboard-logo/peminjaman.svg" alt="logo-peminjaman" class="logo-peminjaman">
            <div style="margin-top: 24px;">Peminjaman</div>
        </a>
    </div>
    <div class="footer">
        <img src="asset/logo_perpus.svg" alt="logo-perpus" class="logo-perpus">
        <p style="font-weight: bold">Perpustakaan Digital Filkom</p>
        <p style="margin-top:-8px;">Jl. Veteran, Ketawanggede, Lowokwaru, Kota Malang, Jawa Timur, Indonesia - 65145</p>
    </div>
</body>
</html>
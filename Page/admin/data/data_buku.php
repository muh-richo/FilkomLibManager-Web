<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/admin/data/data.css">
    <title>Data Buku Perpustakaan</title>
    <style>
        th:nth-child(8), td:nth-child(8) {
            width: 200px;
        }
    </style>
</head>
<body>
<div class="container">
        <form method="POST">
            <h1 style="text-align: center">Data Buku Perpustakaan</h1>
            <button type="button" class="tambah" onclick="tambahForm()">Tambah Data Buku</button>
            <table>
                <tbody>
                    <tr class="kategori">
                        <td>No</td>
                        <td>Judul Buku</td>
                        <td>Pengarang</td>
                        <td>Penerbit</td>
                        <td>Buku Baik</td>
                        <td>Buku Rusak</td>
                        <td>Jumlah Buku</td>
                        <td class="kategori-aksi">Aksi</td>
                    </tr>
                    <?php foreach ($books as $row) { ?>
                        <tr class="data">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['judul_buku']; ?></td>
                            <td><?php echo $row['pengarang']; ?></td>
                            <td><?php echo $row['penerbit']; ?></td>
                            <td><?php echo $row['buku_baik']; ?></td>
                            <td><?php echo $row['buku_rusak']; ?></td>
                            <td><?php echo $row['jumlah_buku']; ?></td>
                            <td class="aksi">
                                <button type="button" class="update" onclick="updateForm()">Update</button>
                                <button type="button" class="delete" onclick="window.location.href = 'index.php?page=delete_buku&id=<?php echo $row['id']; ?>';">Delete</button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </form>
    </div>

    <div class="popup-form-container" id="tambahPopupForm">
        <div class="input-group">
            <h2>Tambah Data Buku</h1>
            <form method="POST" action="index.php?page=tambah_buku" enctype="multipart/form-data">
                <div class="input-box">
                    <label for="judul_buku">Judul Buku :</label>
                    <input type="text" id="judul_buku" name="judul_buku" placeholder="Judul Buku">
                </div>
                
                <div class="input-box">
                    <label for="pengarang">Pengarang :</label>
                    <input type="text" id="pengarang" name="pengarang" placeholder="Pengarang">
                </div>

                <div class="input-box">
                    <label for="penerbit">Penerbit :</label>
                    <input type="text" id="penerbit" name="penerbit" placeholder="Penerbit">
                </div>

                <div class="input-box">
                    <label for="baik">Banyak Buku Baik :</label>
                    <input type="number" id="baik" name="baik" placeholder="Banyak Buku Baik">
                </div>

                <div class="input-box">
                    <label for="rusak">Banyak Buku Rusak :</label>
                    <input type="number" id="rusak" name="rusak" placeholder="Banyak Buku Rusak">
                </div>

                <div class="input-box">
                    <label for="jumlah_buku">Jumlah Buku :</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" placeholder="Jumlah Buku">
                </div>

                <div class="input-box">
                    <label for="gambar_buku">Gambar Buku :</label>
                    <input type="file" name="gambar_buku" accept="image/*" required />
                </div>

                <button type="submit" name="btn-popup" class="btn-popup tambah-popup">Tambah</button>
            </form>
        </div>
    </div>

    <div class="popup-form-container" id="updatePopupForm">
        <div class="input-group">
            <h2>Update Data Buku</h1>
            <form method="POST" action="index.php?page=update_buku" enctype="multipart/form-data">
            <div class="input-box">
                    <label for="judul_buku">Judul Buku :</label>
                    <input type="text" id="judul_buku" name="judul_buku" value="<?php echo $row['judul_buku']; ?>">
                </div>
                
                <div class="input-box">
                    <label for="pengarang">Pengarang :</label>
                    <input type="text" id="pengarang" name="pengarang" value="<?php echo $row['pengarang']; ?>">
                </div>

                <div class="input-box">
                    <label for="penerbit">Penerbit :</label>
                    <input type="text" id="penerbit" name="penerbit" value="<?php echo $row['penerbit']; ?>">
                </div>

                <div class="input-box">
                    <label for="baik">Banyak Buku Baik :</label>
                    <input type="number" id="baik" name="baik" value="<?php echo $row['buku_baik']; ?>">
                </div>

                <div class="input-box">
                    <label for="rusak">Banyak Buku Rusak :</label>
                    <input type="number" id="rusak" name="rusak" value="<?php echo $row['buku_rusak']; ?>">
                </div>

                <div class="input-box">
                    <label for="jumlah_buku">Jumlah Buku :</label>
                    <input type="number" id="jumlah_buku" name="jumlah_buku" value="<?php echo $row['jumlah_buku']; ?>">
                </div>

                <div class="input-box">
                    <label for="gambar_buku">Gambar Buku :</label>
                    <input type="file" id="gambar_buku" name="gambar_buku" accept="image/png, image/jpeg, image/jpg">
                </div>

                <button type="submit" name="btn-popup" class="btn-popup update-popup">Update</button>
            </form>
        </div>
    </div>

    <script src="Page/admin/data/popup.js"></script>
</body>
</html>

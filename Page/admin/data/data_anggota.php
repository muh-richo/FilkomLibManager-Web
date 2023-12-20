<!DOCTYPE html>
            <html>
            <head>
                <link rel="stylesheet" href="Page/admin/data/data.css">
                <title>Data Anggota Perpustakaan</title>
                <style>
                    th:nth-child(8), td:nth-child(8) {
                        width: 200px;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <form method="POST">
                        <h1 style="text-align: center">Data Anggota Perpustakaan</h1>
                        <button type="button" class="tambah" onclick="tambahForm()">Tambah Data Anggota</button>
                        <table>
                            <tbody>
                                <tr class="kategori">
                                    <td>No</td>
                                    <td>Kode Anggota</td>
                                    <td>NIM</td>
                                    <td>Nama Lengkap</td>
                                    <td>Email</td>
                                    <td>Password</td>
                                    <td>Alamat</td>
                                    <td class="kategori-aksi">Aksi</td>
                                </tr>
                                <?php foreach ($data as $row) { ?>
                                    <tr class="data">
                                        <td><?php echo $row['id_user']; ?></td>
                                        <td><?php echo $row['kode_anggota']; ?></td>
                                        <td><?php echo $row['nim']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['password']; ?></td>
                                        <td><?php echo $row['alamat']; ?></td>
                                        <td class="aksi">
                                            <button type="button" class="update" onclick="updateForm(<?php echo $row['id_user']; ?>)">Update</button>
                                            <button type="button" class="delete" onclick="window.location.href = 'index.php?page=delete_anggota&id=<?php echo $row['id_user']; ?>';">Delete</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            
                <div class="popup-form-container" id="tambahPopupForm">
        <div class="input-group">
            <h2>Tambah Data Anggota</h1>
            <form method="POST" action="index.php?page=tambah_anggota">
                <div class="input-box">
                    <label for="kode_anggota">Kode Anggota :</label>
                    <input type="text" id="kode_anggota" name="kode_anggota" placeholder="Kode Anggota">
                </div>
                
                <div class="input-box">
                    <label for="nim">NIM :</label>
                    <input type="text" id="nim" name="nim" placeholder="NIM">
                </div>

                <div class="input-box">
                    <label for="fullname">Nama Lengkap :</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Nama Lengkap">
                </div>

                <div class="input-box">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" placeholder="Email">
                </div>

                <div class="input-box">
                    <label for="password">Password :</label>
                    <input type="text" id="password" name="password" placeholder="Password">
                </div>

                <div class="input-box">
                    <label for="alamat">Alamat :</label>
                    <input type="text" id="alamat" name="alamat" placeholder="Alamat">
                </div>

                <button type="submit" name="btn-popup" class="btn-popup tambah-popup">Tambah</button>
            </form>
        </div>
    </div>

    <div class="popup-form-container" id="updatePopupForm">
        <div class="input-group">
            <h2>Update Data Anggota</h1>
            <form method="POST" action="index.php?page=update_anggota">
                <div class="input-box">
                    <label for="kode_anggota">Kode Anggota :</label>
                    <input type="text" id="kode_anggota" name="kode_anggota" value="<?php echo $row['kode_anggota']; ?>">
                </div>
                
                <div class="input-box">
                    <label for="nim">NIM :</label>
                    <input type="text" id="nim" name="nim" value="<?php echo $row['nim']; ?>">
                </div>

                <div class="input-box">
                    <label for="fullname">Nama Lengkap :</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>">
                </div>

                <div class="input-box">
                    <label for="email">Email :</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                </div>

                <div class="input-box">
                    <label for="password">Password :</label>
                    <input type="text" id="password" name="password" value="<?php echo $row['password']; ?>">
                </div>

                <div class="input-box">
                    <label for="alamat">Alamat :</label>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>">
                </div>

                <button type="submit" name="btn-popup" class="btn-popup update-popup">Update</button>
            </form>
        </div>
    </div>
            
    <script src="Page/admin/data/popup.js"></script>
    </body>
</html>

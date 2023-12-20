<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/admin/data/data.css">
    <title>Data Buku Perpustakaan</title>
    <style>
        th:nth-child(1), td:nth-child(1) {
            width: 10px;
        }
        th:nth-child(4), td:nth-child(4) {
            width: 100px;
        }
        th:nth-child(5), td:nth-child(5) {
            width: 100px;
        }
        th:nth-child(6), td:nth-child(6) {
            width: 120px;
        }
        th:nth-child(7), td:nth-child(7) {
            width: 110px;
        }
        th:nth-child(8), td:nth-child(8) {
            width: 100px;
        }
        th:nth-child(9), td:nth-child(9) {
            width: 200px;
        }
    </style>
</head>
<body>
<div class="container">
        <form method="POST">
            <h1 style="text-align: center">Data Peminjaman Buku</h1>
            <button type="button" class="tambah" style="width: 230px;" onclick="tambahForm()">Tambah Data Peminjaman Buku</button>
            <table>
                <tbody>
                    <tr class="kategori">
                        <td>No</td>
                        <td>Nama Anggota</td>
                        <td>Judul Buku</td>
                        <td>Tanggal Peminjaman</td>
                        <td>Tanggal Pengembalian</td>
                        <td>Kondisi Buku Dipinjam</td>
                        <td>Kondisi Buku Dikembalikan</td>
                        <td>Denda</td>
                        <td class="kategori-aksi">Aksi</td>
                    </tr>
                    <?php
                    // Connect to the database
                    require_once "config/koneksi.php";
                    $conn = getConnection();

                    // Fetch data from the database
                    $sql = "SELECT * FROM pengembalian";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row_number = 1;
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr class="data">';
                            echo '<td>' . $row_number . '</td>';
                            echo '<td>' . $row["nama_anggota"] . '</td>';
                            echo '<td>' . $row["judul_buku"] . '</td>';
                            echo '<td>' . $row["tanggal_pinjam"] . '</td>';
                            echo '<td>' . $row["tanggal_kembali"] . '</td>';
                            echo '<td>' . $row["kondisi"] . '</td>';
                            echo '<td>' . $row["kondisi_akhir"] . '</td>';
                            echo '<td>' . $row["denda"] . '</td>';
                            echo '<td class="aksi">';
                            echo '<button type="button" class="update" onclick="updateForm(' . json_encode($row) . ')">Update</button>';
                            echo '<button type="button" class="delete" onclick="window.location.href = \'index.php?page=delete_peminjaman&id=' . $row_number . '\';">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                            $row_number++;
                        }
                    } else {
                        echo '<tr><td colspan="9">No data available</td></tr>';
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <div class="popup-form-container" id="tambahPopupForm">
        <div class="input-group">
            <h2>Tambah Data Peminjaman Buku</h1>
            <form method="POST" action="index.php?page=tambah_peminjaman">
                <div class="input-box">
                    <label for="nama_anggota">Nama Anggota :</label>
                    <input type="text" id="nama_anggota" name="nama_anggota" placeholder="Nama Anggota">
                </div>
                
                <div class="input-box">
                    <label for="judul_buku">Judul Buku :</label>
                    <input type="text" id="judul_buku" name="judul_buku" placeholder="Judul Buku">
                </div>

                <div class="input-box">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman :</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="Tanggal Peminjaman">
                </div>

                <div class="input-box">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian :</label>
                    <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" placeholder="Tanggal Pengembalian">
                </div>

                <div class="input-box">
                    <label for="kondisi_dipinjam">Kondisi Buku Dipinjam :</label>
                    <select id="kondisi_dipinjam" name="kondisi_dipinjam">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <option value="baik">Baik</option>
                        <option value="buruk">Buruk</option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="kondisi_dikembalikan">Kondisi Buku Dikembalikan :</label>
                    <select id="kondisi_dikembalikan" name="kondisi_dikembalikan">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <option value="baik">Baik</option>
                        <option value="buruk">Buruk</option>
                    </select>
                </div>

                <button type="submit" name="btn-popup" class="btn-popup tambah-popup">Tambah</button>
            </form>
        </div>
    </div>

    <div class="popup-form-container" id="updatePopupForm">
        <div class="input-group">
            <h2>Update Data Peminjaman Buku</h1>
            <form method="POST" action="index.php?page=update_peminjaman">
                <div class="input-box">
                    <label for="nama_anggota">Nama Anggota :</label>
                    <input type="text" id="nama_anggota" name="nama_anggota" placeholder="Data">
                </div>
                
                <div class="input-box">
                    <label for="judul_buku">Judul Buku :</label>
                    <input type="text" id="judul_buku" name="judul_buku" placeholder="Data">
                </div>

                <div class="input-box">
                    <label for="tanggal_peminjaman">Tanggal Peminjaman :</label>
                    <input type="date" id="tanggal_peminjaman" name="tanggal_peminjaman" placeholder="Data">
                </div>

                <div class="input-box">
                    <label for="tanggal_pengembalian">Tanggal Pengembalian :</label>
                    <input type="date" id="tanggal_pengembalian" name="tanggal_pengembalian" placeholder="Data">
                </div>

                <div class="input-box">
                    <label for="kondisi_dipinjam">Kondisi Buku Dipinjam :</label>
                    <select id="kondisi_dipinjam" name="kondisi_dipinjam">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <option value="baik">Baik</option>
                        <option value="buruk">Buruk</option>
                    </select>
                </div>

                <div class="input-box">
                    <label for="kondisi_dikembalikan">Kondisi Buku Dikembalikan :</label>
                    <select id="kondisi_dikembalikan" name="kondisi_dikembalikan">
                        <option value="" disabled selected>Pilih salah satu</option>
                        <option value="baik">Baik</option>
                        <option value="buruk">Buruk</option>
                    </select>
                </div>

                <button type="submit" name="btn-popup" class="btn-popup update-popup">Update</button>
            </form>
        </div>
    </div>

    <script src="Page/admin/data/popup.js"></script>
</body>
</html>

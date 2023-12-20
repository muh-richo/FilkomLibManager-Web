<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="Page/pengguna/riwayat/riwayat.css">
    <title>Peminjaman Buku</title>
</head>
<body>
    <div class="container">
        <h1>Riwayat Peminjaman Buku</h1>
        <table>
            <tbody>
                <tr class="kategori">
                    <td>No</td>
                    <td>Nama Anggota</td>
                    <td>Judul Buku</td>
                    <td>Tanggal Peminjaman</td>
                    <td>Tanggal Pengembalian</td>
                    <td>Kondisi Buku Saat Dipinjam</td>
                    <td>Kondisi Buku Saat Dikembalikan</td>
                    <td>Denda</td>
                </tr>
                <?php
                    // Check if there is data available
                    if (isset($pengembalianData) && !empty($pengembalianData)) {
                        // Loop through the data and populate the table rows dynamically
                        foreach ($pengembalianData as $index => $data) {
                            $no = $index + 1;
                            $namaAnggota = $data['nama_anggota'];
                            $judulBuku = $data['judul_buku'];
                            $tanggalPinjam = $data['tanggal_pinjam'];
                            $tanggalKembali = $data['tanggal_kembali'];
                            $kondisiAwal = $data['kondisi'];
                            $kondisiAkhir = $data['kondisi_akhir'];
                            $denda = $data['denda'];
                            
                            echo "<tr class='data'>";
                            echo "<td>$no</td>";
                            echo "<td>$namaAnggota</td>";
                            echo "<td>$judulBuku</td>";
                            echo "<td>$tanggalPinjam</td>";
                            echo "<td>$tanggalKembali</td>";
                            echo "<td>$kondisiAwal</td>";
                            echo "<td>$kondisiAkhir</td>";
                            echo "<td>Rp $denda</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>No data available.</td></tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
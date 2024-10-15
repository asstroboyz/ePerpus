<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi</title>
</head>

<body>
    <style type="text/css">
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr th,
        table tr td {
            border: 1px solid black;
            font-size: 11pt;
            padding: 10px;
        }

        .text-center {
            text-align: center;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>

    <div class="text-center">
        <h2>Laporan Jenis Buku</h2>
        <h3>Perpustakaan</h3>
        <p class="desc">Dicetak Pada tanggal <?= date('d M Y'); ?></p>
    </div>
    <br />
    <table>
        <tr>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Tahun Terbit</th>
            <th>Tempat Terbit</th>
            <th>Jumlah Buku</th>
            <th>ISBN</th>
        </tr>
        <?php
        $no = 1;
        foreach ($laporan as $isi) :
        ?>
            <tr>
                <td align="center"><?= $isi['kode_buku']; ?></td>
                <td align="center"><?= $isi['judul_buku']; ?></td>
                <td align="center"><?= $isi['pengarang']; ?></td>
                <td align="center"><?= $isi['penerbit']; ?></td>
                <td align="center"><?= $isi['tahun_terbit']; ?></td>
                <td align="center"><?= $isi['tempat_terbit']; ?></td>
                <td align="center"><?= $isi['jumlah_buku']; ?></td>
                <td align="center"><?= $isi['isbn']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
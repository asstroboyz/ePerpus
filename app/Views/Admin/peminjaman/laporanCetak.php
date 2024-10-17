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
        <h2>Laporan Data Peminjaman</h2>
        <h3>Perpustakaan</h3>
        <p class="desc">Dicetak Pada tanggal <?= date('d M Y'); ?></p>
    </div>
    <br />
    <table>
        <tr>
            <th>Kode Pinjam</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>nama Siswa</th>
            <th>Kelas</th>
            <th>Jumlah Pinjam</th>
            <th>Kondisi Buku</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Pengembalian</th>
            <th>Status</th>
            <th>Denda</th>
        </tr>
        <?php
        $no = 1;
        foreach ($laporan as $data) :
        ?>
            <tr>
                <td align="center"><?= $data['kode_pinjam']; ?></td>
                <td align="center"><?= $data['kode_buku']; ?></td>
                <td align="center"><?= $data['judul_buku']; ?></td>
                <td align="center"><?= $data['nama']; ?></td>
                <td align="center"><?= $data['kelas']; ?></td>
                <td align="center"><?= $data['jumlah_pinjam']; ?></td>
                <td align="center"><?= $data['kondisi_buku']; ?></td>
                <td align="center"><?= $data['tanggal_pinjam']; ?></td>
                <td align="center"><?= $data['tanggal_pengembalian']; ?></td>
                <td align="center"><?= $data['status']; ?></td>
                <?php $date1 = new DateTime($data['tanggal_pengembalian']) ?>
                <?php $date2 = new DateTime(date('Y-m-d')) ?>
                <?php $days  = $date2->diff($date1)->format('%a'); ?>
                <!-- Denda -->
                <?php $denda = 2000 * $days ?>
                <td align="center"><?= date('Y-m-d') > $data['tanggal_pengembalian'] ? "Rp $denda" : "Tidak Denda"; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>
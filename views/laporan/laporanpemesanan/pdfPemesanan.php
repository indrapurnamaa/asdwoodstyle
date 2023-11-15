<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div style="text-align: center;">
        <img src="data:image/png;base64,<?= $logoBase64 ?>" alt="Logo" style="width: 100%; height: auto;">
        <h2 class="text-center">Laporan Data Pemesanan</h2>
    </div>
    <p style="font-size: 14px;">
        Periode : <?= date('d-m-Y', strtotime($startDate)) ?> hingga <?= date('d-m-Y', strtotime($endDate)) ?>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>No.Pesanan</th>
                <th>No.Invoice</th>
                <th>Tanggal Pemesanan</th>
                <th>Nama Pembeli</th>
                <th>Qty</th>
                <th>Nama Furniture</th>
                <th>Pekerjaan</th>
                <th>Harga Unit</th>
                <th>Status</th>
                <th>Harga Total</th>
                <th>DP</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            <?php foreach ($data as $index => $pemesanan) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pemesanan->no_pemesanan ?></td>
                    <td><?= $pemesanan->no_invoice ?></td>
                    <td><?= $pemesanan->tanggal_pemesanan ?></td>
                    <td><?= $pemesanan->pembeli->nama_pembeli ?></td>
                    <td><?= $pemesanan->qty ?></td>
                    <td><?= $pemesanan->furniture->nama_furniture ?></td>
                    <td><?= $pemesanan->pekerjaan ?></td>
                    <td>Rp.<?= number_format($pemesanan->harga_unit, 0, ',', '.') ?></td>
                    <td><?= $pemesanan->status ?></td>
                    <td>Rp.<?= number_format($pemesanan->harga_total, 0, ',', '.') ?></td>
                    <td>Rp.<?= number_format($pemesanan->dp, 0, ',', '.') ?></td>
                    <td>Rp.<?= number_format($pemesanan->sisa, 0, ',', '.') ?></td>

                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="12" class="total">Total</td>
                <!-- Tambahkan kolom total untuk setiap atribut yang akan dijumlahkan -->
                <td class="total">Rp.<?= number_format($totalHarga, 0, ',', '.') ?></td>
                <!-- Tambahkan kolom total lainnya sesuai dengan data yang ingin dijumlahkan -->
            </tr>
        </tbody>
    </table>
</body>

</html>
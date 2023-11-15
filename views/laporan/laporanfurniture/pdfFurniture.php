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
        <h2 class="text-center">Laporan Data Furniture</h2>
    </div>
    <p style="font-size: 14px;">
        Periode : <?= date('d-m-Y', strtotime($startDate)) ?> hingga <?= date('d-m-Y', strtotime($endDate)) ?>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Furniture</th>
                <th>Deskripsi</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            <?php foreach ($data as $index => $furniture) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $furniture->nama_furniture ?></td>
                    <td><?= $furniture->deskripsi ?></td>
                    <td>Rp.<?= number_format($furniture->harga, 0, ',', '.') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
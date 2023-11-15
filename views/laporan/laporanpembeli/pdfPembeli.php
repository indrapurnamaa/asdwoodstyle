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
        <h2 class="text-center">Laporan Data Pembeli</h2>
    </div>
    <p style="font-size: 14px;">
        Periode : <?= date('d-m-Y', strtotime($startDate)) ?> hingga <?= date('d-m-Y', strtotime($endDate)) ?>
    </p>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pembeli</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            ?>
            <?php foreach ($data as $index => $pembeli) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $pembeli->nama_pembeli ?></td>
                    <td><?= $pembeli->alamat ?></td>
                    <td><?= $pembeli->no_telp ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
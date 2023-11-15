<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 10pt;
        }

        p {
            margin: 0pt;
        }

        .line-height {
            line-height: 1.6;
        }


        table.items {
            border: 1px solid #000000;
        }

        td {
            vertical-align: top;
        }

        .items td {
            border-left: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        table thead td {
            background-color: #FFFFFF;
            text-align: center;
            border: 1px solid #000000;
        }

        .items td.blanktotal {
            background-color: #EEEEEE;
            border: 1px solid #000000;
            background-color: #FFFFFF;
            border: 1px none #000000;
            border-top: 1px solid #000000;
            border-right: 1px solid #000000;
        }

        .items td.totals {
            text-align: right;
            border: 1px solid #000000;
        }

        .items td.total {
            text-align: center;
            border: 1px solid #000000;
        }

        .items td.cost {
            text-align: center;
        }

        .hr {
            margin-top: 200px;
            margin-bottom: 200px;
            border: none;
            /* border: 0; */
            /* border-top: 1px solid rgb(143, 143, 143); */
        }
    </style>
</head>

<body>
    <htmlpageheader name="myheader">
        <img src="data:image/png;base64,<?= $logoBase64 ?>" alt="Logo" style="width: 25%; height: auto;">
        <table width="100%">
            <tr>
                <td class="line-height">Jl.Widuri Basangtamiang, Kapal,<br />Mengwi, Badung<br />
                    <span style="font-family:dejavusanscondensed;">&#9990;</span> 08579277660
                </td>
            </tr>
        </table>
    </htmlpageheader>
    <br>
    <br>
    <br>
    <br>
    <sethtmlpageheader name="myheader" value="on" show-this-page="1" />
    <div style="text-align: center; font-size:large; ">Invoice No.</div>
    <div style="text-align: center; font-weight: bold; font-size: 12pt;  "><?= $model->no_invoice ?></div>
    <br>
    <table width="100%" cellpadding="10">
        <tr>
            <td class="line-height" width="45%"><span>Invoice To :</span>
                <br /><?= $model->pembeli->nama_pembeli ?>
                <br /><?= $model->pembeli->alamat ?>
                <br /><?= $model->pembeli->no_telp ?>
            </td>
            <td class="line-height" style="text-align: right;" width="45%"><span> Order No :</span>
                <br />
                <div style="font-weight: bold;"><?= $model->no_pemesanan ?></div>
            </td>
        </tr>
        <table width="100%" style="margin-top:8px">
            <tr>
                <td class="line-height" style="text-align: right" width="45%"><span>Invoice Date :</span>
                    <br />
                    <?= date('d-m-Y H:i', strtotime($model->tanggal_pemesanan)) ?>
                    WITA
                </td>
            </tr>
        </table>
    </table>
    <br />
    <table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
        <thead>
            <tr>
                <td width="10%">Qty</td>
                <td width="45%">Description</td>
                <td width="15%">Job</td>
                <td width="15%">Unit Price</td>
                <td width="15%">Line Total</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr>
                <td align ="center"><?= $model->qty ?></td>
                <td><?= $model->furniture->deskripsi ?></td>
                <td><?= $model->pekerjaan ?></td>
                <td class="cost">Rp.<?= number_format($model->harga_unit, 0, ',', '.') ?></td>
                <td class="cost">Rp.<?= number_format($model->harga_total, 0, ',', '.') ?></td>
            </tr>
            <!-- END ITEMS HERE -->
            <tr>
                <td class="blanktotal" colspan="3" rowspan="3"></td>
                <td class="totals"><b>Sub Total:</b></td>
                <td class="total cost">Rp.<?= number_format($model->harga_total, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="totals"><b>DP:</b></td>
                <td class="total cost">Rp.<?= number_format($model->dp, 0, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="totals"><b>Amount Due:</b></td>
                <td class="total cost">Rp.<?= number_format($model->sisa, 0, ',', '.') ?></td>
            </tr>
        </tbody>
    </table>
    <!-- Note for payment -->
    <table width="100%" style="margin-top: 10px;">
        <tr>
            <td>
                The rest of the payment can be transferred to the following account number :
            </td>
        </tr>
    </table>
    <table style="width: 35%; font-size: 9.5pt; line-height: 1.4;">
        <tr>
            <td style="text-align: left;">Bank name</td>
            <td>: BRI</td>
        </tr>
        <tr>
            <td style="text-align: left;">Acc Name</td>
            <td>: I Ketut Sudirtayasa SE</td>
        </tr>
        <tr>
            <td style="text-align: left;">Acc Number</td>
            <td>: 057301007582507</td>
        </tr>
    </table>

    <!-- Tanda tangan
    <div style="text-align: right; margin-top: 100px;">
        <span style="border-top: 1px solid #000; padding-top: 10px;">Kadek Indra Purnama Mertayana</span>
    </div> -->
    <div style="text-align: center; font-size:12pt; font-weight:bold; margin-top: 50px; line-height:1.5; font-style:italic;">
        THANK YOU FOR TRUSTING US
    </div>
</body>

</html>
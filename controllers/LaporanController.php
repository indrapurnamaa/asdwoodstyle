<?php

namespace app\controllers;

use app\models\Furniture;
use app\models\FurnitureSearch;
use app\models\Pembeli;
use app\models\PembeliSearch;
use app\models\Pemesanan;
use app\models\PemesananSearch;
use Mpdf\Mpdf;
use Yii;
use yii\base\Controller;
use yii\filters\AccessControl;

class LaporanController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['laporan-furniture', 'laporan-pemesanan', 'laporan-pembeli'],
                    'rules' => [
                        [

                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function actionLaporanFurniture()
    {
        $searchModel = new FurnitureSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/laporan/laporanfurniture/furniture', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCetakFurniture()
    {
        $searchModel = new FurnitureSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Path gambar logo (ganti dengan path/logo yang sesuai)
        $logoPath = '/img/kopasd.png';

        // Baca konten gambar
        $logoContent = file_get_contents(Yii::getAlias('@webroot' . $logoPath));

        // Konversi konten gambar menjadi base64
        $logoBase64 = base64_encode($logoContent);
        $startDate = $searchModel['start_date'];
        $endDate = $searchModel['end_date'];

        $data = Furniture::find()
            ->where(['>=', 'created_at', $startDate])
            ->andWhere(['<=', 'created_at', $endDate])
            ->all();

        $content = $this->renderPartial('laporanfurniture/pdfFurniture', [
            'data' => $data,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'logoBase64' => $logoBase64,

        ]);
        $fileName = 'Laporan Data Furniture.pdf';
        $mpdf = new Mpdf(['c', 'A4', '', '', 0, 0, 0, 0, 0, 0, 'orientation' => 'L']);
        $mpdf->SetTitle("Laporan Data Furniture");
        $footer = '<div style="text-align: center;">Page {PAGENO} of {nbpg}</div>';
        $mpdf->SetHTMLFooter($footer);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $stylesheet = file_get_contents('css/print.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($content, 2);
        $mpdf->Output($fileName, 'I');
        exit;

        return $this->render('/laporanfurniture/searchFurniture', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanPemesanan()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/laporan/laporanpemesanan/pemesanan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCetakPemesanan()
    {
        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Path gambar logo (ganti dengan path/logo yang sesuai)
        $logoPath = '/img/kopasd.png';

        // Baca konten gambar
        $logoContent = file_get_contents(Yii::getAlias('@webroot' . $logoPath));

        // Konversi konten gambar menjadi base64
        $logoBase64 = base64_encode($logoContent);
        $startDate = $searchModel['start_date'];
        $endDate = $searchModel['end_date'];
        $status = $searchModel['status'];

        $query = Pemesanan::find()
            ->where(['>=', 'tanggal_pemesanan', $startDate])
            ->andWhere(['<=', 'tanggal_pemesanan', $endDate]);

        if ($status !== '') {
            $query->andWhere(['status' => $status]);
        }

        $data = $query->all();

        // Hitung total harga
        $totalHarga = 0;
        foreach ($data as $total) {
            $totalHarga += $total->sisa;
        }

        $content = $this->renderPartial('laporanpemesanan/pdfPemesanan', [
            'data' => $data,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'status' => $status,
            'totalHarga' => $totalHarga,
            'logoBase64' => $logoBase64,

        ]);
        $fileName = 'Laporan Data Pemesanan.pdf';
        $mpdf = new Mpdf(['c', 'A4', '', '', 0, 0, 0, 0, 0, 0, 'orientation' => 'L']);
        $mpdf->SetTitle("Laporan Data Pemesanan");
        $footer = '<div style="text-align: center;">Page {PAGENO} of {nbpg}</div>';
        $mpdf->SetHTMLFooter($footer);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $stylesheet = file_get_contents('css/print.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($content, 2);
        $mpdf->Output($fileName, 'I');
        exit;

        return $this->render('/laporanfurniture/searchPemesanan', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionLaporanPembeli()
    {
        $searchModel = new PembeliSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('/laporan/laporanpembeli/pembeli', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionCetakPembeli()
    {
        $searchModel = new PembeliSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // Path gambar logo (ganti dengan path/logo yang sesuai)
        $logoPath = '/img/kopasd.png';

        // Baca konten gambar
        $logoContent = file_get_contents(Yii::getAlias('@webroot' . $logoPath));

        // Konversi konten gambar menjadi base64
        $logoBase64 = base64_encode($logoContent);
        $startDate = $searchModel['start_date'];
        $endDate = $searchModel['end_date'];

        $data = Pembeli::find()
            ->where(['>=', 'created_at', $startDate])
            ->andWhere(['<=', 'created_at', $endDate])
            ->all();

        $content = $this->renderPartial('laporanpembeli/pdfPembeli', [
            'data' => $data,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'logoBase64' => $logoBase64,
        ]);
        $fileName = 'Laporan Data Pembeli.pdf';
        $mpdf = new Mpdf(['c', 'A4', '', '', 0, 0, 0, 0, 0, 0, 'orientation' => 'L']);
        $mpdf->SetTitle("Laporan Data Pembeli");
        $footer = '<div style="text-align: center;">Page {PAGENO} of {nbpg}</div>';
        $mpdf->SetHTMLFooter($footer);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0;
        $stylesheet = file_get_contents('css/print.css');
        $mpdf->WriteHTML($stylesheet, 1);
        $mpdf->WriteHTML($content, 2);
        $mpdf->Output($fileName, 'I');
        exit;

        return $this->render('/laporanpembeli/searchPembeli', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}

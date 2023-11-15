<?php

namespace app\controllers;

use app\models\form\PemesananForm;
use app\models\search\PemesananSearch;
use app\models\table\FurnitureTable;
use app\models\table\PemesananTable;
use Mpdf\Mpdf;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class PemesananController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['pemesanan', 'tambah-pesanan', 'ubah-pesanan', 'hapus-pesanan', 'detail-pesanan', 'cetal-laporan'],
                    'rules' => [
                        [
                            'actions' => ['pemesanan', 'tambah-pesanan', 'ubah-pesanan', 'hapus-pesanan', 'detail-pesanan', 'cetal-laporan'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }


    public function actionPemesanan()
    {

        $searchModel = new PemesananSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTambahPesanan()
    {
        $model = new PemesananForm();

        if ($model->load($this->request->post()) && $model->validate()) {

            if ($model->savePesanan()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil di simpan.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil di simpan.');
            }

            return $this->redirect(['pemesanan']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUbahPesanan($id)
    {
        $table = $this->findModel($id);
        $model = new PemesananForm();
        $model->id = $table->id;
        $model->no_pemesanan = $table->no_pemesanan;
        $model->no_invoice = $table->no_invoice;
        $model->id_pembeli = $table->id_pembeli;
        $model->tanggal_pemesanan = $table->tanggal_pemesanan;
        $model->id_furniture = $table->id_furniture;
        $model->qty = $table->qty;
        $model->pekerjaan = $table->pekerjaan;
        $model->harga_unit = $table->harga_unit;
        $model->harga_total = $table->harga_total;
        $model->dp = $table->dp;
        $model->sisa = $table->sisa;
        $model->status = $table->status;

        if ($model->load($this->request->post()) && $model->validate()) {

            if ($model->updatePesanan()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil diperbarui.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil diperbarui.');
            }

            return $this->redirect(['pemesanan']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionHapusPesanan($id)
    {
        $model = $this->findModel($id);

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil di hapus.');
        } else {
            Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil di simpan.');
        }
        return $this->redirect(['pemesanan']);
    }


    public function actionDetailPesanan($id)
    {
        $model = $this->findModel($id);

        return $this->render('detail', [
            'model' => $model,
        ]);
    }

    public function actionCetakInvoice($id)
    {
        $model = $this->findModel($id);
        // Path gambar logo (ganti dengan path/logo yang sesuai)
        // $logoPath = '/img/kopasd.png';

        // Baca konten gambar
        $logoContent = file_get_contents(Yii::getAlias('@webroot/img/logoasd.png'));

        // Konversi konten gambar menjadi base64
        $logoBase64 = base64_encode($logoContent);
        $model->pembeli->no_telp = $this->convertNomorTelepon($model->pembeli->no_telp);
        $html = $this->renderPartial('invoice', [
            'model' => $model,
            'logoBase64' => $logoBase64,
        ]);
        $mpdf = new Mpdf([
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 48,
            'margin_bottom' => 25,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("INVOICE-" . $model->no_invoice);
        $mpdf->SetAuthor("ASD Woodstyle Custom Furniture.");
        $mpdf->SetDisplayMode('fullpage');
        $fileName = 'INVOICE' . $model->no_invoice . '.pdf';
        $mpdf->WriteHTML($html);
        $mpdf->Output($fileName, 'I');
    }

    public function actionAmbilHargaFurniture($id)
    {
        $furniture = FurnitureTable::findOne($id);

        // Mengembalikan response dalam format JSON agar value muncul dalam form harga
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['harga' => $furniture->harga];
    }

    // Fungsi untuk mengubah format nomor telepon
    private function convertNomorTelepon($nomorTelepon)
    {
        if (strpos($nomorTelepon, '+62') === 0) {
            $nomorTelepon = '0' . substr($nomorTelepon, 3);
        }
        return $nomorTelepon;
    }

    protected function findModel($id)
    {
        if (($model = PemesananTable::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

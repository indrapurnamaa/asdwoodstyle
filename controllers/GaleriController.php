<?php

namespace app\controllers;

use app\models\form\GaleriForm;
use app\models\table\GaleriTable;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class GaleriController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['galeri', 'tambah-galeri', 'hapus-galeri'],
                    'rules' => [
                        [
                            'actions' => ['galeri', 'tambah-galeri', 'hapus-galeri'],
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

    public function actionGaleri()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => GaleriTable::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTambahGaleri()
    {
        $model = new GaleriForm();

        if ($model->load($this->request->post())) {
            $model->fileGambar = UploadedFile::getInstance($model, 'fileGambar');
            if ($model->saveGambar()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Gambar berhasil disimpan.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Gambar tidak berhasil disimpan.');
            }

            return $this->redirect(['galeri']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionHapusGambar($id)
    {
        $model = $this->findModel($id);

        if (!empty($model->gambar)) {
            $gambarPath = 'img/galeri/' . $model->gambar;

            if (file_exists($gambarPath)) {
                unlink($gambarPath);
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Gambar berhasil dihapus.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Gambar tidak berhasil dihapus.');
            }
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Gambar berhasil dihapus.');
        } else {
            Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Gambar tidak berhasil dihapus.');
        }

        return $this->redirect(['galeri']);
    }


    protected function findModel($id)
    {
        if (($model = GaleriTable::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

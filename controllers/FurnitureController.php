<?php

namespace app\controllers;

use app\models\form\FurnitureForm;
use app\models\search\FurnitureSearch;
use app\models\table\FurnitureTable;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

class FurnitureController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['furniture', 'tambah-furnitue', 'ubah-furniture', 'detail-furniture'],
                    'rules' => [
                        [
                            'actions' => ['furniture', 'tambah-furnitue', 'ubah-furniture', 'detail-furniture'],
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

    public function actionFurniture()
    {
        $searchModel = new FurnitureSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionTambahFurniture()
    {
        $model = new FurnitureForm();

        if ($model->load($this->request->post()) && $model->validate()) {
            $model->fileGambar = UploadedFile::getInstance($model, 'fileGambar');
            $trimFileName = str_replace(' ', '', $model->nama_furniture);
            $fileName = $trimFileName . date('dmYHi');

            if ($model->fileGambar !== null && $model->fileGambar->tempName !== null) {
                $namaGambar = $fileName . '.' . $model->fileGambar->extension;
                $model->gambar = $namaGambar;
                $model->saveFurniture();
                $model->fileGambar->saveAs('img/furniture/' . $namaGambar);
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil disimpan.');
            } elseif ($model->saveFurniture()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil disimpan.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil disimpan.');
            }

            return $this->redirect(['furniture']);
        }


        return $this->render('create', [
            'model' => $model,
        ]);
    }


    public function actionUbahFurniture($id)
    {
        $table = $this->findModel($id);
        $model = new FurnitureForm();
        $model->id = $table->id;
        $model->nama_furniture = $table->nama_furniture;
        $model->deskripsi = $table->deskripsi;
        $model->harga = $table->harga;
        $model->gambar = $table->gambar;

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->fileGambar = UploadedFile::getInstance($model, 'fileGambar');
                $trimFileName = str_replace(' ', '', $model->nama_furniture);
                $fileName = $trimFileName . date('dmYHi');

                if ($model->validate()) {
                    if ($model->fileGambar !== null && $model->fileGambar->tempName !== null) {
                        $namaGambar = $fileName . '.' . $model->fileGambar->extension;
                        $model->gambar = $namaGambar;
                        $model->updateFurniture();
                        $model->fileGambar->saveAs('img/furniture/' . $namaGambar);
                        Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil diperbarui.');
                    } elseif ($model->updateFurniture()) {
                        Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil diperbarui.');
                    } else {
                        Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil diperbarui.');
                    }

                    return $this->redirect(['furniture']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionHapusFurniture($id)
    {
        $model = $this->findModel($id);

        if (!empty($model->gambar)) {
            $gambarPath = 'img/furniture/' . $model->gambar;

            if (file_exists($gambarPath)) {
                unlink($gambarPath);
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil dihapus.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil dihapus.');
            }
        }

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil dihapus.');
        } else {
            Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil dihapus.');
        }

        return $this->redirect(['furniture']);
    }

    public function actionDetailFurniture($id)
    {
        return $this->render('detail', [
            'model' => $this->findModel($id),
        ]);
    }

    protected function findModel($id)
    {
        if (($model = FurnitureTable::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

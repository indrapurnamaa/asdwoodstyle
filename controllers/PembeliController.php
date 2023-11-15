<?php

namespace app\controllers;

use app\models\form\PembeliForm;
use app\models\search\PembeliSearch;
use app\models\table\PembeliTable;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;

class PembeliController extends Controller
{

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['pembeli', 'tambah-pembeli', 'ubah-pembeli', 'hapus-pembeli'],
                    'rules' => [
                        [
                            'actions' => ['pembeli', 'tambah-pembeli', 'ubah-pembeli', 'hapus-pembeli'],
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


    public function actionPembeli()
    {
        $searchModel = new PembeliSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTambahPembeli()
    {
        $model = new PembeliForm();

        if ($model->load($this->request->post()) && $model->validate()) {

            if ($model->savePembeli()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil di simpan.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil di simpan.');
            }

            return $this->redirect(['pembeli']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUbahPembeli($id)
    {
        $table = $this->findModel($id);
        $model = new PembeliForm();
        $model->id = $table->id;
        $model->nama_pembeli = $table->nama_pembeli;
        $model->no_telp = $table->no_telp;
        $model->alamat = $table->alamat;


        if ($model->load($this->request->post()) && $model->validate()) {

            if ($model->updatePembeli()) {
                Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil diperbarui.');
            } else {
                Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil diperbarui.');
            }

            return $this->redirect(['pembeli']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionHapusPembeli($id)
    {
        $model = $this->findModel($id);

        if ($model->delete()) {
            Yii::$app->session->setFlash('success', '<i class="bi bi-check-circle-fill me-2"></i> Data berhasil di hapus.');
        } else {
            Yii::$app->session->setFlash('error', '<i class="bi bi-x-circle me-2"></i> Data tidak berhasil di hapus.');
        }
        return $this->redirect(['pembeli']);
    }

    protected function findModel($id)
    {
        if (($model = PembeliTable::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

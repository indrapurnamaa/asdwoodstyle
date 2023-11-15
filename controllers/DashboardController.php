<?php

namespace app\controllers;

use app\models\table\FurnitureTable;
use app\models\table\PembeliTable;
use app\models\table\PemesananTable;
use yii\base\Controller;
use yii\filters\AccessControl;


class DashboardController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'only' => ['dashboard'],
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

    public function actionDashboard()
    {
        $totalFurniture = FurnitureTable::find()
            ->count();

        $totalPemesanan = PemesananTable::find()
            ->count();

        $totalPembeli = PembeliTable::find()
            ->count();

        $totalPesananDitampung = PemesananTable::find()
            ->where(['status' => 'Pesanan Ditampung'])
            ->count();

        $totalPesananDibuat = PemesananTable::find()
            ->where(['status' => 'Pesanan Dibuat'])
            ->count();

        $totalPesananSelesai = PemesananTable::find()
            ->where(['status' => 'Pesanan Selesai'])
            ->count();

        return $this->render('index', [
            'totalFurniture' => $totalFurniture,
            'totalPemesanan' => $totalPemesanan,
            'totalPembeli' => $totalPembeli,
            'totalPesananDitampung' => $totalPesananDitampung,
            'totalPesananDibuat' => $totalPesananDibuat,
            'totalPesananSelesai' => $totalPesananSelesai,
        ]);
    }
}

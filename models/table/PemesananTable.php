<?php

namespace app\models\table;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use app\models\table\FurnitureTable;
use app\models\table\PembeliTable;
use yii\helpers\Html;

class PemesananTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{pemesanan}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value' => function ($event) {
                    return date('Y-m-d H:i:s');
                }
            ],
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_pemesanan',
                'value' => date('dmY') . '?',
                'digit' => 3
            ],
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'no_invoice',
                'value' => 'INV' . date('ymd') . '?',
                'digit' => 3
            ]
        ];
    }

    public function getFurniture()
    {
        return $this->hasOne(FurnitureTable::className(), ['id' => 'id_furniture']);
    }

    public function getPembeli()
    {
        return $this->hasOne(PembeliTable::className(), ['id' => 'id_pembeli']);
    }

    
    public function getStatusLabel()
    {
        switch ($this->status) {
            case 'Pesanan Ditampung':
                return Html::tag('span', 'Pesanan Ditampung', ['class' => 'badge badge-secondary']);
            case 'Pesanan Dibuat':
                return Html::tag('span', 'Pesanan Dibuat', ['class' => 'badge badge-primary']);
            case 'Pesanan Selesai':
                return Html::tag('span', 'Pesanan Selesai', ['class' => 'badge badge-success']);
        }
    }

    public function beforeSave($insert)
    {
        // Hitung Harga total dari harga unit * qty
        $harga_unit = $this->harga_unit;
        $qty = $this->qty;
        $harga_total = $harga_unit * $qty;
        $this->harga_total = $harga_total;

        // hitung sisa pada dp
        $dp = $this->dp;
        $hasil_sisa = $harga_total - $dp;
        $this->sisa =  $hasil_sisa;
        return parent::beforeSave($insert);
    }
}

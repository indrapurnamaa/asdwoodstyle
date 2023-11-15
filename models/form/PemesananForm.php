<?php

namespace app\models\form;

use app\models\table\PemesananTable;
use Yii;
use yii\base\Model;
use yii\helpers\Html;

class PemesananForm extends Model
{   
    public $id;
    public $id_user;
    public $no_pemesanan;
    public $no_invoice;
    public $id_pembeli;
    public $tanggal_pemesanan;
    public $id_furniture;
    public $qty;
    public $pekerjaan;
    public $harga_unit;
    public $harga_total;
    public $dp;
    public $sisa;
    public $status;

    public function rules()
    {
        return [
            [['id_pembeli', 'tanggal_pemesanan', 'id_furniture', 'qty', 'pekerjaan', 'harga_unit','dp','status'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['qty', 'id_pembeli', 'id_furniture'], 'integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pembeli' => 'Nama Pembeli',
            'tanggal_pemesanan' => 'Tanggal Pemesanan',
            'id_furniture' => 'Nama Furniture',
            'qty' => 'Qty',
            'pekerjaan' => 'Pekerjaan',
            'harga_unit' => 'Harga Unit',
            'harga_total' => 'Harga Total',
            'dp' => 'DP',
            'sisa' => 'Sisa',
            'status' => 'Status Pesanan',
        ];
    }

    public function savePesanan()
    {
        if (!$this->hasErrors()) {
            $PemesananTable = new PemesananTable();
            $PemesananTable->id_user = Yii::$app->user->getId();
            $PemesananTable->no_pemesanan = $this->no_pemesanan;
            $PemesananTable->no_invoice = $this->no_invoice;
            $PemesananTable->id_pembeli = $this->id_pembeli;
            $PemesananTable->tanggal_pemesanan = $this->tanggal_pemesanan;
            $PemesananTable->id_furniture = $this->id_furniture;
            $PemesananTable->qty = $this->qty;
            $PemesananTable->pekerjaan = $this->pekerjaan;
            $PemesananTable->harga_unit = $this->harga_unit;
            $PemesananTable->harga_total = $this->harga_total;
            $PemesananTable->dp = $this->dp;
            $PemesananTable->sisa = $this->sisa;
            $PemesananTable->status = $this->status;
            $PemesananTable->save(false);

            return $PemesananTable;
        }

        return false;
    }

    public function updatePesanan()
    {
        if (!$this->hasErrors()) {
            $PemesananTable = PemesananTable::findOne($this->id);
            if ($PemesananTable) {
                $PemesananTable->status = $this->status;
                $PemesananTable->save(false);

                return $PemesananTable;
            }
            return false;
        }
    }
}

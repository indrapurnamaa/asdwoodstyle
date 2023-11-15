<?php

namespace app\models\form;

use app\models\table\PembeliTable;
use Yii;
use yii\base\Model;

class PembeliForm extends Model
{

    public $id;
    public $id_user;
    public $nama_pembeli;
    public $no_telp;
    public $alamat;

    public function rules()
    {
        return [
            [['nama_pembeli', 'no_telp', 'alamat'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [['no_telp'], 'number', 'message' => 'Nomor Telepon tidak boleh menggunakan huruf'],
            // [['nama_pembeli', 'no_telp', 'alamat'], 'string', 'max' => 200],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pembeli' => 'Nama Pembeli',
            'no_telp' => 'Nomor Telepon',
            'alamat' => 'Alamat',
        ];
    }

    public function savePembeli()
    {
        if (!$this->hasErrors()) {
            $PembeliTable = new PembeliTable();
            $PembeliTable->id_user = Yii::$app->user->getId();
            $PembeliTable->nama_pembeli = $this->nama_pembeli;
            $PembeliTable->no_telp = $this->no_telp;
            $PembeliTable->alamat = $this->alamat;
            $PembeliTable->save(false);

            return $PembeliTable;
        }

        return false;
    }

    public function updatePembeli()
    {
        if (!$this->hasErrors()) {
            $PembeliTable = PembeliTable::findOne($this->id);
            if ($PembeliTable) {
                $PembeliTable->nama_pembeli = $this->nama_pembeli;
                $PembeliTable->no_telp = $this->no_telp;
                $PembeliTable->alamat = $this->alamat;
                $PembeliTable->save(false);

                return $PembeliTable;
            }
            return false;
        }
    }
}

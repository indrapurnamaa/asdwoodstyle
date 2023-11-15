<?php

namespace app\models\form;

use app\models\table\FurnitureTable;
use Yii;
use yii\base\Model;

class FurnitureForm extends Model
{
    public $id;
    public $id_user;
    public $nama_furniture;
    public $deskripsi;
    public $harga;
    public $gambar;
    public $fileGambar;

    public function rules()
    {
        return [
            [['nama_furniture', 'deskripsi', 'harga'], 'required', 'message' => '{attribute} tidak boleh kosong.'],
            [
                ['fileGambar'], 'file',
                'skipOnEmpty' => TRUE,
                'extensions' => 'jpg, png, jpeg'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_furniture' => 'Nama Furniture',
            'deskripsi' => 'Deskripsi',
            'harga' => 'Harga',
            'gambar' => 'Gambar',
            'fileGambar' => 'Foto'
        ];
    }

    public function saveFurniture()
    {
        if (!$this->hasErrors()) {
            $FurnitureTable = new FurnitureTable();
            $FurnitureTable->id_user = Yii::$app->user->getId();
            $FurnitureTable->nama_furniture = $this->nama_furniture;
            $FurnitureTable->deskripsi = $this->deskripsi;
            $FurnitureTable->harga = $this->harga;
            $FurnitureTable->gambar = $this->gambar;
            $FurnitureTable->save(false);

            return $FurnitureTable;
        }

        return false;
    }

    public function updateFurniture()
    {
        if (!$this->hasErrors()) {
            $FurnitureTable = FurnitureTable ::findOne($this->id);
            if ($FurnitureTable) {
                $FurnitureTable->nama_furniture = $this->nama_furniture;
                $FurnitureTable->deskripsi = $this->deskripsi;
                $FurnitureTable->harga = $this->harga;
                $FurnitureTable->gambar = $this->gambar;
                $FurnitureTable->save(false);

                return $FurnitureTable;
            }
            return false;
        }
    }
}

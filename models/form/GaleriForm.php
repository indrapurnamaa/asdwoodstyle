<?php

namespace app\models\form;

use app\models\table\GaleriTable;
use Yii;
use yii\base\Model;

class GaleriForm extends Model
{
    public $id;
    public $gambar;
    public $fileGambar;

    public function rules()
    {
        return [
            [['fileGambar'], 'required', 'message' => 'Silahkan Unggah File.'],
            [
                ['fileGambar'], 'file',
                'extensions' => 'jpg, png, jpeg'
            ],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'gambar' => 'Gambar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'fileGambar' => 'Gambar',
        ];
    }

    public function saveGambar()
    {
        // Define Variables for upload image
        $randomString = Yii::$app->security->generateRandomString(12);
        $fileName = $randomString . date('dmY');
        $namaGambar = $fileName . '.' . $this->fileGambar->extension;
        $this->fileGambar->saveAs('img/galeri/' . $namaGambar);
        $this->gambar = $namaGambar;
        
        // Insert data to database
        $GaleriTable = new GaleriTable();
        $GaleriTable->gambar = $this->gambar;
        $GaleriTable->save();

        return $GaleriTable;
    }
}

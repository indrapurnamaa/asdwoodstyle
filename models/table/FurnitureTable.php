<?php

namespace app\models\table;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class FurnitureTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{furniture}}';
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
            ]
        ];
    }
}

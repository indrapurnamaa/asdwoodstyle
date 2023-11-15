<?php

namespace app\models\table;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class UserTable extends ActiveRecord
{
    public static function tableName()
    {
        return '{{user}}';
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

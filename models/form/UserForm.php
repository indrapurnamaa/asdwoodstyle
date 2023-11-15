<?php

namespace app\models\form;

use yii\base\Model;

class UserForm extends Model

{
    const STATUS_ACTIVE = 10;
    const STATUS_NON_ACTIVE = 0;

    public function rules()
    {
        return [
            [['username', 'password','nama'], 'safe'],
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_NON_ACTIVE]],
        ];
    }
}

<?php

namespace app\models\auth;

use app\models\table\UserTable;
use yii\web\IdentityInterface;

class AppIdentity extends UserTable implements IdentityInterface
{

    const STATUS_ACTIVE = 10;
    const STATUS_NON_ACTIVE = 0;
    
    public static function findIdentity($id)
    {
        return static::findOne(['id' =>$id, 'status' => self::STATUS_ACTIVE]);
    }

   
    public static function findIdentityByAccessToken($token, $type = null)
    {
        $users = self::find()->where(['access_token' => $token])->one();
        foreach ($users as $user) {
            if ($user['access_token'] === $token) {
                return new static($user);
            }
        }

        return null;
    }


    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

 
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}

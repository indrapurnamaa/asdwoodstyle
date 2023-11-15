<?php

namespace app\models\form;

use app\models\auth\AppIdentity;
use Yii;
use yii\base\Model;


class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => '{attribute} tidak boleh kosong!'],

            ['rememberMe', 'boolean'],

            ['password', 'validateLogin'],
        ];
    }


    public function validateLogin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Username atau Password salah.');
            }
        }
    }


    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = AppIdentity::findByUsername($this->username);
        }

        return $this->_user;
    }
}

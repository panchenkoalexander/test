<?php

namespace app\modules\admin\models;

use yii\base\Model;
use backend\modules\admin\models\Manager;

class Login extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute,$params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getManager();
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute,'Пароль или пользователь введены не верно');
            }
        }
    }

    public function getManager()
    {
        return Manager::findOne(['email'=>$this->email]);
    }
}

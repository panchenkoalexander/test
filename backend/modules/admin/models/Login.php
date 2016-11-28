<?php

namespace app\modules\admin\models\Login;

use yii\base\Model;
use app\modules\admin\models\Manager;

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
            $user = $this->getUser();
            if(!$user || !$user->validatePassword($this->password))
            {
                $this->addError($attribute,'Пароль или пользователь введены не верно');
            }
        }
    }

    public function getUser()
    {
        return Manager::findOne(['email'=>$this->email]);
    }
}

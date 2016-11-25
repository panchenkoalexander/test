<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public function setPassword($password)
    {
        $this->password = md5($password);
    }
    public function getId()
    {
        return $this->id;
    }
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
  public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null){}





    public function getAuthKey(){}


    public function validateAuthKey($authKey){}
}
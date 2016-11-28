<?php

namespace backend\modules\admin\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "manager".
 *
 * @property integer $id
 * @property integer $level
 * @property string $name
 * @property string $lastname
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $createdAt
 * @property string $updatedAt
 */
class Manager extends ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manager';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['level'], 'integer'],
            //[['createdAt', 'updatedAt'], 'safe'],
            [['name', 'lastname'], 'string', 'max' => 250],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'level' => 'Level',
            'name' => 'Name',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            //'createdAt' => 'Created At',
            //'updatedAt' => 'Updated At',
        ];
    }
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
        return $this->password === $password;
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }


    public static function findIdentityByAccessToken($token, $type = null){}





    public function getAuthKey(){}


    public function validateAuthKey($authKey){}
}

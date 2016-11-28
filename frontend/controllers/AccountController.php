<?php
namespace frontend\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\filters\AccessControl;

class AccountController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],

                ],
            ],
        ];
        /*return [

            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'entry_date',
                'updatedAtAttribute' => false,
                'value' => new Expression('NOW()'),
            ],

        ];*/
    }
    public function actionIndex()
    {
       return $this->render('index');
    }
}
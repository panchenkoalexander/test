<?php
namespace frontend\controllers;


use Yii;


use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

use yii\web\Controller;
use app\models\Signup;
use app\models\Login;
use common\models\EntryForm;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
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
    public function  actionProfile()
    {
        return $this->render('profile');
    }
    public function  actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogout()
    {
        if(!Yii::$app->user->isGuest)
        {
            Yii::$app->user->logout();
            return $this->redirect(['login']);
        }

    }

    public function actionSignup()
    {
        $model = new Signup();
        if(isset($_POST['Signup']))
        {
            $model->attributes = Yii::$app->request->post('Signup');

            if($model->validate() &&  $model->signup() )
            {

                return $this->goHome();
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionLogin()
    {
        if(!Yii::$app->user->isGuest)
        {
            return $this->goHome();
        }

        $login_model = new Login();
        if(Yii::$app->request->post('Login'))
        {

            $login_model->attributes=Yii::$app->request->post('Login');
            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login',['login_model'=>$login_model]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            // данные в $model удачно проверены

            // делаем что-то полезное с $model ...

            return $this->render('entry-confirm', ['model' => $model]);
        } else {
            // либо страница отображается первый раз, либо есть ошибка в данных
            return $this->render('entry', ['model' => $model]);
        }
    }

}



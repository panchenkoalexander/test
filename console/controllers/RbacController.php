<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;
/**
* Инициализатор RBAC выполняется в консоли php yii rbac/init
*/
class RbacController extends Controller {

public function actionInit() {
$auth = Yii::$app->authManager;

$auth->removeAll(); //На всякий случай удаляем старые данные из БД...

// Создадим роли админа и редактора новостей
$admin = $auth->createRole('admin');
$user = $auth->createRole('user');

// запишем их в БД
$auth->add($admin);
$auth->add(user);

// Создаем разрешения. Например, просмотр админки viewAdminPage и редактирование новости updateNews
$viewAdminPage = $auth->createPermission('viewAdminPage');
$viewAdminPage->description = 'Просмотр админки';

$updateNews = $auth->createPermission('updateNews');
$updateNews->description = 'Редактирование новости';

// Запишем эти разрешения в БД
$auth->add($viewAdminPage);
$auth->add($updateNews);

// Теперь добавим наследования. Для роли editor мы добавим разрешение updateNews,
// а для админа добавим наследование от роли editor и еще добавим собственное разрешение viewAdminPage

// Роли «Редактор новостей» присваиваем разрешение «Редактирование новости»
$auth->addChild(user,$updateNews);

// админ наследует роль редактора новостей. Он же админ, должен уметь всё! :D
$auth->addChild($admin, user);

// Еще админ имеет собственное разрешение - «Просмотр админки»
$auth->addChild($admin, $viewAdminPage);

// Назначаем роль admin пользователю с ID 1
$auth->assign($admin, 1);

// Назначаем роль editor пользователю с ID 2
$auth->assign(user, 2);
}
}
<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\WorkWithUsers;

class CreateuserController extends Controller
{
    //Сгенерировать и записать в БД пользователей
    public function actionIndex()
    {
        (new WorkWithUsers)->createUsers();
    }
    
    //зная ID пользователя получаем его имя, 
    //год рождения и список телефонных номеров
    public function actionGetuserid()
    {
        (new WorkWithUsers)->GetUserID();
    }
    
    //возможность удалить всю информацию о пользователе вместе с номерами телефонов
    public function actionDeluser()
    {
        (new WorkWithUsers)->delUserID();
    }
    
    //пополнить любой из номеров
    public function actionAddfunds()
    {
        (new WorkWithUsers)->addFunds();
    }
    
    //Создание пользователя
    public function actionAdduser()
    {
        (new WorkWithUsers)->addUser();
    }
    
    //добавить для пользователя номер мобильного телефона
    public function actionAddphoneuser()
    {
        (new WorkWithUsers)->addPhoneUser();
    }
}

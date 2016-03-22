<?php
namespace app\models;

use yii\base\Model;
use app\models\ModelUser;
use app\models\ModelPhone;
use app\models\UserDB;
use app\models\PhoneUserDB;

class WorkWithUsers extends Model
{
    protected $_countUser = 1000; //кол-во создаваемых пользователей
    
    public function createUsers () {
        
        $objUser = new ModelUser ();
        $objCreatePhone = new ModelPhone ();
        $objUserDB = new UserDB();
        $objPhoneUserDB = new PhoneUserDB();
        
        for ($i=0; $i < $this->_countUser; $i++) {
            //создание случайного пользователя
            $user = $objUser->createRandomUser();
            //сохраняем пользователя в БД
            $idUser = $objUserDB->saveUser($user);
            
            //генерируем телефоны пользователя
            for ($y=0; $y < $user->countPhone; $y++) {
                //создание случайного телефона
                $phone = $objCreatePhone->createPhone();
                //сохраняем номер телефона пользователя
                $objPhoneUserDB->savePhone($idUser, $phone);
            }
        }
        
        echo 'пользователи созданы';
    }
    
    public function GetUserID () {
        //ид пользователя
        $userId = 2;
        
        $objUserDB = new UserDB();
        //получить данные пользователя
        $dataUser = $objUserDB->getUserId ($userId);
        
        $objPhoneUserDB = new PhoneUserDB();
        //получить телефоны пользователя
        $dataPhone = $objPhoneUserDB->getUserPhoneNumberId($userId);
        
        $data = [
            'user'  => $dataUser,
            'phone' => $dataPhone
        ];
        
        echo '<pre>';
        var_dump($data);
    }
    
    public function delUserID () {
        //ид пользователя
        $userId = 1;
        
        $objUserDB = new UserDB();
        //Удаляем пользователя, 
        //телефоны удаляются по внешнему ключу ON DELETE CASCADE
        $objUserDB->delUserId($userId);
        
        echo 'пользователь id:'.$userId.' удален';
    }
    
    public function adduser () {
        //модель нового пользователя
        $objUser = new ModelUser ();
        //данные нового пользователя
        $objUser->name  = 'Маша';
        $objUser->dob   = '1988-01-01';
        
        $objUserDB = new UserDB();
        //сохраняем пользователя в БД
        $idUser = $objUserDB->saveUser($objUser);
        
        echo 'пользователь с ID: '.$idUser.' создан';
    }
    
    public function addFunds () {
        //номер пополняемого телефона
        $phone = 380639301339;
        //сумма пополнения
        $sum = 99.01;
        
        if ($sum < 0 || $sum > 100) {
            echo 'Сумма пополнения должна быть больше 0 и  меньше 100';
            return false;
        }
        
        $objPhoneUserDB = new PhoneUserDB();
        $objPhoneUserDB->updateBalancePhone($phone, $sum);
        
        echo 'номер телефона пополнен';
    }
    
    public function  addPhoneUser () {
        
        //ИД пользователя для которого добавляем телефонный номер
        $idUser = 11; 
        
        $objCreatePhone = new ModelPhone ();
        //данные нового телефона
        $objCreatePhone->phone = 380669679686;
        $objCreatePhone->balance = 10;
        
        $objPhoneUserDB = new PhoneUserDB();
        //сохраняем номер телефона пользователя
        $objPhoneUserDB->savePhone($idUser, $objCreatePhone);
        
        echo 'немер телефона сохранен';
        
    }
}

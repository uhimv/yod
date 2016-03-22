<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class PhoneUserDB extends ActiveRecord
{
    protected static $_tableName = 'phone_user';
    
    public static function tableName () {
        return static::$_tableName;
    }
    
    //сохраняем номер телефона пользователя
    public function savePhone ($idUser,$objPhone) {
        $phone = new PhoneUserDB();
        $phone->phone        = $objPhone->phone;
        $phone->user_id      = $idUser;
        $phone->balance      = $objPhone->balance;
        $phone->save();
    }
    
    /*
     * Получить телефоны пользователя по его ID
     * @param int $int
     * @return array
     */
    public function getUserPhoneNumberId ($userID) {
        return PhoneUserDB::find()
                ->where(['user_id' => $userID])
                ->asArray()
                ->all();
    }
    
    /*
     * пополнить баланс телефона
     */
    public function updateBalancePhone($numPhome, $sum) {
        PhoneUserDB::updateAllCounters(
                    ['balance' => $sum], 
                    ['phone'=>$numPhome]
                );
    }
}

<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class UserDB extends ActiveRecord
{
    protected static $_tableName = 'users';
    
    public static function tableName () {
        return static::$_tableName;
    }
    
    /*
     * Добавляем в БД ного пользователя
     * @param object $objUser
     */
    public function saveUser ($objUser) {
        $user = new UserDB();
        $user->name = $objUser->name;
        $user->dob  = $objUser->dob;
        $user->save();
        
        //Ид созданного пользователя
        return Yii::$app->db->getLastInsertID();
    }
    
    /*
     * Получить данные пользователя по его ID
     * @param int $int
     * @return array
     */
    public function getUserId ($userID) {
        return UserDB::find()
                ->where(['id' => $userID])
                ->asArray()
                ->one();
    }
    
    /*
     * удалить пользователя по его ID
     * @param int $int
     */
    public function delUserId ($userID) {
        $user = UserDB::findOne($userID);
        $user->delete();
    }
}

<?php
namespace app\models;

use yii\base\Model;
/*
 * модель пользователя
 */
class ModelUser extends Model
{
    public $name;       //имя
    public $dob;        //дата рождения
    public $countPhone; //кол-во телефонов у пользователя
    

    /*
     * имена пользователей
     * @param int $int 
     * @return string
     */
    public function getName ($int) {
        switch ($int) {
            case 1:
                return 'Владимир';
            case 2:
                return 'Дмитрий';
            case 3:
                return 'Андрей';
            default :
                return null;
        }
    }
    
    /*
     * @return int
     */
    public function randomNumericName () {
        return rand(1,3);
    }
    
    /*
     * кол-во телефонов у пользователя
     * @return int
     */
    public function randomCountPhone () {
        return rand(1,3);
    }
    
    /*
     * Дата рождения
     * @return string
     */
    public function getRandomDOB () {
        return '1986-01-01';
    }
    
    /*
     * генерация случайного пользователя
     * @return this
     */
    public function createRandomUser() {
        $rnn = $this->randomNumericName ();
        $this->name         = $this->getName($rnn);
        $this->dob          = $this->getRandomDOB ();
        $this->countPhone   = $this->randomCountPhone ();
        
        return $this;
    }
}

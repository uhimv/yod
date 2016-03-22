<?php
namespace app\models;

use yii\base\Model;
/*
 * модель телефона
 */
class ModelPhone extends Model
{
    const CODE = 380;       //код страны
    
    public $phone;          //полный телефоны
    public $operatorСode;   //код оператора      
    public $number;         //номер телефона
    public $balance;        //баланс
    
    /*
     * баланс телефона
     * @return string
     */
    public function randomBalancePhone () {
        return rand(-50,149) . '.' . rand(0,99);
    }
    
    /*
     * коды операторов
     * @param int $int 
     * @return int
     */
    public function getOperatorCodes ($int) {
        switch ($int) {
            case 1:
                return 50;
            case 2:
                return 67;
            case 3:
                return 63;
            case 4:
                return 68;
            default :
                return null;
        }
    }
    
    /*
     * @return int
     */
    public function randomNumericOperatorCodes () {
        return rand(1,4);
    }
    
    /*
     * номер телефона
     * @return int
     */
    public function randomNumberPhone () {
        return rand(1111111,9999999);
    }
    
    /*
     * генерация случайного телефона для пользователя
     * @return this
     */
    public function createPhone() {
        $rnoc = $this->randomNumericOperatorCodes ();
        $this->operatorСode = $this->getOperatorCodes($rnoc);      
        $this->number       = $this->randomNumberPhone ();
        $this->balance      = $this->randomBalancePhone();
        $this->phone = self::CODE . $this->operatorСode . $this->number; 
        
        return $this;
    }
}

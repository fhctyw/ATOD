<?php 

namespace app\models;

use Yii;

use yii\db\ActiveRecord;

class Products extends ActiveRecord 
{

public $_product;
public $_id;
public $_characteristic;
public $_name;
public $_cost;
public $_productphoto;

public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        /*
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }
        */

        return null;
    }

    public static function findByProductId($id)
    {
        $product = static::find()->where(['product_id'=>$id])->one();
        if ($product) {
            $product->_id = $product->product_id;
            $product->_name = $product->product_name;
            return $product;
        } 
        return null;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getCharacteristic()
    {
        return $this->_characteristic;
    }

    public function getCost()
    {
        return $this->_cost;
    }

    public function getProductphoto()
    {
        return $this->_productphoto;
    }
}
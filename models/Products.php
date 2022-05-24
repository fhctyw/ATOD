<?php 

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Products extends ActiveRecord 
{

/* public $_product;
public $_id;
public $_characteristic;
public $_name;
public $_cost;
public $_productphoto; */

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

    public function getId()
    {
        return $this->id;
    }

    public function getCost()
    {
        return $this->price;
    }

    public function getProductPhoto()
    {
        return $this->url_photo;
    }
}
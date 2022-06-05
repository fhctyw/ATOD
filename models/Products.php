<?php 

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\helpers\Url;

class Products extends ActiveRecord 
{
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

    public static function findByProductId($id)
    {
        $product = static::find()->where(['product_id'=>$id])->one();
        if ($product) {
            return $product;
        } 
        return null;
    }

    public static function findByCategory($category)
    {
        return static::find()->where(['category'=>$category])->all();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getProductphoto()
    {
        return $this->productphoto;
    }
}
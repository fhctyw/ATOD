<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord {

public $_product;
public $_characteristic;
public $_productname;
public $_cost;
public $_productphoto;

public static function tableName()
    {
        return 'products';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findByProductname($productname)
    {
        $product = static::find()->where(['name'=>$productname])->one();
        if ($product) {
            $product->_id = $product->id;
            $product->_name = $product->name;
            $product->_productname = $product->productname;
            return $product;
        } 
        return null;
    }

    public static function findById($id)
    {
        $product = static::find()->where(['id'=>$id])->one();
        if ($product) {
            $product->_id = $product->id;
            $product->_name = $product->name;
            $product->_productname = $product->productname;
            return $product;
        } 
        return null;
    }
}
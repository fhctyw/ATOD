<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\models\Products;

class BuildPart extends ActiveRecord
{
    public static function tableName()
    {
        return 'builds_part';
    }

    public function getPart()
    {
        return Products::findIdentity($this->product_id);
    }

    public static function findIdentity($id)
    {
        return static::find()->where(['product_id'=>$id]);
    }
}
<?php 

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\helpers\Url;

class Characteristics extends ActiveRecord 
{
    public static function findIdentity($id)
    {
        return Characteristics::find()->where(['product_id' => $id])->all();
    }
}
?>
<?php 

namespace app\models;

use Yii;

use yii\db\ActiveRecord;
use yii\helpers\Url;

class Characteristics extends ActiveRecord 
{
    public static function findIdentity($id)
    {
        return static::find()->where(['product_id' => $id])->all();
    }

    public static function findIdentityChar($id, $char)
    {
        return static::find()->where(['product_id' => $id, 'name_char'=>$char])->one();
    }

    public static function findChar($char)
    {
        return static::find()->where(['name_char'=>$char])->all();
    }
}
?>
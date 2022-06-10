<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Admins extends ActiveRecord {

    public static function isAdmin($id)
    {
        return static::find()->where(['admin_id'=>$id])->one();
    }
}
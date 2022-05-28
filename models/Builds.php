<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use app\models\BuildPart;

class Builds extends ActiveRecord 
{
    public $parts;

    public static function tableName()
    {
        return 'builds';
    }

    public static function findIdentity($id)
    {
        $build = static::findOne($id);
        $build->parts = BuildPart::find()->where(['build_id'=>$id])->all();
        return $build;
    }

    public function price()
    {
        $sum = 0.0;
        foreach ($this->parts as $part) {
            $sum += $part->getPart()->price;
        }
        return $sum;
    }
}
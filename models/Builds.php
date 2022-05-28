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
        return static::findOne($id);
    }

    public static function findByBuildId($id)
    {
        $build = static::find()->where(['build_id'=>$id])->one();
        if ($build) {
            $build->_id = $build->build_id;
            $build->_name = $build->build_name;
            return $build;
        } 
        return null;
    }

    public function getId()
    {
        return $this->_id;
    }

    public function getPrice($id)
    {
        return $this->_price;
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
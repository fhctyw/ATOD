<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Builds extends ActiveRecord {

    public $_build;
    public $_id;
    public $_name;
    public $_price;
    public $_buildphoto;
    public $_parts;

    public static function tableName()
    {
        return 'builds';
    }

        /**
     * {@inheritdoc}
     */
    
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
    }

    public function getBuildphoto()
    {
        return $this->_buildphoto;
    }
}
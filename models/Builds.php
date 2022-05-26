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

<<<<<<< HEAD
    public static function findIdentity($id)
    {
        $build = static::findOne($id);
        $build->parts = BuildPart::find()->where(['build_id'=>$id])->all();
        return $build;
=======
    public $_build;
    public $_id;
    public $_name;
    public $_price;
    public $_buildphoto;

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

    public function getPrice()
    {
        return $this->_price;
    }

    public function getBuildphoto()
    {
        return $this->_buildphoto;
>>>>>>> 0e233ae580f0c94f9e16af8d4a5f08e04241edf6
    }
}
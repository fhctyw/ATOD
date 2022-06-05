<?php

namespace app\models;

use Yii;
use yii\base\Model;

class BuildsForm extends Model
{
    public $build_name;

    public function rules()
    {
        return [
            ['build_name', 'required']
        ];
    }


}

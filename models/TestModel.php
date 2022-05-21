<?php

namespace app\models;

class TestModel extends \yii\base\Model
{
    public $videocard;
    public $motherbroad;
    public $processor;

    public function rules()
    {
        return [
            [['videocard', 'motherbroad', 'processor'], 'boolean'],
        ];
    }

    public function check()
    {
        return $this->videocard || $this->motherbroad || $this->processor; 
    }
}
<?php
    namespace app\models;
    use yii\base\Model;
    class CheckboxList extends Model
    {
        public $videocard;
        public $motherboard;
        public $proccesor;
        
        public function rules()
        {
        return [
            [['videocard', 'motherboard', 'proccesor'], 'boolean'],
        ];
        }

    public function check()
    {
        return $this->videocard ||  $this->motherbroad ||  $this->processor; 
    }




    }



?>
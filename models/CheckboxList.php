<?php
    namespace app\models;
    use yii\base\Model;

    class CheckboxList extends Model
    {
        public $categories;
        
        public function rules()
        {
        return [ 
            [
                "categories","default","value"=>""
            ]
            //[['videocard', 'motherboard', 'proccesor'], 'boolean'],
        ];
        }

    public function check()
    {
        return $this->categories;
        //return $this->videocard ||  $this->motherboard ||  $this->proccesor; 
    }




    }



?>
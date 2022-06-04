<?php

namespace app\models;

use Exception;
use yii\base\Model;
use app\models\Products;

class CategoryMenu extends Model
{
    public $items = [];

    public function addItem($label, $options=[])
    {
        $item = ['label'=>$label, 'url'=>'#', 'items'=>[], 'options'=>$options];
        array_push($this->items, $item);
    }

    public function addItemInner($item, $label, $options=[])
    {
        foreach ($this->items as $i => $value)
        {
            $this->items[$i]['options']['data-id'] = $i;
            if (isset($value['label']) && $value['label'] == $item) {
                $item = ['label'=>$label, 'url'=>'#', 'options'=>$options];
                $item['options']['id'] = $i;
                array_push($this->items[$i]['items'], $item);
            }
        }
    }

    public function initItems($categories, $options=[])
    {
        foreach ($categories as $elem) {
            $this->addItem($elem, $options);
        }
    }

    public function process($indexs, $options=[])
    {
        foreach ($this->items as $i => $arr) {
            $ps = Products::findByCategory($arr['label']);
            foreach ($ps as $p) {
                $this->addItemInner($arr['label'], $p->product_name, $options);
            }
        }
    }
}
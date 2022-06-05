<?php

namespace app\models;

use Exception;
use yii\base\Model;
use app\models\Products;
use yii\helpers\Html;

class CategoryMenu extends Model
{
    public $items = [];
    public $products = [];

    public function addItem($label, $options=[])
    {
        $item = ['label'=>$label, 'items'=>[], 'options'=>$options];
        array_push($this->items, $item);
    }

    public function init()
    {
        parent::init();
        $this->products = Products::find()->all();
    }

    public function addItemInner($item, $label, $options=[])
    {
        foreach ($this->items as $i => $value)
        {
            $this->items[$i]['options']['data-id'] = $i;
            if (isset($value['label']) && $value['label'] == $item) {
                $item = ['label'=>$label, 'options'=>$options];
                $item['options']['class'] = 'ctgy-constr cat-'.$i;
                array_push($this->items[$i]['items'], $item);
            }
        }
    }

    public function initItems($categories, $options1=[], $options2=[])
    {
        foreach ($categories as $elem) {
            $this->addItem($elem, $options1);
        }

        foreach ($this->items as $arr) {
            $ps = Products::findByCategory($arr['label']);
            $this->products = array_merge($this->products, $ps);
            foreach ($ps as $p) {
                $this->addItemInner($arr['label'], $p->product_name, array_merge($options2, [
                    'data-product_id'=>$p->product_id,
                    'data-product_name'=>json_encode($p->product_name, JSON_UNESCAPED_UNICODE),
                    'data-url_photo'=>$p->url_photo,
                    'data-price'=>$p->price,
                    'data-url_site'=>$p->url_site
                ]));
            }
        }
    }

    public function process($indexs, $options=[])
    {
        
    }
}
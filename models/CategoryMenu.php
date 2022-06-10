<?php

namespace app\models;

use Exception;
use yii\base\Model;
use app\models\Products;
use yii\helpers\Html;

class CategoryMenu extends Model
{
    public $items = [];
    public $categoryItems = [];
    public $products = [];
    public $jsonFile = '../constructor/config.json';
    public $jsonContent;

    public function addItem($label, $options = [])
    {
        $item = ['label' => $label, 'items' => [], 'options' => $options];
        array_push($this->items, $item);
    }

    public function init()
    {
        parent::init();
        $this->products = Products::find()->all();
    }

    public function addItemInner($item, $label, $options = [])
    {
        foreach ($this->items as $i => $value) {
            $this->items[$i]['options']['data-id'] = $i;
            if (isset($value['label']) && $value['label'] == $item) {
                $item = ['label' => $label, 'options' => $options];
                $item['options']['class'] = 'ctgy-constr cat-' . $i;
                array_push($this->items[$i]['items'], $item);
            }
        }
    }

    public function initItems($categories, $options1 = [], $options2 = [])
    {
        foreach ($categories as $elem) {
            if (is_array($elem)) {
                $this->addItem($elem[0]);
                array_push($this->categoryItems, $elem[1]);
            } else {
                $this->addItem($elem, $options1);
                array_push($this->categoryItems, $elem);
            }
        }
        foreach ($this->categoryItems as $i => $arr) {
            $ps = Products::findByCategory($arr);
            $this->products = array_merge($this->products, $ps);
            foreach ($ps as $p) {
                $this->addItemInner($this->items[$i]['label'], $p->product_name, array_merge($options2, [
                    'data-product_id' => $p->product_id,
                    'data-product_name' => json_encode($p->product_name, JSON_UNESCAPED_UNICODE),
                    'data-url_photo' => $p->url_photo,
                    'data-price' => $p->price,
                    'data-url_site' => $p->url_site
                ]));
            }
        }
    }

    public function getJson()
    {
        $this->jsonContent = file_get_contents($this->jsonFile);
        $this->jsonContent = json_decode($this->jsonContent, true);
        return $this->jsonContent;
    }

    public function getConfigByCategory($category)
    {
        return $this->jsonContent ? $this->jsonContent[$category] : $this->getJson()[$category];
    }

    public function process($indexs, $options = [])
    {
        foreach ($indexs as $id) {
            $product = Products::findIdentity($id);
            $factors = $this->getConfigByCategory($product->category);
            
            foreach ($this->categoryItems as $i => $arr) {
                foreach ($factors as $i1 => $factor) {
                    if ($arr == key($factor)){
                        $vc = trim(Characteristics::findIdentityChar($id, $i1)->value_char);
                        foreach ($this->items[$i]['items'] as $i2 => $item) {
                            if ($vc != trim(Characteristics::findIdentityChar($item['options']['data-product_id'], $factor[key($factor)])->value_char))
                            {
                                unset($this->items[$i]['items'][$i2]);
                            }
                        }
                    }
                }
            }
        }
    }
}

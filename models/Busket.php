<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;


class Busket extends ActiveRecord {

    public function addToBusket($products,$qty = 1) { //$qty = кількість товарів,яка буде добавлятися жожо корзини
       if(isset($_SESSION['busket'][$products->product_id])){
           $_SESSION['busket'][$products->product_id]['qty'] += $qty;
       }else{
           $_SESSION['busket'][$products->product_id] = [
               'qty' =>$qty,
               'name'=>$products->product_name,
               'price' =>$products->price,
               'url_photo' =>$products->url_photo
           ];
       }
       $_SESSION['busket.qty'] = isset($_SESSION['busket.qty']) ? $_SESSION['busket.qty'] + $qty : $qty; // Якщо товар у корзині уже є,то просто добавити його кілкість. Якщо його немає у корзині,то ми положимо товар у коризну
    
       $_SESSION['busket.sum'] = isset($_SESSION['busket.sum']) ? $_SESSION['busket.sum'] + $qty * $products->price : $qty * $products->price ;    
    }
    

    public function recalc($id){
        if(!isset($_SESSION['busket'][$id])) return false;//іспанській знак оклику
        $qtyMinus = $_SESSION['busket'][$id]['qty'];
        $sumMinus = $_SESSION['busket'][$id]['qty'] * $_SESSION['busket'][$id]['price'];
        $_SESSION['busket.qty'] -= $qtyMinus;
        $_SESSION['busket.sum'] -= $sumMinus;
      unset($_SESSION['busket'][$id]);//удалити цей товар
    }
    
}


?>
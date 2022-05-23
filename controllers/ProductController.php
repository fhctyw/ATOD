<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use \yii\base\Controller;
use app\models\Characteristics;

class ProductController extends Controller {
    public function actionIndex() 
    {   
        $id = Yii::$app->request->get('id');
        $products = Products::findByProductId($id);
        $characteristics = Characteristics::find()->where(['product_id' => $id])->all();
        //echo Html::beginTag('div', ['class' => 'product-image']);
        //echo Html::img(Url::to($products->url_photo), ['class' => 'product-thumb']);
        //var_dump($products);
        //die;
        return $this->render('index',compact('products', 'characteristics'));
    }
}

?>
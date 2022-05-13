<?php

namespace app\controllers;

use app\models\Busket;
use app\models\Products;
use yii\web\Controller;
use Yii;

class BusketController extends Controller {

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $product = Products::findOne($id);
        if(empty($product)) return false;
        $session=Yii::$app->session;
        $session->open();
        $busket = new Busket();
        $busket->addToBusket($product);
        $this->layout=false;
        return $this->render('busket-modal',compact('session')); 
    }

    public function actionClear() {
        $session=Yii::$app->session;
        $session->open();
        $session->remove('busket');
        $session->remove('busket.qty');
        $session->remove('busket.sum');
        $this->layout=false;
        return $this->render('busket-modal',compact('session')); 
    }

    public function actionDelItem(){
        $id = Yii::$app->request->get('id');
        $session=Yii::$app->session;
        $session->open();
        $busket = new Busket();
        $busket->recalc($id);  //перерахунок
        $this->layout=false;
        return $this->render('busket-modal',compact('session')); 
    }

}
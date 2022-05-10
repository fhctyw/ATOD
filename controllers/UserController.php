<?php

namespace app\controllers;

use app\models\User;
use app\models\Products;
use app\models\Feedbacks;
use \yii\base\Controller;
class UserController extends Controller {

    public function actionIndex() {

        $users = User::find()->all();
        $products = Products::find()->all();
        $feedback = Feedbacks::find()->all();

        return $this->render('index',compact('products','users','feedback'));
    }
}


?>